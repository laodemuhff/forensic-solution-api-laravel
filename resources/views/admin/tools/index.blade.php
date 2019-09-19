@extends('admin')

@section('title', "| Tool")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tool</h6>
                </div>
                <div class="card-body">

        
<div class="col-md-3" style="float:right;">
            <a href="{{ route('tools.create') }}" class="btn bt-lg btn-block btn-success btn-h1-spacing">Create New Tool</a>
        
            <br/></div>

        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th></th>
              </thead>

              <tbody>
                @foreach ($apps as $app)
                   <tr>
                      <th>{{ $app->id_aplikasi }}</th>
                      <td>{{ $app->nama_aplikasi }}</td>
                      <td>{{ date('M j, Y', strtotime($app->created_at)) }}</td>
                      <td><a href="{{ route('tools.show', $app->id_aplikasi) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('tools.edit', $app->id_aplikasi) }}" class="btn btn-primary">Edit</a>
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
