@extends('admin')

@section('title', "| Karakteristik")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Karakteristik</div>

                <div class="card-body">
    {{ Form::model($char, ['route' => ['chars.update', $char->id_karakteristik], 'method' => "PUT"]) }}

       {{ Form::label('nama_karakteristik', "Nama karakteristik :") }}
       {{ Form::text('nama_karakteristik', null, ['class' => 'form-control']) }}

       {{ Form::label('jenis_karakteristik', "Jenis :") }}
       {{ Form::text('jenis_karakteristik', null, ['class' => 'form-control']) }}

       {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}

    {{ Form::close() }}
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
