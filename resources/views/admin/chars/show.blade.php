@extends('admin')

@section('title', "| Karakteristik")

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $tag->name }} Tag</div>
                <div class="panel-body">
                <h3>{{ $tag->posts()->count() }} Posts</h3>
                <div style="position:relative;float:right;">
                <div class="col-md-5">
      <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">Edit</a>
    </div>
    <div class="col-md-5">
    {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
          {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {{ Form::close() }}
    </div>
</div>
      <table class="table">
         <thead>
           <tr>
             <th>#</th>
             <th>Title</th>
             <th>Tags</th>
             <th></th>
           </tr>
         </thead>

         <tbody>
            @foreach ($tag->posts as $post)
            <tr>
              <th>{{ $post->id }}</th>
              <td>{{ $post->title }}</td>
              <td>@foreach ($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                  @endforeach
              </td>
              <td><a href="{{ route('posts.show', $post->id ) }}" class="btn btn-default btn-sm">View</a></td>
            </tr>
            @endforeach
         </tbody>
      </table>
      </div>
            </div>
    </div>
</div>

@endsection
