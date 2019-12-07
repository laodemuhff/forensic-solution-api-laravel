@extends('admin')

@section('title', "| Dashboard")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (Auth::user()->admin == 1)
                <div class="card-header">Dashboard Admin</div>
                @else
                <div class="card-header">Dashboard User</div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->admin == 1)
                    {{Auth::user()->name}}, Anda login sebagai Admin.
                    @else
                    {{Auth::user()->name}}, Anda login sebagai User.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection