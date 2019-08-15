@extends('admin')

@section('title', '| Create New Post')

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
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Post</div>
                <div class="panel-body">

          {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
             {{ Form::label('title', 'Titile:') }}
             {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength'=> '255')) }}

             {{ Form::label('slug', 'Slug:') }}
             {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

             {{ Form::label('category_id', 'Category:') }}
             <select class='form-control' name='category_id'>
               @foreach($categories as $category)
                <option value='{{ $category->id }}'>{{ $category->name }}</option>
               @endforeach

             </select>

             {{ Form::label('featured_image', 'Upload Featured Image') }}
             {{ Form::file('featured_image') }}

             {{ Form::label('tags', 'Tags:') }}
             <select class='form-control select2-multi' name='tags' multiple="multiple">
               @foreach($tags as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
               @endforeach

             </select>

             {{ Form::label('body', "Post Body:") }}
             {{ Form::textarea('body', null, array('class' => 'form-control')) }}

             {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
          {!! Form::close() !!}

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
