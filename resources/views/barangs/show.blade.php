@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Barang' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('barangs.barangs.destroy', $barangs->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('barangs.barangs.index') }}" class="btn btn-primary" title="Show All Barang">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('barangs.barangs.create') }}" class="btn btn-success" title="Create New Barang">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('barangs.barangs.edit', $barangs->id) }}" class="btn btn-primary"
                            title="Edit Barangs">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Barang"
                            onclick="return confirm(&quot;Click Ok to delete Barangs.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Nama</dt>
                <dd>{{ $barangs->nama }}</dd>
                <dt>Category</dt>
                <dd>{{ optional($barangs->Category)->nama }}</dd>
                <dt>Satuan</dt>
                <dd>{{ optional($barangs->Satuan)->nama }}</dd>
                <dt>Stok</dt>
                <dd>{{ $barangs->stok }}</dd>
                <dt>Harga</dt>
                <dd>Rp. {{ number_format($barangs->harga, 2) }}</dd>
                <dt>Created At</dt>
                <dd>{{ $barangs->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $barangs->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
