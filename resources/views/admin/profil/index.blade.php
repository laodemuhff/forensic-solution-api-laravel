@extends('admin')

@section('title', "| Profil User")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile User</h6>
                </div>
                <div class="card-body">
                  <p>Nama : {{ $profils->name }}</p>
                  <p>Email : {{ $profils->email }}</p>
                  <p>Role : @if ( $profils->admin  == '1')
                     Administrator
                     @else
                     Investigator
                     @endif</p>
                  <p>Akun dibuat : {{ $profils->created_at }}</p>
                  <a href="{{ route('profil.edit', $profils->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ route('formpassword', $profils->id) }}" class="btn btn-primary">Change Password</a>
          </div>
            </div>
        </div>
    </div>
</div>

@endsection
