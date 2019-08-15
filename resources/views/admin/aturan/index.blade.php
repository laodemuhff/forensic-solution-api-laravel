@extends('admin')

@section('title', "| Aturan")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Aturan</div>

                <div class="card-body">

        <div class="col-md-3" style="float:right;">
            <a href="{{ route('aturan.create') }}" class="btn bt-lg btn-block btn-primary btn-h1-spacing">Create New Aturan</a>
        </div>
     </div>

                <div class="card-body">
                @if (Session::has('success'))

   <div class="alert alert-success" role="alert">
      <strong>Success:</strong> {{ Session::get('success') }}
   </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
         <strong>Errors:</strong>
         <ul>
         @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
         @endforeach
         </ul>
    </div>

@endif
<table class="table">
              <thead>
                <th>#</th>
                <th>Nama Aturan</th>
                <th>Created At</th>
                <th></th>
              </thead>

              <tbody>
                @foreach ($aturan as $aturan)
                   <tr>
                      <th>{{ $aturan->id }}</th>
                      <td>{{ $aturan->nama_aturan }}</td>
                      <td>{{ date('M j, Y', strtotime($aturan->created_at)) }}</td>
                      <td><a href="{{ route('aturan.show', $aturan->id) }}" class="btn btn-default btn-sm">View</a>
                        <a href="{{ route('aturan.edit', $aturan->id) }}" class="btn btn-default btn-sm">Edit</a>
                      </td>
                   </tr>
                @endforeach
              </tbody>
           </table>

           <div class="text-center">
              {!! $aturan->links(); !!}
           </div>
          </div>
            </div>
        </div>
    </div>
</div>
@endsection
