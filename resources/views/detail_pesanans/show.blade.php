@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Detail Pesanans' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('detail_pesanans.detail_pesanans.destroy', $detailPesanans->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('detail_pesanans.detail_pesanans.index') }}" class="btn btn-primary"
                            title="Show All Detail Pesanans">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>
                        {{-- 
                    <a href="{{ route('detail_pesanans.detail_pesanans.create') }}" class="btn btn-success" title="Create New Detail Pesanans">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                     --}}
                        {{--  <a href="{{ route('detail_pesanans.detail_pesanans.edit', $detailPesanans->id) }}"
                            class="btn btn-primary" title="Edit Detail Pesanans">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Detail Pesanans"
                            onclick="return confirm(&quot;Click Ok to delete Detail Pesanans.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button> --}}
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Pesanan</dt>
                <dd>{{ \Carbon\Carbon::parse(optional($detailPesanans->Pesanan)->tanggal)->format('d-m-Y') }}
                </dd>
                <dt>Barang</dt>
                <dd>{{ optional($detailPesanans->Barang)->nama }}</dd>
                <dt>Jumlah Dipesan</dt>
                <dd>{{ $detailPesanans->jumlah_dipesan }}</dd>
                <dt>Jumlah Diterima</dt>
                <dd>{{ $detailPesanans->jumlah_diterima }}</dd>
                <dt>Created At</dt>
                <dd>{{ $detailPesanans->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $detailPesanans->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
