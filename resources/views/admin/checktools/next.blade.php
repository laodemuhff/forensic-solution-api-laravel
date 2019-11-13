@extends('admin')

@section('title', "| Check Tools")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Check Tools</h6>
                </div>
                <div class="card-body">
                    <?php

                    foreach ($aturans as $a) {
                        $arr[] = $a->id_aturan;
                    }
                    foreach ($arr as $ar) {
                        $ab = DB::table('aturan_char')->where('aturan_id_aturan', $ar)->get()->pluck('char_id_karakteristik');

                        $ac[] = $ab->all();
                    }

                    for ($i = 0; $i < count($ac); $i++) {
                        $kar = ($ac[$i] == $arrayinput);
                        if ($kar) {
                            echo 'id = ' . $arr[$i];
                            $abxx = DB::table('aturan')->where('id_aturan', $arr[$i])->get()->pluck('nama_aturan');
                            echo $abxx;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection