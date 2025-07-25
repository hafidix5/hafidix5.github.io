@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Konsumsi BBM' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('konsumsi_bbms.konsumsi_bbms.index') }}" class="btn btn-primary"
                    title="Show All Konsumsi BBM">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('konsumsi_bbms.konsumsi_bbms.create') }}" class="btn btn-success"
                    title="Create New Konsumsi BBM">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('konsumsi_bbms.konsumsi_bbms.update', $konsumsiBbms->id) }}"
                id="edit_konsumsi_bbms_form" name="edit_konsumsi_bbms_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('konsumsi_bbms.form', [
                    'konsumsiBbms' => $konsumsiBbms,
                ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
