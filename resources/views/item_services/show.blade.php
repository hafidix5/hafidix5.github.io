@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Item Service' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('item_services.item_services.destroy', $itemServices->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('item_services.item_services.index') }}" class="btn btn-primary"
                            title="Show All Item Service">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('item_services.item_services.create') }}" class="btn btn-success"
                            title="Create New Item Service">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('item_services.item_services.edit', $itemServices->id) }}" class="btn btn-primary"
                            title="Edit Item Service">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Item Services"
                            onclick="return confirm(&quot;Click Ok to delete Item Service.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Nama</dt>
                <dd>{{ $itemServices->nama }}</dd>
                <dt>Created At</dt>
                <dd>{{ $itemServices->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $itemServices->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
