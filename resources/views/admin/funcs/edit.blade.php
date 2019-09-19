@extends('admin')

@section('title', "| Edit Functionality")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Functionality</div>

                <div class="card-body">
    {{ Form::model($fung, ['route' => ['funcs.update', $fung->id_fungsionalitas], 'method' => "PUT"]) }}

       {{ Form::label('nama_fungsionalitas', "Name :") }}
       {{ Form::text('nama_fungsionalitas', null, ['class' => 'form-control']) }}

         {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-danger', 'style' => 'margin-top:20px;']) !!}

         {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}
         
       

    {{ Form::close() }}
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
