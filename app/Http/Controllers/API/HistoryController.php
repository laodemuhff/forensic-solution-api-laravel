<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\History;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $id_user =  auth('api')->user()->id;
        
        $histories = History::with(['aturans' => function($query){$query->with('apps');}])->where('id_user', $id_user)->get()->toArray();

        $result = array_map(function($item){
            return [
                'id' => $item['id'],
                'id_aturan' => $item['id_aturan'],
                'nama_aturan'=> $item['aturans']['nama_aturan'],
                'id_aplikasi' => $item['aturans']['apps']['id_aplikasi'],
                'nama_aplikasi' => $item['aturans']['apps']['nama_aplikasi']    
            ];
        }, $histories);

        return response()->json(['status' => 'success', 'result' => $result]);
    }


    public function detail($id)
    {   
        $detail_history = History::with(['aturans' => function($query){
            $query->with(
                [
                    'apps' => function($query2){$query2->with('fungs');},
                    'check' => function($query2){$query2->with('chars');}
                ]
            );
        }])->where('id', $id)->first();

        if($detail_history){
            // fungsionalitas
            $fungsionalitas = array();
            foreach($detail_history['aturans']['apps']['fungs'] as $fung){
                $fungsionalitas[]=$fung['nama_fungsionalitas'];
            }
    
            
            // karakteristik
            $karakteristik = array();
            foreach($detail_history['aturans']['check'] as $char){
                $karakteristik[]= ['jenis' => $char['chars']['jenis_karakteristik'], 'value' => $char['chars']['nama_karakteristik']];
            }
            
            $result = [
                    'id' => $detail_history['id'],
                    'id_aturan' => $detail_history['id_aturan'],
                    'nama_aturan'=> $detail_history['aturans']['nama_aturan'],
                    'id_aplikasi' => $detail_history['aturans']['apps']['id_aplikasi'],
                    'nama_aplikasi' => $detail_history['aturans']['apps']['nama_aplikasi'],
                    'detail' => [
                        'fungsionalitas' => $fungsionalitas,
                        'karakteristik' => $karakteristik,
                        'keterangan' => $detail_history['aturans']['apps']['keterangan']
                    ]    
                ];
    
            return response()->json(['status' => 'success', 'result' => $result]);
        }else{
            return response()->json(['status' => 'fail', 'message' => 'Data not found']);
        }

    }

    public function delete($id){
        $delete = History::where('id', $id)->delete();

        if($delete) return response()->json(['status' => 'success']);

        return response()->json(['status' => 'fail', 'message' => 'Data not found']);
    }
}
