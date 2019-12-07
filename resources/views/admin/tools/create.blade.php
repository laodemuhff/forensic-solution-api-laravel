@extends('admin')

@section('title', "| Create New Tool")

@section('stylesheets')

{!! Html::style('/css/pasrsely.css') !!}
   {!! Html::style('/css/select2.min.css') !!}
   <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=e4987wwmb9ccykezz0n4p6wrzzr8232te3am1osnsxlzr31b"></script>

   <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'link code textcolor colorpicker image image imagetools media spellchecker'
      });
   </script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create New Tool</div>

                <div class="card-body">

          {!! Form::open(array('route' => 'tools.store', 'data-parsley-validate' => '', 'files' => true)) !!}
             {{ Form::label('nama_aplikasi', 'Name :') }}
             {{ Form::text('nama_aplikasi', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}
             {{ Form::label('keterangan', 'Information :') }}
             {{ Form::textarea('keterangan', null, array('class' => 'form-control')) }}

             {{ Form::label('fungs', 'Functionality:', ['class' => 'form-spacing-top']) }}
    {{ Form::select('fungs[]', $fungs, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}


             {{ Form::submit('Create New Tool', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
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
