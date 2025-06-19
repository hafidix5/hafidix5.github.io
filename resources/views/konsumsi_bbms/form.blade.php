<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal" class="col-md-2 control-label">Tanggal</label>
    <div class="col-md-10">
        <input class="form-control" name="tanggal" type="date" id="tanggal"
            value="{{ old('tanggal', optional($konsumsiBbms)->tanggal) }}" required="true"
            placeholder="Enter tanggal here...">
        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('kendaraans_id') ? 'has-error' : '' }}">
    <label for="kendaraans_id" class="col-md-2 control-label">Kendaraan</label>
    <div class="col-md-10">
        <select class="form-control" id="kendaraans_id" name="kendaraans_id" required="true">
            <option value="" style="display: none;"
                {{ old('kendaraans_id', optional($konsumsiBbms)->kendaraans_id ?: '') == '' ? 'selected' : '' }}
                disabled selected>Select kendaraan</option>
            @foreach ($Kendaraans as $key => $Kendaraan)
                <option value="{{ $key }}"
                    {{ old('kendaraans_id', optional($konsumsiBbms)->kendaraans_id) == $key ? 'selected' : '' }}>
                    {{ $Kendaraan }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('kendaraans_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bbms_id') ? 'has-error' : '' }}">
    <label for="bbms_id" class="col-md-2 control-label">BBM</label>
    <div class="col-md-10">
        <select class="form-control" id="bbms_id" name="bbms_id" required="true">
            <option value="" style="display: none;"
                {{ old('bbms_id', optional($konsumsiBbms)->bbms_id ?: '') == '' ? 'selected' : '' }} disabled selected>
                Select BBM</option>
            @foreach ($Bbms as $key => $Bbm)
                <option value="{{ $key }}"
                    {{ old('bbms_id', optional($konsumsiBbms)->bbms_id) == $key ? 'selected' : '' }}>
                    {{ $Bbm }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('bbms_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
    <label for="jumlah" class="col-md-2 control-label">Jumlah</label>
    <div class="col-md-10">
        <input class="form-control" name="jumlah" type="number" id="jumlah"
            value="{{ old('jumlah', optional($konsumsiBbms)->jumlah) }}" min="-2147483648" max="2147483647"
            required="true" placeholder="Enter jumlah here...">
        {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total_harga') ? 'has-error' : '' }}">
    <label for="total_harga" class="col-md-2 control-label">Total Harga</label>
    <div class="col-md-10">
        <input class="form-control" name="total_harga" type="number" id="total_harga"
            value="{{ old('total_harga', optional($konsumsiBbms)->total_harga) }}" min="-2147483648" max="2147483647"
            readonly placeholder="Enter total harga here...">
        {!! $errors->first('total_harga', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@push('js')
    <script>
        $(document).ready(function() {

            $('#jumlah').on('change', function() {

                var bbms_id = document.getElementById('bbms_id').value;
                var jumlah = document.getElementById('jumlah').value;
                $.ajax({

                    url: "{{ route('konsumsi_bbms.konsumsi_bbms.cekbbm') }}",

                    type: "POST",

                    data: {
                        bbms_idx: bbms_id,
                        _token: '{{ csrf_token() }}'

                    },

                    dataType: 'json',

                    success: function(result) {
                        document.getElementById('total_harga').value = result.bbms_id *
                            jumlah;

                    }

                });

            });

        });
    </script>
@endpush
