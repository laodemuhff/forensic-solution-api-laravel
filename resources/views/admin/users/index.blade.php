@extends('admin')

@section('title', "| Users")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <div class="card-body">
              
<div class="col-md-3" style="float:right;">
            <a href="{{ route('users.create') }}" class="btn bt-lg btn-block btn-primary btn-h1-spacing">Create New User</a>
        
            <br/></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Role</th>
                  <th>Action</th>
               </tr>
            </thead>

            <tbody>
              @foreach ($users as $user)
               <tr>
                  <th>{{ $user->id }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->created_at }}</td>
                  <td>{{ $user->updated_at }}</td>
                  <td>@if ( $user->admin  == '1')
                     Administrator
                     @else
                     Investigator
                     @endif
                  </td>
                  <td style="display: inline-flex;width: 150px;"><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
    {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) }}
          {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {{ Form::close() }}
    </td>
               </tr>
               @endforeach
            </tbody>
          </table>
          </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
