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
                <h4 class="mt-5 mb-5">Konsumsi BBM</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('konsumsi_bbms.konsumsi_bbms.create') }}" class="btn btn-success"
                    title="Create New Konsumsi BBM">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if (count($konsumsiBbmsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Konsumsi BBM Available.</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped " id="example3">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kendaraan</th>
                                <th>BBM</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konsumsiBbmsObjects as $konsumsiBbms)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($konsumsiBbms->tanggal)->format('d-m-Y') }}
                                    </td>
                                    <td>{{ optional($konsumsiBbms->Kendaraan)->id }}</td>
                                    <td>{{ optional($konsumsiBbms->Bbm)->nama }}</td>
                                    <td>{{ $konsumsiBbms->jumlah }}</td>
                                    <td>Rp. {{ number_format($konsumsiBbms->total_harga , 2) }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('konsumsi_bbms.konsumsi_bbms.destroy', $konsumsiBbms->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('konsumsi_bbms.konsumsi_bbms.show', $konsumsiBbms->id) }}"
                                                    class="btn btn-info" title="Show Konsumsi BBM">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('konsumsi_bbms.konsumsi_bbms.edit', $konsumsiBbms->id) }}"
                                                    class="btn btn-primary" title="Edit Konsumsi BBM">
                                                    <span class="fa fa-pen" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="Delete Konsumsi Bbms"
                                                    onclick="return confirm(&quot;Click Ok to delete Konsumsi BBM.&quot;)">
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
                {!! $konsumsiBbmsObjects->render() !!}
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
