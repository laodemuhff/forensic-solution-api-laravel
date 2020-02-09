@extends('admin')

@section('title', "| Functionality")

@section('content')
<div class="row">

  <div class="col-xl-9 col-lg-8">

    <!-- Area Chart -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Functionality</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($fungs as $fung)
              <tr>
                <th>{{ $fung->id_fungsionalitas }}</th>
                <td>{{ $fung->nama_fungsionalitas }}</td>
                <td>{{ $fung->created_at }}</td>
                <td>{{ $fung->updated_at }}</td>
                <td style="display: inline-flex;width: 150px;"><a href="{{ route('funcs.edit', $fung->id_fungsionalitas) }}" class="btn btn-primary">Edit</a>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $fung->id_fungsionalitas }}">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-3 col-lg-4">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create New Functionality</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="well">
          {!! Form::open(['route' => 'funcs.store']) !!}
          {{ Form::label('nama_fungsionalitas', 'Name:') }}
          {{ Form::text('nama_fungsionalitas', null, ['class' => 'form-control']) }}
          <br />
          {{ Form::submit('Create New Functionality', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-delete-{{ $fung->id_fungsionalitas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        {{ Form::open(['route' => ['funcs.destroy', $fung->id_fungsionalitas], 'method' => 'DELETE']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection