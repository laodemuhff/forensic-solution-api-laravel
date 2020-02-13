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
                    $namafungsionalitas = DB::table('fungs')->where('id_fungsionalitas', $idfungsionalitas)->value('nama_fungsionalitas');
                    echo "<div class='card'>
                    <ul class='list-group list-group-flush'>
                      <li class='list-group-item'> Functionality : " . $namafungsionalitas . "</li>";
                    echo "<li class='list-group-item'> Characteristic : </br> <ul>";
                    foreach($arrayinput as $ray => $value){     
                        $namachar = DB::table('chars')->where('id_karakteristik', $value)->value('nama_karakteristik');
                        $jenischar = DB::table('chars')->where('id_karakteristik', $value)->value('jenis_karakteristik');
                        echo "<li>" . $jenischar . " " . $namachar . "</li>";
                    }
                    echo "</ul></li>
                    </ul>
                  </div><br/>
                  <a href='javascript:history.back()' class='btn btn-primary'>
                              Back
                              </a><br/><br/>";
                    ?>
                    @foreach ($hasil as $h)
                    <?php
                    if($h == 0 ){
                        echo "Data tidak ditemukan!";
                    } else {
                    $resultnamaaturan = DB::table('aturan')->where('id_aturan', $h)->value('nama_aturan');
                    $resultidchar = DB::table('aturan_char')->where('aturan_id_aturan', $h)->get()->pluck('char_id_karakteristik');
                    $resultidaplikasi = DB::table('aturan')->where('id_aturan', $h)->value('id_aplikasi');
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
                    echo "</ul></div></div></div><br/>";
                    }
                    ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection