@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Satuan' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('satuans.satuans.destroy', $satuans->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('satuans.satuans.index') }}" class="btn btn-primary" title="Show All Satuan">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('satuans.satuans.create') }}" class="btn btn-success" title="Create New Satuan">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('satuans.satuans.edit', $satuans->id) }}" class="btn btn-primary"
                            title="Edit Satuan">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Satuan"
                            onclick="return confirm(&quot;Click Ok to delete Satuan.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Nama</dt>
                <dd>{{ $satuans->nama }}</dd>
                <dt>Created At</dt>
                <dd>{{ $satuans->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $satuans->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
