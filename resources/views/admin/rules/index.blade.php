@extends('admin')

@section('title', "| Rule")

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-11">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Rule</h6>
        </div>
        <div class="card-body">


          <div class="col-md-3" style="float:right;">
            <a href="{{ route('rules.create') }}" class="btn bt-lg btn-block btn-success btn-h1-spacing">Create New Rule</a>

            <br /></div>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th>#</th>
                <th>Name</th>
                <th>Tool</th>
                <th>Created At</th>
                <th></th>
              </thead>

              <tbody>
                @foreach ($aturans as $aturan)
                <tr>
                  <th>{{ $aturan->id_aturan }}</th>
                  <td>{{ $aturan->nama_aturan }}</td>
                  <td>{{ $aturan->apps->nama_aplikasi  }}</td>
                  <td>{{ date('M j, Y', strtotime($aturan->created_at)) }}</td>
                  <td><a href="{{ route('rules.show', $aturan->id_aturan) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('rules.edit', $aturan->id_aturan) }}" class="btn btn-primary">Edit</a>
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