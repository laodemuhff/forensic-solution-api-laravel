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
                    <div class="text-lg mb-2">
                    <span class="icon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <span class="text font-weight-bold">Functionality</span>
                    </div>
                    <select class='form-control' name='id_fungsionalitas'>
                        @foreach($fungs as $check)
                        <option value='{{ $check->id_fungsionalitas }}'>{{ $check->nama_fungsionalitas }}</option>
                        @endforeach
                    </select>
                    <br />
                    <div class="text-lg mb-2">
                    <span class="icon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <span class="text font-weight-bold">Characteristics</span>
</div>

                    <?php
                    $category = DB::table('chars')->distinct()->pluck('jenis_karakteristik')->toArray();
                    foreach ($category as $cat) {
                        echo "<div class='row align-items-center h-100 mb-2'><div class='col-2'>";
                        echo $cat;
                        echo "</div>";
                        $range = DB::table('chars')->where('jenis_karakteristik', $cat)->get()->pluck('nama_karakteristik', 'id_karakteristik')->toArray();
                    ?>

                        <div class="col">
                            <select class='form-control' name='karakteristik[]'>
                                    
                            <option value='0'>Not Selected</option>
                                <?php foreach ($range as $key => $ran) { ?>
                                    <option value='<?php echo $key ?>'><?php echo $ran ?></option>
                                <?php } ?>
                            </select>
                        </div>
                </div>

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