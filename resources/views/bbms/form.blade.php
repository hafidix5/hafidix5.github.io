<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama" class="col-md-2 control-label">Nama</label>
    <div class="col-md-10">
        <input class="form-control" name="nama" type="text" id="nama"
            value="{{ old('nama', optional($bbms)->nama) }}" minlength="1" maxlength="10" required="true"
            placeholder="Enter nama here...">
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hargaperliter') ? 'has-error' : '' }}">
    <label for="hargaperliter" class="col-md-2 control-label">Harga per liter</label>
    <div class="col-md-10">
        <input class="form-control" name="hargaperliter" type="text" id="hargaperliter"
            value="{{ old('hargaperliter', optional($bbms)->hargaperliter) }}" minlength="1" maxlength="8"
            required="true" placeholder="Enter hargaperliter here...">
        {!! $errors->first('hargaperliter', '<p class="help-block">:message</p>') !!}
    </div>
</div>
