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
                                    <th>Tool</th>
                                    <th>Created_at</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($histories as $history)
                                <tr>
                                    <th>{{ $history->id }}</th>
                                    <?php
                                    $namaaturan = DB::table('aturan')->where('id_aturan', $history->id_aturan)->value('nama_aturan');
                                    ?>
                                    <td>{{ $namaaturan }}</td>
                                    <?php
                                    $idaplikasi = DB::table('aturan')->where('id_aturan', $history->id_aturan)->value('id_aplikasi');
                                    $namaaplikasi = DB::table('apps')->where('id_aplikasi', $idaplikasi)->value('nama_aplikasi');
                                    ?>
                                    <td>{{ $namaaplikasi }}</td>
                                    <td>{{ $history->created_at }}</td>
                                    <td><a href="{{ route('histories.show', $history->id_aturan) }}" class="btn btn-primary">View</a>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $history->id }}">Delete</button></td>

                                    <div class="modal fade" id="modal-delete-{{ $history->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    {{ Form::open(['route' => ['histories.destroy', $history->id], 'method' => 'DELETE']) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                    {{ Form::close() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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