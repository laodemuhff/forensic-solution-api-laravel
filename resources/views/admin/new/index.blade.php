@extends('admin')

@section('title', "| New")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">New</h6>
                </div>
                <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>#</th>
                  <th>User</th>
                  <th>New Condition</th>
                  <th>Created_at</th>
               </tr>
            </thead>

            <tbody>
              @foreach ($news as $new)
               <tr>
                  <th>{{ $new->id }}</th>
                  <td>{{ $new->id_user }}</td>
                  <td>{{ $new->karakteristik }}</td>
                  <td>{{ $new->created_at }}</td>
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
