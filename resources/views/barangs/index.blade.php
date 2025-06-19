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
                <h4 class="mt-5 mb-5">Barang</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('barangs.barangs.create') }}" class="btn btn-success" title="Create New Barangs">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

            <br><br>
            <div class="form-group">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2">
                        <form action="{{ route('barangs.import') }}" method="POST" enctype="multipart/form-data"
                            class="d-flex align-items-center gap-2 m-0">
                            @csrf
                            <input type="file" name="file" class="form-control w-auto">
                            <button class="btn btn-success">Import Data</button>
                        </form>
                        <a class="btn btn-warning" href="{{ route('barangs.export') }}">Export Data</a>
                    </div>

                </div>
            </div>


        </div>

        @if (count($barangsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Barang Available.</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped " id="example3">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Category</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Harga</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangsObjects as $barangs)
                                <tr>
                                    <td>{{ $barangs->nama }}</td>
                                    <td>{{ optional($barangs->Category)->nama }}</td>
                                    <td>{{ optional($barangs->Satuan)->nama }}</td>
                                    <td>{{ $barangs->stok }}</td>
                                    <td>Rp. {{ number_format($barangs->harga , 2) }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('barangs.barangs.destroy', $barangs->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('barangs.barangs.show', $barangs->id) }}"
                                                    class="btn btn-info" title="Show Barangs">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('barangs.barangs.edit', $barangs->id) }}"
                                                    class="btn btn-primary" title="Edit Barangs">
                                                    <span class="fa fa-pen" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="Delete Barangs"
                                                    onclick="return confirm(&quot;Click Ok to delete Barangs.&quot;)">
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
                {!! $barangsObjects->render() !!}
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
