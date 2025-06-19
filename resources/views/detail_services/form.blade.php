
<div class="form-group {{ $errors->has('item_services_id') ? 'has-error' : '' }}">
    <label for="item_services_id" class="col-md-2 control-label">Item Service</label>
    <div class="col-md-10">
        <select class="form-control" id="item_services_id" name="item_services_id" required="true">
        	    <option value="" style="display: none;" {{ old('item_services_id', optional($detailServices)->item_services_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select item service</option>
        	@foreach ($ItemServices as $key => $ItemService)
			    <option value="{{ $key }}" {{ old('item_services_id', optional($detailServices)->item_services_id) == $key ? 'selected' : '' }}>
			    	{{ $ItemService }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('item_services_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('biaya') ? 'has-error' : '' }}">
    <label for="biaya" class="col-md-2 control-label">Biaya</label>
    <div class="col-md-10">
        <input class="form-control" name="biaya" type="number" id="biaya" value="{{ old('biaya', optional($detailServices)->biaya) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter biaya here...">
        {!! $errors->first('biaya', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('services_id') ? 'has-error' : '' }}">
    <label for="services_id" class="col-md-2 control-label">Service</label>
    <div class="col-md-10">
        <select class="form-control" id="services_id" name="services_id" required="true">
        	    <option value="" style="display: none;" {{ old('services_id', optional($detailServices)->services_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select service</option>
        	@foreach ($Services as $key => $Service)
			    <option value="{{ $key }}" {{ old('services_id', optional($detailServices)->services_id) == $key ? 'selected' : '' }}>
			    	{{ $Service }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('services_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
 --}}
