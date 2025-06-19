
<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama" class="col-md-2 control-label">Nama</label>
    <div class="col-md-10">
        <input class="form-control" name="nama" type="text" id="nama" value="{{ old('nama', optional($itemServices)->nama) }}" minlength="1" maxlength="50" required="true" placeholder="Enter nama here...">
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div>

