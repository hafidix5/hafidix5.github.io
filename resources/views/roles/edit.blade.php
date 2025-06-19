@extends('layouts.app')

@section('content_header_title', 'Users')

@section('content_body')
    <div class="card-header">
        <h3 class="card-title">
            Edit Roles
        </h3>
    </div> <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong> <br />
                <button type="button" id="select-all" class="btn btn-info btn-sm">Select All</button>
                <button type="button" id="deselect-all" class="btn btn-warning btn-sm">Deselect All</button>
                <br><br>

                @foreach ($permissions as $category => $permissionGroup)
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <strong>{{ ucfirst($category) }}</strong> {{-- Capitalize the category name --}}
                        </div>
                        <div class="card-body permission-grid">
                            @foreach ($permissionGroup as $value)
                                <label class="permission-item">
                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'permission-checkbox']) }}
                                    {{ $value->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <br />
                @endforeach
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

    <script>
        // Select all checkboxes when "Select All" button is clicked
        document.getElementById('select-all').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('.permission-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        });

        // Deselect all checkboxes when "Deselect All" button is clicked
        document.getElementById('deselect-all').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('.permission-checkbox');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        });
    </script>

    <style>
        .permission-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .permission-item {
            display: flex;
            align-items: center;
        }

        .permission-checkbox {
            margin-right: 8px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header {
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        .card-body {
            padding: 10px;
        }
    </style>

@endsection
