@extends('admin')

@section('title', "| Users")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => "PUT"]) }}

       {{ Form::label('name', "Name :") }}
       {{ Form::text('name', null, ['class' => 'form-control']) }}

       {{ Form::label('email', "Email :") }}
       {{ Form::text('email', null, ['class' => 'form-control']) }}

       {{ Form::label('admin', "Admin :") }}
       {{ Form::text('admin', null, ['class' => 'form-control']) }}

       {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px;']) }}

    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
