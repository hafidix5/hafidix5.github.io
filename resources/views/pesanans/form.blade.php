<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal" class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-10">
        <input class="form-control" name="tanggal" type="date" id="tanggal"
            value="{{ old('tanggal', optional($pesanans)->tanggal) }}" required="true"
            placeholder="Enter tanggal here...">
        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('toko') ? 'has-error' : '' }}">
    <label for="toko" class="col-md-2 control-label">Toko</label>
    <div class="col-md-10">
        <input class="form-control" name="toko" type="text" id="toko"
            value="{{ old('toko', optional($pesanans)->toko) }}" minlength="1" maxlength="40" required="true"
            placeholder="Enter toko here...">
        {!! $errors->first('toko', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pemesan') ? 'has-error' : '' }}">
    <label for="pemesan" class="col-md-2 control-label">Pemesan</label>
    <div class="col-md-10">
        <input class="form-control" name="pemesan" type="text" id="pemesan"
            value="{{ old('pemesan', optional($pesanans)->pemesan) }}" minlength="1" maxlength="40" required="true"
            placeholder="Enter pemesan here...">
        {!! $errors->first('pemesan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if (optional($pesanans)->toko)
    <div class="form-group {{ $errors->has('file_pesanan') ? 'has-error' : '' }}">
        <label for="file_pesanan" class="col-md-2 control-label">File Pesanan</label>
        <div class="col-md-10">
            <input class="form-control" name="file_pesanan" type="file" id="file_pesanan" accept="application/pdf">
            {!! $errors->first('file_pesanan', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
