<div class="row mb-1">
    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
        <label class="form-label fs-5" for="Image(s)">Image(s)</label>
        <i>( .png, .jpg, .jpeg )</i>
        <input id="media" type="file" class="filepond @error('images') is-invalid @enderror"
            name="images[]" multiple accept="image/png, image/jpeg, image/jpg" />
        @error('images')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
