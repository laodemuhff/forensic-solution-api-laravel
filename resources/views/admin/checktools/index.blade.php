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

                    {{ Form::label('id_fungsionalitas', 'Pilih Fungsionalitas :') }}
             <select class='form-control' name='id_fungsionalitas'>
               @foreach($fungs as $check)
                <option value='{{ $check->id_fungsionalitas }}'>{{ $check->nama_fungsionalitas }}</option>
               @endforeach

             </select>

             {{ Form::submit('Next', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
          {!! Form::close() !!}
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
