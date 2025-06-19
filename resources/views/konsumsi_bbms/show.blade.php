@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Konsumsi BBM' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('konsumsi_bbms.konsumsi_bbms.destroy', $konsumsiBbms->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('konsumsi_bbms.konsumsi_bbms.index') }}" class="btn btn-primary"
                            title="Show All Konsumsi BBM">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('konsumsi_bbms.konsumsi_bbms.create') }}" class="btn btn-success"
                            title="Create New Konsumsi BBM">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('konsumsi_bbms.konsumsi_bbms.edit', $konsumsiBbms->id) }}" class="btn btn-primary"
                            title="Edit Konsumsi BBM">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Konsumsi BBM"
                            onclick="return confirm(&quot;Click Ok to delete Konsumsi BBM.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Tanggal</dt>
                <dd>{{ \Carbon\Carbon::parse($konsumsiBbms->tanggal)->format('d-m-Y') }}</dd>
                <dt>Kendaraans</dt>
                <dd>{{ optional($konsumsiBbms->Kendaraan)->id }}</dd>
                <dt>Bbms</dt>
                <dd>{{ optional($konsumsiBbms->Bbm)->nama }}</dd>
                <dt>Jumlah</dt>
                <dd>{{ $konsumsiBbms->jumlah }}</dd>
                <dt>Total Harga</dt>
                <dd>Rp. {{ number_format($konsumsiBbms->total_harga , 2) }}</dd>
                <dt>Created At</dt>
                <dd>{{ $konsumsiBbms->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $konsumsiBbms->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
