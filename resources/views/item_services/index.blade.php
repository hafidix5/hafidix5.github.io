@extends('layouts.app')

@section('content')

    @if (Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Item Service</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('item_services.item_services.create') }}" class="btn btn-success"
                    title="Create New Item Services">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if (count($itemServicesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Item Service Available.</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Nama</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemServicesObjects as $itemServices)
                                <tr>
                                    <td>{{ $itemServices->nama }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('item_services.item_services.destroy', $itemServices->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('item_services.item_services.show', $itemServices->id) }}"
                                                    class="btn btn-info" title="Show Item Service">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('item_services.item_services.edit', $itemServices->id) }}"
                                                    class="btn btn-primary" title="Edit Item Service">
                                                    <span class="fa fa-pen" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="Delete Item Services"
                                                    onclick="return confirm(&quot;Click Ok to delete Item Service.&quot;)">
                                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="panel-footer">
                {!! $itemServicesObjects->render() !!}
            </div>
        @endif

    </div>
@endsection
