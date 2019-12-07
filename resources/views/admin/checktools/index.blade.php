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
                    {!! Form::open(array('route' => 'next')) !!}

                    <h2>Functionality</h2>
             <select class='form-control' name='id_fungsionalitas'>
               @foreach($fungs as $check)
                <option value='{{ $check->id_fungsionalitas }}'>{{ $check->nama_fungsionalitas }}</option>
               @endforeach
             </select>
<br/>
<h2>Characteristics</h2>
             
             <?php
                    $asdd = DB::table('chars')->distinct()->pluck('jenis_karakteristik')->toArray();
                    foreach ($asdd as $dsaa) {
                        echo $dsaa . " :";
                        echo "<br/>";
                        $ab12 = DB::table('chars')->where('jenis_karakteristik', $dsaa)->get()->pluck('nama_karakteristik', 'id_karakteristik')->toArray();
                        ?>
                        <select class='form-control' name='karakteristik[]'>
                            <?php foreach ($ab12 as $key => $ab21) { ?>
                                <option value='<?php echo $key ?>'><?php echo $ab21 ?></option>
                            <?php } ?>

                        </select>
                    <?php
                    }
                    ?>

             {{ Form::submit('Next', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
          {!! Form::close() !!}
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
