@extends('admin')

@section('title', "| Aturan")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Aplikasi</div>

                <div class="card-body">
    {{ Form::model($app, ['route' => ['apps.update', $app->id_aplikasi], 'method' => "PUT"]) }}

       {{ Form::label('nama_aplikasi', "Nama :") }}
       {{ Form::text('nama_aplikasi', null, ['class' => 'form-control']) }}
       {{ Form::label('keterangan', "Keterangan :") }}
       {{ Form::text('keterangan', null, ['class' => 'form-control']) }}

       {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}

    {{ Form::close() }}
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
