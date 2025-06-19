<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal" class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-10">
        <input class="form-control" name="tanggal" type="date" id="tanggal"
            value="{{ old('tanggal', optional($stokopnames)->tanggal) }}" required="true"
            placeholder="Enter tanggal here...">
        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('barangs_id') ? 'has-error' : '' }}">
    <label for="barangs_id" class="col-md-2 control-label">Barang</label>
    <div class="col-md-10">
        <select class="form-control" id="barangs_id" name="barangs_id" required="true">
            <option value="" style="display: none;"
                {{ old('barangs_id', optional($stokopnames)->barangs_id ?: '') == '' ? 'selected' : '' }} disabled
                selected>Select barang</option>
            @foreach ($Barangs as $key => $Barang)
                <option value="{{ $key }}"
                    {{ old('barangs_id', optional($stokopnames)->barangs_id) == $key ? 'selected' : '' }}>
                    {{ $Barang }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('barangs_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('stok') ? 'has-error' : '' }}">
    <label for="stok" class="col-md-2 control-label">Stok</label>
    <div class="col-md-10">
        <input class="form-control" name="stok" type="number" id="stok" value="" minlength="1"
            maxlength="4" readonly placeholder="Sisa Barang">
        {!! $errors->first('stok', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('penerima') ? 'has-error' : '' }}">
    <label for="penerima" class="col-md-2 control-label">Penerima</label>
    <div class="col-md-10">
        <input class="form-control" name="penerima" type="text" id="penerima"
            value="{{ old('penerima', optional($stokopnames)->penerima) }}" minlength="1" maxlength="40"
            required="true" placeholder="Enter penerima here...">
        {!! $errors->first('penerima', '<p class="help-block">:message</p>') !!}
    </div>
</div>


{{-- <div class="form-group {{ $errors->has('jumlah_masuk') ? 'has-error' : '' }}">
    <label for="jumlah_masuk" class="col-md-2 control-label">Jumlah Masuk</label>
    <div class="col-md-10">
        <input class="form-control" name="jumlah_masuk" type="text" id="jumlah_masuk"
            value="{{ old('jumlah_masuk', optional($stokopnames)->jumlah_masuk) }}" minlength="1" maxlength="4"
            required="true" placeholder="Enter jumlah masuk here...">
        {!! $errors->first('jumlah_masuk', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('jumlah_keluar') ? 'has-error' : '' }}">
    <label for="jumlah_keluar" class="col-md-2 control-label">Jumlah Keluar</label>
    <div class="col-md-10">
        <input class="form-control" name="jumlah_keluar" type="number" id="jumlah_keluar"
            value="{{ old('jumlah_keluar', optional($stokopnames)->jumlah_keluar) }}" minlength="1" maxlength="4"
            required="true" placeholder="Enter jumlah keluar here...">
        {!! $errors->first('jumlah_keluar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {

            $('#barangs_id').on('change', function() {

                var barangs_id = document.getElementById('barangs_id').value;
                console.log(barangs_id);
                $.ajax({

                    url: "{{ route('stokopnames.stokopnames.cekstok') }}",

                    type: "POST",

                    data: {
                        barangs_idx: barangs_id,
                        _token: '{{ csrf_token() }}'

                    },

                    dataType: 'json',

                    success: function(result) {
                        document.getElementById('stok').value = result.stok;

                    }

                });

            });

        });
    </script>
@endpush
