@extends('admin')

@section('title', "| Aturan")

@section('content')
<div class="row">

            <div class="col-xl-9 col-lg-8">

              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Aplikasi</h6>
                </div>
                <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                  <th>#</th>
                  <th>Nama Aplikasi</th>
                  <th>Keterangan</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Action</th>
               </tr>
                  </thead>
                  <tbody>
              @foreach ($apps as $app)
               <tr>
                  <th>{{ $app->id_aplikasi }}</th>
                  <td>{{ $app->nama_aplikasi }}</td>
                  <td>{{ $app->keterangan }}</td>
                  <td>{{ $app->created_at }}</td>
                  <td>{{ $app->updated_at }}</td>
                  <td style="display: inline-flex;width: 150px;"><a href="{{ route('apps.edit', $app->id_aplikasi) }}" class="btn btn-primary">Edit</a>
    {{ Form::open(['route' => ['apps.destroy', $app->id_aplikasi], 'method' => 'DELETE']) }}
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

             <div class="col-xl-3 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Aplikasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="well">
             {!! Form::open(['route' => 'apps.store']) !!}
                {{ Form::label('nama_aplikasi', 'Nama Aplikasi:') }}
                {{ Form::text('nama_aplikasi', null, ['class' => 'form-control']) }}
                {{ Form::label('keterangan', 'Keterangan:') }}
                {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
               <br/>
                {{ Form::submit('Create New App', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}
             {!! Form::close() !!}
          </div>
                </div>
              </div>
            </div>
          </div>


@endsection