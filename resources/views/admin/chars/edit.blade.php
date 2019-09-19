@extends('admin')

@section('title', "| Edit Characteristics")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Characteristics</div>

                <div class="card-body">
    {{ Form::model($char, ['route' => ['chars.update', $char->id_karakteristik], 'method' => "PUT"]) }}

       {{ Form::label('nama_karakteristik', "Name :") }}
       {{ Form::text('nama_karakteristik', null, ['class' => 'form-control']) }}

       {{ Form::label('jenis_karakteristik', "Category :") }}
       {{ Form::text('jenis_karakteristik', null, ['class' => 'form-control']) }}

       
       {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px;']) !!}

{{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}


    {{ Form::close() }}
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
