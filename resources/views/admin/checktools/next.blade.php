@extends('admin')

@section('title', "| Result Check Tools")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                </div>
                <div class="card-body">
                    <?php
                    $idaplikasi = DB::table('app_fung')->where('fung_id_fungsionalitas', $idfungsionalitas)->get()->pluck('app_id_aplikasi');
                    foreach ($idaplikasi as $iapp) {
                        $idaturan = DB::table('aturan')->where('id_aplikasi', $iapp)->get()->pluck('id_aturan');
                        $idaturanall[] = $idaturan->all();
                    }
                    foreach ($idaturanall as $row => $innerArray){
                        foreach($innerArray as $innerRow => $value){     
                            $idaturanchar = DB::table('aturan_char')->where('aturan_id_aturan', $value)->get()->pluck('char_id_karakteristik');
                            $idaturancharall[] = $idaturanchar->all();
                            $valueall[] = $value;
                        }
                    }

                    $k = false;
                    $arrayfilter = array_filter($arrayinput);
                    $arrayreindex = array_values($arrayfilter);

                    for ($i = 0; $i < count($idaturancharall); $i++) {
                        $kar = ($idaturancharall[$i] == $arrayreindex);

                        if ($kar) {
                            $k = true;
                            $resultnamaaturan = DB::table('aturan')->where('id_aturan', $valueall[$i])->value('nama_aturan');
                            $resultidchar = DB::table('aturan_char')->where('aturan_id_aturan', $valueall[$i])->get()->pluck('char_id_karakteristik');
                            $resultidaplikasi = DB::table('aturan')->where('id_aturan', $valueall[$i])->value('id_aplikasi');
                            $resultnamaaplikasi = DB::table('apps')->where('id_aplikasi', $resultidaplikasi)->value('nama_aplikasi');
                            $resultketaplikasi = DB::table('apps')->where('id_aplikasi', $resultidaplikasi)->value('keterangan');
                            $resultidfung = DB::table('app_fung')->where('app_id_aplikasi', $resultidaplikasi)->get()->pluck('fung_id_fungsionalitas');
                            echo "<h2>" . $resultnamaaplikasi . "</h2>";
                            echo "<p>" . $resultketaplikasi . "</p>";
                            echo "<div class='row'>
                            <div class='col-sm'><div class='card'><div class='card-header'>
                            Characteristics
                          </div> <ul class='list-group list-group-flush'>";
                            foreach ($resultidchar as $rc) {
                                $resultjeniskarakteristik = DB::table('chars')->where('id_karakteristik', $rc)->value('jenis_karakteristik');
                                $resultnamakarakteristik = DB::table('chars')->where('id_karakteristik', $rc)->value('nama_karakteristik');
                                echo "<li class='list-group-item'>" . $resultjeniskarakteristik . " : " . $resultnamakarakteristik . "</li>";
                            }
                            echo "</ul></div></div>
                            <div class='col-sm'><div class='card'><div class='card-header'>
                            Functionality
                          </div> <ul class='list-group list-group-flush'>";
                            foreach ($resultidfung as $rf) {
                                $resultnamafungsionalitas = DB::table('fungs')->where('id_fungsionalitas', $rf)->value('nama_fungsionalitas');
                                echo "<li class='list-group-item'>" . $resultnamafungsionalitas . "</li>";
                            }
                            echo "</ul></div></div></div><br/>";?>
                            <form method='POST' action="/admin/checktools/save">
                            @csrf
                            <?php 
                            echo "
                            <input type='hidden' id='id_user' name='id_user' value='" . $iduser . "'>
                            <input type='hidden' id='id_aturan' name='id_aturan' value='" . $valueall[$i] . "'>
    
                            <div class='form-group row mb-0'>
                                <div class='col-md-6'>
                                    <button type='submit' class='btn btn-primary'>
                                    Save to History
                                    </button>
                                    <a href='/admin/checktools' class='btn btn-primary'>
                                        Back
                                        </a>
                                </div>
                            </div>
                        </form><br/>";
                        }
                    }
                    if($k === false){
                        echo "Data tidak ditemukan!
                        <br/>
                        <a href='/admin/checktools' class='btn btn-primary'>
                                    Back
                                    </a>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection