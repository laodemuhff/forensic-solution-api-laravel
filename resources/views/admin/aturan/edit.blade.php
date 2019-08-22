@extends('admin')

@section('title', '| Edit Aturan')

@section('stylesheets')

   {!! Html::style('/css/select2.min.css') !!}
   <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=e4987wwmb9ccykezz0n4p6wrzzr8232te3am1osnsxlzr31b"></script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Aturan</div>

                <div class="card-body">
{!! Form::model($aturan, ['route' => ['aturan.update', $aturan->id_aturan], 'method' => 'PUT', 'files' => true ]) !!}

<div class="row">
  <div class="col-md-8">
    {{ Form::label('nama_aturan', 'Nama aturan:')}}
    {{ Form::text('nama_aturan', null, ["class" => 'form-control input-lg']) }}


    {{ Form::label('id_aplikasi', "Aplikasi", ['class' => 'form-spacing-top']) }}
    {{ Form::select('id_aplikasi', $apps, null, ['class' => 'form-control']) }}

    {{ Form::label('chars', 'Karakteristik:', ['class' => 'form-spacing-top']) }}
    {{ Form::select('chars[]', $chars, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="horizontal">
        <dt>Created At:</dt>
        <dd>{{ date( 'M j, Y h:ia', strtotime($aturan->created_at)) }}</dd>
      </dl>

      <dl class="horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($aturan->updated_at)) }}</dd>
      </dl>
      <hr>

      <div class="row">
         <div class="col-sm-5">
           {!! Html::linkRoute('aturan.show', 'Cancel', array($aturan->id_aturan), array('class' => 'btn btn-danger btn-block')) !!}

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
