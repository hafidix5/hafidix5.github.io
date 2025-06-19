@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Kendaraan' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('kendaraans.kendaraans.destroy', $kendaraans->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('kendaraans.kendaraans.index') }}" class="btn btn-primary"
                            title="Show All Kendaraan">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('kendaraans.kendaraans.create') }}" class="btn btn-success"
                            title="Create New Kendaraan">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('kendaraans.kendaraans.edit', $kendaraans->id) }}" class="btn btn-primary"
                            title="Edit Kendaraan">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Kendaraans"
                            onclick="return confirm(&quot;Click Ok to delete Kendaraan.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Plat Nomor</dt>
                <dd>{{ $kendaraans->id }}</dd>
                <dt>Jenis Kendaraan</dt>
                <dd>{{ $kendaraans->jenis }}</dd>
                <dt>Pengguna</dt>
                <dd>{{ $kendaraans->pengguna }}</dd>
                <dt>Created At</dt>
                <dd>{{ $kendaraans->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $kendaraans->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
