@extends('admin')

@section('title', '| Edit Tool')

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
                <div class="card-header">Edit Tool</div>

                <div class="card-body">
{!! Form::model($app, ['route' => ['tools.update', $app->id_aplikasi], 'method' => 'PUT', 'files' => true ]) !!}

<div class="row">
  <div class="col-md-8">
    {{ Form::label('nama_aplikasi', 'Name:')}}
    {{ Form::text('nama_aplikasi', null, ["class" => 'form-control input-lg']) }}

    {{ Form::label('keterangan', 'Information:')}}
    {{ Form::textarea('keterangan', null, ["class" => 'form-control input-lg']) }}

    {{ Form::label('fungs', 'Functionality:', ['class' => 'form-spacing-top']) }}
    {{ Form::select('fungs[]', $fungs, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="horizontal">
        <dt>Created At:</dt>
        <dd>{{ date( 'M j, Y h:ia', strtotime($app->created_at)) }}</dd>
      </dl>

      <dl class="horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($app->updated_at)) }}</dd>
      </dl>
      <hr>

      <div class="row">
         <div class="col-sm-5">
           {!! Html::linkRoute('tools.show', 'Cancel', array($app->id_app), array('class' => 'btn btn-danger btn-block')) !!}

         </div>
         <div class="col-sm-7">
             {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
         </div>
       </div>

      </div>
  </div>
</div>
  {!! Form::close() !!}
  </div>
            </div>
    </div>
</div>
</div>

@endsection

@section('scripts')


  {!! Html::script('/js/select2.min.js')   !!}

  <script type="text/javascript">
     $('.select2-multi').select2();
  </script>

@endsection
