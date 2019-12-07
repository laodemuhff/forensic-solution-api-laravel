@extends('admin')

@section('title', "| Histories")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Histories</h6>
                </div>
                <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Rule</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th></th>
               </tr>
            </thead>

            <tbody>
              @foreach ($histories as $history)
               <tr>
                  <th>{{ $history->id }}</th>
                  <td>{{ $history->id_aturan }}</td>
                  <td>{{ $history->created_at }}</td>
                  <td>{{ $history->updated_at }}</td>
                  <td><a href="{{ route('history.show', $history->id_aturan) }}" class="btn btn-primary">View</a></td>
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
