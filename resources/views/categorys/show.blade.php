@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Category' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('categorys.categorys.destroy', $categorys->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('categorys.categorys.index') }}" class="btn btn-primary"
                            title="Show All Category">
                            <span class="fa fa-th-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('categorys.categorys.create') }}" class="btn btn-success"
                            title="Create New Category">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('categorys.categorys.edit', $categorys->id) }}" class="btn btn-primary"
                            title="Edit Category">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Category"
                            onclick="return confirm(&quot;Click Ok to delete Categorys.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Nama</dt>
                <dd>{{ $categorys->nama }}</dd>
                <dt>Created At</dt>
                <dd>{{ $categorys->created_at }}</dd>
                <dt>Updated At</dt>
                <dd>{{ $categorys->updated_at }}</dd>

            </dl>

        </div>
    </div>
@endsection
