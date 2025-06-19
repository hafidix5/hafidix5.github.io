<div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
    <label for="id" class="col-md-2 control-label">Plat Nomor</label>
    <div class="col-md-10">
        <input class="form-control" name="id" type="text" id="id"
            value="{{ old('id', optional($kendaraans)->id) }}" minlength="1" maxlength="12" required="true"
            placeholder="Enter plat nomor here...">
        {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
    <label for="jenis" class="col-md-2 control-label">Jenis</label>
    <div class="col-md-10">
        <input class="form-control" name="jenis" type="text" id="jenis"
            value="{{ old('jenis', optional($kendaraans)->jenis) }}" minlength="1" maxlength="8" required="true"
            placeholder="Enter jenis here...">
        {!! $errors->first('jenis', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
    <label for="jenis" class="col-md-2 control-label">Jenis Kendaraan</label>
    <div class="col-md-10">

        <select class="form-control" id="jenis" name="jenis" required="true">
            <option value="Pilih jenis" style="display: none;"
                {{ old('jenis', optional($kendaraans)->jenis ?: '') == '' ? 'selected' : '' }} disabled selected>--
                Pilih --</option>
            <option value="Mobil" {{ optional($kendaraans)->jenis == 'Mobil' ? 'selected' : '' }}>Mobil
            </option>
            <option value="Motor" {{ optional($kendaraans)->jenis == 'Motor' ? 'selected' : '' }}>Motor
            </option>
        </select>

        {!! $errors->first('jenis', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pengguna') ? 'has-error' : '' }}">
    <label for="pengguna" class="col-md-2 control-label">Pengguna</label>
    <div class="col-md-10">
        <input class="form-control" name="pengguna" type="text" id="pengguna"
            value="{{ old('pengguna', optional($kendaraans)->pengguna) }}" minlength="1" maxlength="40" required="true"
            placeholder="Enter pengguna here...">
        {!! $errors->first('pengguna', '<p class="help-block">:message</p>') !!}
    </div>
</div>
