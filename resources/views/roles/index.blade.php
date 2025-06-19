@extends('layouts.app')

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'welcome') --}}
@section('content_header_title', 'Users')
{{-- @section('content_header_subtitle', 'Pemeriksaan Fisik') --}}

{{-- Content body: main page content --}}

@section('content_body')
<div class="card-header">
    <h3 class="card-title">
      {{-- <i class="fas fa-list"></i> --}}
      Data Roles
    </h3>
  </div> <br>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Role Management</h2>
            </div> --}}
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" data-toggle="modal" data-target="#lihatModal{{ $role->id }}"
                        href="{{-- {{ route('roles.show',$role->id) }} --}}" title="Show Roles"> <i class="fa fa-info-circle"></i></a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            
            <div id="lihatModal{{ $role->id }}" class="modal" role="dialog">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Lihat Data Role</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
        
                        <div class="modal-body">
                            <form method="post" action="" role="form">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $role->name }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Guard Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" value="{{ $role->guard_name }}"
                                            readonly>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Created At</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $role->created_at }}"
                                            readonly>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Updated At</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $role->updated_at }}"
                                            readonly>
                                    </div>
                                </div>
        
                            </form>
                        </div>
        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>
    

    {!! $roles->render() !!}
@endsection
