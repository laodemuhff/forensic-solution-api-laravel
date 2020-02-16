@extends('admin')

@section('title', "| New Fact")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-11">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New Fact</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>New Fact</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($news as $new)
                                <tr>
                                    <th>{{ $new->id }}</th>
                                    <?php
                                    $namauser = DB::table('users')->where('id', $new->id_user)->value('name');
                                    ?>
                                    <td>{{ $namauser }}</td>
                                    <td>{{ $new->karakteristik }}</td>
                                    <td>{{ $new->created_at }}</td>
                                    <td style="display: inline-flex;width: 100px;">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $new->id }}">Delete</button>
                                        <div class="modal fade" id="modal-delete-{{ $new->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        {{ Form::open(['route' => ['new.destroy', $new->id], 'method' => 'DELETE']) }}
                                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                        {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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