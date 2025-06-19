
<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama" class="col-md-2 control-label">Nama</label>
    <div class="col-md-10">
        <input class="form-control" name="nama" type="text" id="nama" value="{{ old('nama', optional($barangs)->nama) }}" minlength="1" maxlength="40" required="true" placeholder="Enter nama here...">
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('categorys_id') ? 'has-error' : '' }}">
    <label for="categorys_id" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <select class="form-control" id="categorys_id" name="categorys_id" required="true">
        	    <option value="" style="display: none;" {{ old('categorys_id', optional($barangs)->categorys_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select category</option>
        	@foreach ($Categories as $key => $Category)
			    <option value="{{ $key }}" {{ old('categorys_id', optional($barangs)->categorys_id) == $key ? 'selected' : '' }}>
			    	{{ $Category }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('categorys_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('satuans_id') ? 'has-error' : '' }}">
    <label for="satuans_id" class="col-md-2 control-label">Satuan</label>
    <div class="col-md-10">
        <select class="form-control" id="satuans_id" name="satuans_id" required="true">
        	    <option value="" style="display: none;" {{ old('satuans_id', optional($barangs)->satuans_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select satuan</option>
        	@foreach ($Satuans as $key => $Satuan)
			    <option value="{{ $key }}" {{ old('satuans_id', optional($barangs)->satuans_id) == $key ? 'selected' : '' }}>
			    	{{ $Satuan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('satuans_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('stok') ? 'has-error' : '' }}">
    <label for="stok" class="col-md-2 control-label">Stok</label>
    <div class="col-md-10">
        <input class="form-control" name="stok" type="text" id="stok" value="{{ old('stok', optional($barangs)->stok) }}" minlength="1" maxlength="3" required="true" placeholder="Enter stok here...">
        {!! $errors->first('stok', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('harga') ? 'has-error' : '' }}">
    <label for="harga" class="col-md-2 control-label">Harga</label>
    <div class="col-md-10">
        <input class="form-control" name="harga" type="text" id="harga" value="{{ old('harga', optional($barangs)->harga) }}" minlength="1" maxlength="10" required="true" placeholder="Enter harga here...">
        {!! $errors->first('harga', '<p class="help-block">:message</p>') !!}
    </div>
</div>

