@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Service' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('services.services.destroy', $services->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('services.services.index') }}" class="btn btn-primary" title="Show All Service">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('services.services.create') }}" class="btn btn-success"
                            title="Create New Service">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('services.services.edit', $services->id) }}" class="btn btn-primary"
                            title="Edit Service">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Service"
                            onclick="return confirm(&quot;Click Ok to delete Service.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Tanggal</dt>
                <dd>{{ \Carbon\Carbon::parse($services->tanggal)->format('d-m-Y') }}</dd>
                <dt>Kendaraans</dt>
                <dd>{{ optional($services->Kendaraan)->id }}</dd>
                <dt>Toko</dt>
                <dd>{{ $services->toko }}</dd>
                <dt>Alamat</dt>
                <dd>{{ $services->alamat }}</dd>
                <dt>Total Biaya</dt>
                <dd>Rp. {{ number_format($services->total_biaya, 2) }}</dd>
                <dt>Faktur</dt>
                <dd>
                    @if ($services->faktur)
                        <a href="{{ asset('service/' . $services->faktur) }}" target="_blank">View PDF</a>
                    @endif
                </dd>
                <dt>Created At</dt>
                <dd>{{ $services->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $services->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
