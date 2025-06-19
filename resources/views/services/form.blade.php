<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal" class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-10">
        <input class="form-control" name="tanggal" type="date" id="tanggal"
            value="{{ old('tanggal', optional($services)->tanggal) }}" required="true"
            placeholder="Enter tanggal here...">
        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('kendaraans_id') ? 'has-error' : '' }}">
    <label for="kendaraans_id" class="col-md-2 control-label">Kendaraan</label>
    <div class="col-md-10">
        <select class="form-control" id="kendaraans_id" name="kendaraans_id" required="true">
            <option value="" style="display: none;"
                {{ old('kendaraans_id', optional($services)->kendaraans_id ?: '') == '' ? 'selected' : '' }} disabled
                selected>Select kendaraan</option>
            @foreach ($Kendaraans as $key => $Kendaraan)
                <option value="{{ $key }}"
                    {{ old('kendaraans_id', optional($services)->kendaraans_id) == $key ? 'selected' : '' }}>
                    {{ $Kendaraan }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('kendaraans_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('toko') ? 'has-error' : '' }}">
    <label for="toko" class="col-md-2 control-label">Toko</label>
    <div class="col-md-10">
        <input class="form-control" name="toko" type="text" id="toko"
            value="{{ old('toko', optional($services)->toko) }}" minlength="1" maxlength="20" required="true"
            placeholder="Enter toko here...">
        {!! $errors->first('toko', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
    <label for="alamat" class="col-md-2 control-label">Alamat</label>
    <div class="col-md-10">
        <input class="form-control" name="alamat" type="text" id="alamat"
            value="{{ old('alamat', optional($services)->alamat) }}" minlength="1" maxlength="50" required="true"
            placeholder="Enter alamat here...">
        {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('total_biaya') ? 'has-error' : '' }}">
    <label for="total_biaya" class="col-md-2 control-label">Total Biaya</label>
    <div class="col-md-10">
        <input class="form-control" name="total_biaya" type="number" id="total_biaya"
            value="{{ old('total_biaya', optional($services)->total_biaya) }}" min="-2147483648" max="2147483647"
            placeholder="Enter total biaya here...">
        {!! $errors->first('total_biaya', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
@if (optional($services)->total_biaya)
    <div class="form-group {{ $errors->has('faktur') ? 'has-error' : '' }}">
        <label for="faktur" class="col-md-2 control-label">Faktur</label>
        <div class="col-md-10">
            <input class="form-control" name="faktur" type="file" id="faktur" accept="application/pdf">
            {!! $errors->first('faktur', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
