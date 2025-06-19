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
                <h4 class="mt-5 mb-5">Service</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('services.services.create') }}" class="btn btn-success" title="Create New Services">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if (count($servicesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Service Available.</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped " id="example3">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kendaraan</th>
                                <th>Toko</th>
                                <th>Alamat</th>
                                <th>Total Biaya</th>
                                <th>Faktur</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicesObjects as $services)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($services->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $services->kendaraan }}</td>
                                    <td>{{ $services->toko }}</td>
                                    <td>{{ $services->alamat }}</td>
                                    <td>Rp. {{ number_format($services->total_biaya, 2) }}</td>
                                    <td>{{ $services->faktur }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('services.services.destroy', $services->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">

                                                <a href="{{ route('services.services.detail_list', $services->id) }}"
                                                    class="btn btn-success" title="Detail Service">
                                                    <span class="fa fa-list" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('services.services.show', $services->id) }}"
                                                    class="btn btn-info" title="Show Service">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('services.services.edit', $services->id) }}"
                                                    class="btn btn-primary" title="Edit Service">
                                                    <span class="fa fa-pen" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="Delete Service"
                                                    onclick="return confirm(&quot;Click Ok to delete Service.&quot;)">
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

            {{--  <div class="panel-footer">
                {!! $servicesObjects->render() !!}
            </div> --}}
        @endif

    </div>
    @push('js')
        <script>
            $(document).ready(function() {
                $('#example3').DataTable();
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endpush
@endsection
