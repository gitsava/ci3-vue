<form>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">Kecamatan</label>

        <div class="col-md-6">
            <select name="kecamatan" id="kecamatan" class="form-control">
                <option value="">== Select Kecamatan ==</option>
                @foreach ($kecamatan as $id => $nama)
                    <option value="{{ $id }}">{{ $nama }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">Kelurahan</label>

        <div class="col-md-6">
            <select name="kelurahan" id="kelurahan" class="form-control">
                <option value="">== Select City ==</option>
            </select>
        </div>
    </div>
</form>