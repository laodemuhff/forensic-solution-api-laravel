@extends('admin')

@section('title', "| $app->nama_aplikasi")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <h1>{{ $app->nama_aplikasi }}</h1>
        
        <hr>

        <div class="fungs">
          <span>Functionality : </span><br/>
          @foreach ($app->fungs as $fung)
            <span class="label label-default">{{ $fung->nama_fungsionalitas }}</span><br/>
          @endforeach
      </div>

      <hr>
      <span>Information : </span><br/>
      <?php 
      echo $app->keterangan; 
      ?>

      </div>
      <div class="col-md-4">
        <div class="well">

          <dl class="horizontal">
            <label>Created At:</label>
            <p>{{ date( 'M j, Y h:ia', strtotime($app->created_at)) }}</p>
          </dl>

          <dl class="horizontal">
            <label>Last Updated:</label>
            <p>{{ date('M j, Y h:ia', strtotime($app->updated_at)) }}</p>
          </dl>
          <hr>

          <div class="row">
             <div class="col-sm-6">
               {!! Html::linkRoute('tools.edit', 'Edit', array($app->id_aplikasi), array('class' => 'btn btn-primary btn-block')) !!}
             </div>
             <div class="col-sm-6">
                 {!! Form::open(['route' => ['tools.destroy', $app->id_aplikasi], 'method' => 'DELETE']) !!}

                 {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                 {!! Form::close() !!}
                 
             </div>
           </div>

           <div class="row">
              <div class="col-md-12">
                {{ Html::linkRoute('tools.index', 'See All Tool', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
              </div>
           </div>

          </div>
      </div>
    </div>

@endsection
