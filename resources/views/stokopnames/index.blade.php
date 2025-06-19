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
    @if (Session::has('danger_message'))
        <div class="alert alert-danger">
            <span class="fa fa-ok"></span>
            {!! session('danger_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Stok opname (Keluar)</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('stokopnames.stokopnames.create') }}" class="btn btn-success"
                    title="Create New Stokopname">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if (count($stokopnamesObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Stok opname Available.</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped " id="example3">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Barang</th>
                                <th>Penerima</th>
                                <th>Jumlah Keluar</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stokopnamesObjects as $stokopnames)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($stokopnames->tanggal)->format('d-m-Y') }}
                                    </td>
                                    <td>{{ optional($stokopnames->Barang)->nama }}</td>
                                    <td>{{ $stokopnames->penerima }}</td>
                                    <td>{{ $stokopnames->jumlah_keluar }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('stokopnames.stokopnames.destroy', $stokopnames->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('stokopnames.stokopnames.show', $stokopnames->id) }}"
                                                    class="btn btn-info" title="Show Stokopname">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('stokopnames.stokopnames.edit', $stokopnames->id) }}"
                                                    class="btn btn-primary" title="Edit Stokopname">
                                                    <span class="fa fa-pen" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="Delete Stokopname"
                                                    onclick="return confirm(&quot;Click Ok to delete Stokopname.&quot;)">
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

            {{-- <div class="panel-footer">
                {!! $stokopnamesObjects->render() !!}
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
