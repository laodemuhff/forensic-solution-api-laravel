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
                  <th>User</th>
                  <th>Rule</th>
                  <th>Created_at</th>
               </tr>
            </thead>

            <tbody>
              @foreach ($histories as $history)
               <tr>
                  <th>{{ $history->id }}</th>
                  <?php
                    $namauser = DB::table('users')->where('id', $history->id_user)->value('name');
                  ?>
                  <td>{{ $namauser }}</td>
                  <?php
                    $namaaturan = DB::table('aturan')->where('id_aturan', $history->id_aturan)->value('nama_aturan');
                  ?>
                  <td>{{ $namaaturan }}</td>
                  <td>{{ $history->created_at }}</td>
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
