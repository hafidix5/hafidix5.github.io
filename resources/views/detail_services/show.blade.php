@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Detail Service' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('detail_services.detail_services.destroy', $detailServices->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('detail_services.detail_services.index') }}" class="btn btn-primary"
                            title="Show All Detail Service">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('detail_services.detail_services.create') }}" class="btn btn-success"
                            title="Create New Detail Service">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('detail_services.detail_services.edit', $detailServices->id) }}"
                            class="btn btn-primary" title="Edit Detail Service">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Detail Service"
                            onclick="return confirm(&quot;Click Ok to delete Detail Service.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Item Services</dt>
                <dd>{{ optional($detailServices->ItemService)->nama }}</dd>
                <dt>Biaya</dt>
                <dd>Rp. {{ number_format($detailServices->biaya, 2) }}</dd>
                <dt>Services</dt>
                <dd>{{ optional($detailServices->Service)->id }}</dd>
                <dt>Created At</dt>
                <dd>{{ $detailServices->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $detailServices->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
