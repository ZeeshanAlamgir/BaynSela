<div class="row" id="filters_div_{{ $service->id }}">

    @foreach ($service->filters as $key => $filter)
        <div class="row">
            <h3>{{ $key + 1 }}.</h3>
        </div>
        <div class="row mb-2">
            <input type="hidden" name="filter_ids[]" value="{{ $filter->id }}">
            <div class="row mb-1">
                <div class="col-md-6 col-12 ">
                    <label class="form-label fs-5" for="itemname">Label</label>
                    <input type="text" class="form-control" id="label_en" aria-describedby="itemname"
                        name="label_en[]" placeholder="Label"
                        value="{{ $filter ? $filter->fieldSingleValue('label', 'en')->value : '' }}" required />
                </div>
                <div class="col-md-6 col-12 ">
                    <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                    <input type="text" id="label_ar"
                        value="{{ $filter ? $filter->fieldSingleValue('label', 'ar')->value : '' }}" name="label_ar[]"
                        class="form-control" placeholder="ضع الكلمة المناسبة" aria-describedby="basic-addon-name"
                        required />
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-12 col-md-6">
                    <h4>Values:</h4>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <button class="btn btn-icon btn-relief-outline-primary add_new_value"
                        data-filter_id="{{ $filter->id }}" type="button">
                        <span>Add New Value</span>
                    </button>
                </div>
            </div>

            <div class="row old_values_div_{{ $filter->id }}">

                @foreach ($filter->filterValues as $filterValue)
                    <input type="hidden" name="filter_value_ids_{{ $filter->id }}[]" value="{{ $filterValue->id }}">
                    <div class="row mb-1">
                        <div class="col-md-6 col-12 mb-1">
                            <label class="form-label fs-5" for="itemname">Label</label>
                            <input type="text" class="form-control" id="label_en" aria-describedby="itemname"
                                name="value_label_en_{{ $filterValue->id }}" placeholder="Label"
                                value="{{ $filterValue ? $filterValue->fieldSingleValue('label', 'en')->value : '' }}"
                                required />
                        </div>
                        <div class="col-md-6 col-12 mb-1">
                            <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                            <input type="text" id="label_ar"
                                value="{{ $filterValue ? $filterValue->fieldSingleValue('label', 'ar')->value : '' }}"
                                name="value_label_ar_{{ $filterValue->id }}" class="form-control"
                                placeholder="ضع الكلمة المناسبة" aria-describedby="basic-addon-name" required />
                        </div>
                    </div>
                @endforeach

            </div>


            <div class="row mb-2">
                <div class="col-12 text-center">
                    <button class="btn btn-relief-outline-danger text-nowrap px-1 btn-margin-top filter_delete_btn me-1"
                        data-delete_id="{{ $filter->id }}" type="button">
                        <i data-feather="x" class="me-25"></i>
                        <span>Delete</span>
                    </button>
                    <button class="btn btn-relief-outline-success text-nowrap px-1 btn-margin-top update_btn"
                        type="submit">
                        <i data-feather="x" class="me-25"></i>
                        <span>Update</span>
                    </button>
                </div>
            </div>

            <hr>
        </div>
    @endforeach


</div>
