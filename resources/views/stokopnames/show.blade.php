@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Stok opname (Keluar)' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('stokopnames.stokopnames.destroy', $stokopnames->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('stokopnames.stokopnames.index') }}" class="btn btn-primary"
                            title="Show All Stokopname">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('stokopnames.stokopnames.create') }}" class="btn btn-success"
                            title="Create New Stokopname">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('stokopnames.stokopnames.edit', $stokopnames->id) }}" class="btn btn-primary"
                            title="Edit Stokopname">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Stokopname"
                            onclick="return confirm(&quot;Click Ok to delete Stokopname.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Tanggal</dt>
                <dd>{{ \Carbon\Carbon::parse($stokopnames->tanggal)->format('d-m-Y') }}</dd>
                <dt>Barangs</dt>
                <dd>{{ optional($stokopnames->Barang)->nama }}</dd>
                <dt>Penerima</dt>
                <dd>{{ $stokopnames->penerima }}</dd>
                <dt>Jumlah Keluar</dt>
                <dd>{{ $stokopnames->jumlah_keluar }}</dd>
                <dt>Created At</dt>
                <dd>{{ $stokopnames->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $stokopnames->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
