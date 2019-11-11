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
                    {!! Form::open(array('route' => 'next', 'data-parsley-validate' => '', 'files' => true)) !!}

                    
             {{ Form::label('chars', 'Pilih Karakteristik:', ['class' => 'form-spacing-top']) }}
    {{ Form::select('chars[]', $chars, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}


             {{ Form::submit('Next', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
          {!! Form::close() !!}
        
                      <?php
                        foreach($aturans as $a){
                            $arr[] = $a->id_aturan;
                        }
                        foreach($arr as $ar){
                            $ab = DB::table('aturan_char')->where('aturan_id_aturan', $ar)->get()->pluck('char_id_karakteristik');
                           
                            $ac[] = $ab->all(); 
                        }
                        
                        echo "<pre>";
                        print_r($ac);
                        echo "</pre>";

                        $arrayinput = array('2','5','7','12','13','16');

                        for ($i=0; $i < count($ac) ; $i++) { 
                                $kar = ($ac[$i] == $arrayinput);
                                if ($kar){
                                    echo 'id = '.$arr[$i];
                                }
                        }
                      ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
