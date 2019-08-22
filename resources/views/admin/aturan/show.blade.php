@extends('admin')

@section('title', "| Aturan")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <h1>{{ $aturan->nama_aturan }}</h1>
        
            <span>Aplikasi: {{ $aturan->apps->nama_aplikasi }}</span>
        <hr>

        <div class="chars">
          <span>Karakteristik : </span><br/>
          @foreach ($aturan->chars as $char)
            <span class="label label-default">{{ $char->nama_karakteristik }}</span><br/>
          @endforeach
      </div>

      </div>
      <div class="col-md-4">
        <div class="well">

          <dl class="horizontal">
            <label>Created At:</label>
            <p>{{ date( 'M j, Y h:ia', strtotime($aturan->created_at)) }}</p>
          </dl>

          <dl class="horizontal">
            <label>Last Updated:</label>
            <p>{{ date('M j, Y h:ia', strtotime($aturan->updated_at)) }}</p>
          </dl>
          <hr>

          <div class="row">
             <div class="col-sm-6">
               {!! Html::linkRoute('aturan.edit', 'Edit', array($aturan->id_aturan), array('class' => 'btn btn-primary btn-block')) !!}
             </div>
             <div class="col-sm-6">
                 {!! Form::open(['route' => ['aturan.destroy', $aturan->id_aturan], 'method' => 'DELETE']) !!}

                 {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                 {!! Form::close() !!}
                 
             </div>
           </div>

           <div class="row">
              <div class="col-md-12">
                {{ Html::linkRoute('aturan.index', 'See All Aturan', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
              </div>
           </div>

          </div>
      </div>
    </div>

@endsection
