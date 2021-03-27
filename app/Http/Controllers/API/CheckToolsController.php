<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\History;
use App\News;
use App\Aturan;
use App\App;
use DB;


class CheckToolsController extends Controller
{
    public function checkTools(Request $request)
	{
		$idfungsionalitas = $request->id_fungsionalitas;
		$arrayinput = $request->karakteristik;
		$iduser = auth('api')->user()->id;

		$idaplikasi = DB::table('app_fung')->where('fung_id_fungsionalitas', $idfungsionalitas)->get()->pluck('app_id_aplikasi');
		foreach ($idaplikasi as $iapp) {
			$idaturan = DB::table('aturan')->where('id_aplikasi', $iapp)->get()->pluck('id_aturan');
			$idaturanall[] = $idaturan->all();
		}
		foreach ($idaturanall as $row => $innerArray) {
			foreach ($innerArray as $innerRow => $value) {
				$idaturanchar = DB::table('aturan_char')->where('aturan_id_aturan', $value)->get()->pluck('char_id_karakteristik');
				$idaturancharall[] = $idaturanchar->all();
				$valueall[] = $value;
			}
		}
        
		$k = false;
		$hasilll = [];
		$arrayfilter = array_filter($arrayinput);
		$arrayreindex = array_values($arrayfilter);
		for ($i = 0; $i < count($idaturancharall); $i++) {
			$kar = ($idaturancharall[$i] == $arrayreindex);
			if ($kar) {
				$k = true;
				$hasilll[] = $valueall[$i];

				$history = new history;
				$history->id_user = $iduser;
				$history->id_aturan = $valueall[$i];
				$history->save();
			}
        }

        $ids_aturan = $hasilll;
        
		if($k === false){
			$hasilll[] = 0;
			foreach($arrayinput as $ray => $value){     
				$namachar = DB::table('chars')->where('id_karakteristik', $value)->value('nama_karakteristik');
				$jenischar = DB::table('chars')->where('id_karakteristik', $value)->value('jenis_karakteristik');
				$gabungan[ ]= $jenischar . ' ' . $namachar;
			}
			$karakteristik = implode( ', ', $gabungan );
			
			$new = new news;
			$new->id_user = $iduser;
			$new->karakteristik = $karakteristik;
			$new->save();
		}
       
		return response()->json(['status'=>'success', 'result'=>Self::generateResult($ids_aturan)]);
    }
    
    public function generateResult($ids_aturan){
        $aturans = Aturan::with('apps')->whereIn('id_aturan', $ids_aturan)->get()->toArray();

        $result = array_map(function($item){
            return [
                'id' => $item['id_aturan'],
                'nama_aturan'=> $item['nama_aturan'],
                'id_aplikasi' => $item['apps']['id_aplikasi'],
                'nama_aplikasi' => $item['apps']['nama_aplikasi']    
            ];
        },  $aturans);

        return $result;
    }

    public function getRecommendationTools(){
		$iduser = auth('api')->user()->id;

		$history = History::with(['aturans' => function($query){$query->with('apps');}])->where('id_user', $iduser)->get()->toArray();
		
		$history = array_map(function($item){
			return [
				'id_aturan' => $item['aturans']['id_aturan'],
				'id_aplikasi' => $item['aturans']['id_aplikasi'],
				'aturan' => $item['aturans']['nama_aturan'],
				'aplikasi' => $item['aturans']['apps']['nama_aplikasi']
			];
		}, $history);	

		// perankingan hasil
		$container = array();

		foreach($history as $key => $item){

			$container[$item['id_aplikasi'].'_'.$item['id_aturan']]['data'][] = array(
				'id_aplikasi' => $item['id_aplikasi'],
				'id_aturan' => $item['id_aturan'],
				'aplikasi' => $item['aplikasi'],
				'aturan' => $item['aturan']
			);

			$container[$item['id_aplikasi'].'_'.$item['id_aturan']]['total'] = sizeof($container[$item['id_aplikasi'].'_'.$item['id_aturan']]['data']);
		}

		// sort and pick 3 best app
		$total = array_column($container, 'total');
		array_multisort($total, SORT_DESC, $container);

		$result = [];
		$container = array_values($container);
		foreach ($container as $key => $value) {
			$result[] = [
				'aplikasi' => $value['data'][0]['aplikasi'] ?? null,
				'aturan' => $value['data'][0]['aturan'] ?? null,
				'jumlah_pengecekan' => $value['total'],
				'foto' => null
			];

			if($key == 4) break;
		}
		
		return response()->json([
            'status' => 'success',
            'result' => $result
        ]);
    }
}
