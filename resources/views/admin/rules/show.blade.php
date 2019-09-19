@extends('admin')

@section('title', "| $aturan->nama_aturan")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <h1>{{ $aturan->nama_aturan }}</h1>
        
        <hr>

        <div class="chars">
          <span>Characteristics</span><br/>
          <table>
          @foreach ($aturan->chars as $char)
          <tr><td>{{ $char->jenis_karakteristik }}</td><td> : </td><td>{{ $char->nama_karakteristik }}</td></tr>
          @endforeach
          </table>
      </div>
      <hr>
      <h4>Tool : {{ $aturan->apps->nama_aplikasi }}</h4>
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
               {!! Html::linkRoute('rules.edit', 'Edit', array($aturan->id_aturan), array('class' => 'btn btn-primary btn-block')) !!}
             </div>
             <div class="col-sm-6">
                 {!! Form::open(['route' => ['rules.destroy', $aturan->id_aturan], 'method' => 'DELETE']) !!}

                 {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                 {!! Form::close() !!}
                 
             </div>
           </div>

           <div class="row">
              <div class="col-md-12">
                {{ Html::linkRoute('rules.index', 'See All Rule', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
              </div>
           </div>

          </div>
      </div>
    </div>

@endsection
