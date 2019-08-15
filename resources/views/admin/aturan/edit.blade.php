@extends('admin')

@section('title', '| Edit Blog Post')

@section('stylesheets')

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
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post</div>
                <div class="panel-body">
{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true ]) !!}

  <div class="col-md-8">
    {{ Form::label('title', 'Title:')}}
    {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

    {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
    {{ Form::text('slug', null, ['class' => 'form-control']) }}

    {{ Form::label('category_id', "Category", ['class' => 'form-spacing-top']) }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

    {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

    {{ Form::label('featured_image', 'Update Featured Image:', ['class' => 'form-spacing-top'])}}
    {{ Form::file('featured_image') }}

    {{ Form::label('body', "Body", ['class' => 'form-spacing-top']) }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="horizontal">
        <dt>Created At:</dt>
        <dd>{{ date( 'M j, Y h:ia', strtotime($post->created_at)) }}</dd>
      </dl>

      <dl class="horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
      </dl>
      <hr>

      <div class="row">
         <div class="col-sm-6">
           {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}

         </div>
         <div class="col-sm-6">
             {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
         </div>
       </div>

      </div>
  </div>
  {!! Form::close() !!}
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
