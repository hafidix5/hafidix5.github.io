{{-- <div class="form-group {{ $errors->has('pesanans_id') ? 'has-error' : '' }}">
    <label for="pesanans_id" class="col-md-2 control-label">Pesanans</label>
    <div class="col-md-10">
        <select class="form-control" id="pesanans_id" name="pesanans_id">
            <option value="" style="display: none;"
                {{ old('pesanans_id', optional($detailPesanans)->pesanans_id ?: '') == '' ? 'selected' : '' }} disabled
                selected>Select pesanans</option>
            @foreach ($Pesanans as $key => $Pesanan)
                <option value="{{ $key }}"
                    {{ old('pesanans_id', optional($detailPesanans)->pesanans_id) == $key ? 'selected' : '' }}>
                    {{ $Pesanan }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('pesanans_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

<div class="form-group {{ $errors->has('barangs_id') ? 'has-error' : '' }}">
    <label for="barangs_id" class="col-md-2 control-label">Barang</label>
    <div class="col-md-10">
        <select class="form-control" id="barangs_id" name="barangs_id" required="true">
            <option value="" style="display: none;"
                {{ old('barangs_id', optional($detailPesanans)->barangs_id ?: '') == '' ? 'selected' : '' }} disabled
                selected>Select barang</option>
            @foreach ($Barangs as $key => $Barang)
                <option value="{{ $key }}"
                    {{ old('barangs_id', optional($detailPesanans)->barangs_id) == $key ? 'selected' : '' }}>
                    {{ $Barang }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('barangs_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('jumlah_dipesan') ? 'has-error' : '' }}">
    <label for="jumlah_dipesan" class="col-md-2 control-label">Jumlah Dipesan</label>
    <div class="col-md-10">
        <input class="form-control" name="jumlah_dipesan" type="text" id="jumlah_dipesan"
            value="{{ old('jumlah_dipesan', optional($detailPesanans)->jumlah_dipesan) }}" minlength="1" maxlength="4"
            required="true" placeholder="Enter jumlah dipesan here...">
        {!! $errors->first('jumlah_dipesan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@if (optional($detailPesanans)->jumlah_dipesan)
    <div class="form-group {{ $errors->has('jumlah_diterima') ? 'has-error' : '' }}">
        <label for="jumlah_diterima" class="col-md-2 control-label">Jumlah Diterima</label>
        <div class="col-md-10">
            <input class="form-control" name="jumlah_diterima" type="text" id="jumlah_diterima"
                value="{{ old('jumlah_diterima', optional($detailPesanans)->jumlah_diterima) }}" maxlength="4"
                placeholder="Enter jumlah diterima here...">
            {!! $errors->first('jumlah_diterima', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
