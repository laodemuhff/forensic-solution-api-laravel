@extends('admin')

@section('title', "| Users")

@section('stylesheets')

   {!! Html::style('/css/pasrsely.css') !!}
   {!! Html::style('/css/select2.min.css') !!}
   <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=e4987wwmb9ccykezz0n4p6wrzzr8232te3am1osnsxlzr31b"></script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Aturan</div>

                <div class="card-body">

          {!! Form::open(array('route' => 'aturan.store', 'data-parsley-validate' => '', 'files' => true)) !!}
             {{ Form::label('nama_aturan', 'Nama :') }}
             {{ Form::text('nama_aturan', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}

             {{ Form::label('id_aplikasi', 'Aplikasi :') }}
             <select class='form-control' name='id_aplikasi'>
               @foreach($apps as $app)
                <option value='{{ $app->id_aplikasi }}'>{{ $app->nama_aplikasi }}</option>
               @endforeach

             </select>


             {{ Form::label('chars', 'Karakteristik:', ['class' => 'form-spacing-top']) }}
    {{ Form::select('chars[]', $chars, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}


             {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
          {!! Form::close() !!}

          </div>
            </div>
    </div>
</div>
</div>

@endsection

@section('scripts')

  {!! Html::script('/js/parsely.min.js')   !!}
  {!! Html::script('/js/select2.min.js')   !!}

  <script type="text/javascript">
      $('.select2-multi').select2();
  </script>

@endsection
