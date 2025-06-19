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
                <h4 class="mt-5 mb-5">Detail Pesanan</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                {{--  <a href="{{ route('detail_pesanans.detail_pesanans.create') }}" class="btn btn-success" title="Create New Detail Pesanans">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a> --}}
                <a href="{{ route('pesanans.pesanans.index') }}" class="btn btn-primary" title="Show All Pesanan">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>
                <a href="{{ route('pesanans.pesanans.detail', session('pesanan_id')) }}" class="btn btn-success"
                    title="Create New Detail Pesanan">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if (count($detailPesanansObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Detail Pesanan Available.</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped " id="example3">
                        <thead>
                            <tr>
                                <th>Pesanan</th>
                                <th>Barangs</th>
                                <th>Jumlah Dipesan</th>
                                <th>Jumlah Diterima</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailPesanansObjects as $detailPesanans)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse(optional($detailPesanans->Pesanan)->tanggal)->format('d-m-Y') }}
                                    </td>
                                    <td>{{ optional($detailPesanans->Barang)->nama }}</td>
                                    <td>{{ $detailPesanans->jumlah_dipesan }}</td>
                                    <td>{{ $detailPesanans->jumlah_diterima }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('detail_pesanans.detail_pesanans.destroy', $detailPesanans->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('detail_pesanans.detail_pesanans.show', $detailPesanans->id) }}"
                                                    class="btn btn-info" title="Show Detail Pesanans">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                @if ($detailPesanans->jumlah_dipesan != $detailPesanans->jumlah_diterima)
                                                    <a href="{{ route('detail_pesanans.detail_pesanans.edit', $detailPesanans->id) }}"
                                                        class="btn btn-primary" title="Edit Detail Pesanans">
                                                        <span class="fa fa-pen" aria-hidden="true"></span>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger"
                                                        title="Delete Detail Pesanans"
                                                        onclick="return confirm(&quot;Click Ok to delete Detail Pesanans.&quot;)">
                                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                                    </button>
                                                @endif



                                            </div>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            {{--   <div class="panel-footer">
                {!! $detailPesanansObjects->render() !!}
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
