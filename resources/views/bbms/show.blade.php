@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'BBM' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('bbms.bbms.destroy', $bbms->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('bbms.bbms.index') }}" class="btn btn-primary" title="Show All BBM">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('bbms.bbms.create') }}" class="btn btn-success" title="Create New BBM">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('bbms.bbms.edit', $bbms->id) }}" class="btn btn-primary" title="Edit BBM">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Bbms"
                            onclick="return confirm(&quot;Click Ok to delete BBM.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Nama</dt>
                <dd>{{ $bbms->nama }}</dd>
                <dt>Harga per liter</dt>
                <dd>Rp. {{ number_format($bbms->hargaperliter , 2) }}</dd>
                <dt>Created At</dt>
                <dd>{{ $bbms->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $bbms->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
