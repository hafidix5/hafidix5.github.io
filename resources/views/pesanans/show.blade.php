@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Pesanan' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('pesanans.pesanans.destroy', $pesanans->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('pesanans.pesanans.index') }}" class="btn btn-primary" title="Show All Pesanan">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('pesanans.pesanans.create') }}" class="btn btn-success"
                            title="Create New Pesanan">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('pesanans.pesanans.edit', $pesanans->id) }}" class="btn btn-primary"
                            title="Edit Pesanan">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Pesanan"
                            onclick="return confirm(&quot;Click Ok to delete Pesanan.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Tanggal</dt>
                <dd>{{ \Carbon\Carbon::parse($pesanans->tanggal)->format('d-m-Y') }}</dd>
                <dt>Toko</dt>
                <dd>{{ $pesanans->toko }}</dd>
                <dt>Pemesan</dt>
                <dd>{{ $pesanans->pemesan }}</dd>
                <dt>File Pesanan</dt>
                <dd>
                    @if ($pesanans->file_pesanan)
                        <a href="{{ asset('pesanan/' . $pesanans->file_pesanan) }}" target="_blank">View PDF</a>
                    @endif
                </dd>
                <dt>Created At</dt>
                <dd>{{ $pesanans->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $pesanans->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
