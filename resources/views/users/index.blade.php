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
            Data Users
        </h3>
    </div> <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
            <h2>Users Management</h2>
        </div> --}}
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
            <th>Username</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    {{-- <a class="fa fa-info-circle" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                    <x-adminlte-modal id="modalinfo{{ $user->id }}" title="Detail" theme="success" size='sm'
                        disable-animations>
                        <dl class="dl-horizontal">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Roles:</strong>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </dl>
                    </x-adminlte-modal>
                    {{-- Example button to open modal --}}
                    <x-adminlte-button icon="fa fa-info-circle" data-toggle="modal"
                        data-target="#modalinfo{{ $user->id }}" class="bg-info" />

                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $data->render() !!}



@endsection
