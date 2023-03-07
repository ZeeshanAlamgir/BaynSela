    <div class="row">
        <div class="col-12 col-md-9">
            <div class="row mb-2">
                <div class="col-md-6 col-12">
                    <label class="form-label fs-5" for="itemname">Heading</label>
                    <input type="text" class="form-control" id="service_heading_en"
                        aria-describedby="itemname" name="service_heading_en"
                        placeholder="Heading"
                        value="{{ isset($data['service']) ? $data['service']->fieldSingleValue('service_heading', 'en')->value : '' }}"
                        required />
                </div>
                <div class="col-md-6 col-12">
                    <label class="form-label fs-5"
                        for="basic-addon-name">عنوان</label>
                    <input type="text" id="service_heading_ar"
                        name="service_heading_ar" class="form-control"
                        placeholder="عنوان" aria-label="Name"
                        aria-describedby="basic-addon-name"
                        value="{{ isset($data['service']) ? $data['service']->fieldSingleValue('service_heading', 'ar')->value : '' }}"
                        required />
                </div>
            </div>
            <div class="row mb-3">

                <div class="col-md-6 col-12">
                    <label class="form-label fs-5"
                        for="Description">Description</label>
                    <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="5"
                        name="service_description_en" id="service_description_en"
                        >{{ isset($data['service']) ? $data['service']->fieldSingleValue('service_description', 'en')->value : '' }}</textarea>
                </div>
                <div class="col-md-6 col-12">
                    <label class="form-label fs-5" for="Description">وصف</label>
                    <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                        name="service_description_ar" id="service_description_ar" rows="5"
                        >{{ isset($data['service']) ? $data['service']->fieldSingleValue('service_description', 'ar')->value : '' }}</textarea>
                </div>

            </div>

            <div class="row mb-2">
                <h3>Default Filters</h3>
            </div>

            <div class="row mb-2">
                <div class="col-md-5 col-12 mb-1">
                    <label class="form-label fs-5" for="itemname">Label</label>
                    <input type="text" class="form-control" id="label_en"
                        aria-describedby="itemname" name="date_filter_en" value="Date"
                        readonly />
                </div>
                <div class="col-md-5 col-12 mb-1">
                    <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة
                        المناسبة</label>
                    <input type="text" id="label_ar" value="تاريخ"
                        name="date_filter_ar" class="form-control" readonly />
                </div>
                <div class="col-md-2 col-12 mb-1">
                    <label class="form-label fs-5" for="basic-addon-name">Enable</label>
                    <div class="form-check form-switch form-check-success">
                        <input type="checkbox" class="form-check-input "
                            style="cursor:pointer" name="date_filter"
                            {{ isset($data['service']) ? ($data['service']->date_filter ? 'checked' : '') : '' }}/>
                    </div>
                </div>
            </div>

            <div class="row mb-1">
                <h3>Custom Filters</h3>
            </div>


            <div class="row">
                <div class="row">
                    @isset($data['service'])
                        @foreach ($data['service']->filters as $filter)
                            <div class="row">
                                <input type="hidden" name="old_filters[]" value="{{ $filter->id }}">
                                <div class="row mb-1">
                                    <div class="col-md-6 col-12 ">
                                        <label class="form-label fs-5" for="itemname">Label</label>
                                        <input type="text" class="form-control" id="label_en"
                                            aria-describedby="itemname" name="old_label_en[]"
                                            placeholder="Label"
                                            value="{{ $filter->fieldSingleValue('label', 'en')->value }}" required />
                                    </div>
                                    <div class="col-md-6 col-12 ">
                                        <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                                        <input type="text" id="label_ar"
                                            value="{{ $filter->fieldSingleValue('label', 'ar')->value }}"
                                            name="old_label_ar[]" class="form-control" placeholder="ضع الكلمة المناسبة"
                                            aria-describedby="basic-addon-name" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <h4>Values:</h4>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <button class="btn btn-icon btn-relief-outline-primary add_old_filter_value" type="button" data-count="{{ $filter->id }}">
                                            <span>Add New Value</span>
                                    </button>
                                    </div>
                                </div>

                                <div class="row" id="old_filter_values_div_{{ $filter->id }}">
                                    @foreach ($filter->filterValues as $filterValue )
                                        <div class="row mb-1">
                                            <input type="hidden" name="old_filter_values_{{ $filter->id }}[]" value="{{ $filterValue->id }}">
                                            <div class="col-md-5 col-12 mb-1">
                                                <label class="form-label fs-5" for="itemname">Label</label>
                                                <input type="text" class="form-control" id="value_label_en"
                                                    aria-describedby="itemname" name="old_value_label_en_{{ $filterValue->id }}"
                                                    placeholder="Label"
                                                    value="{{ $filterValue->fieldSingleValue('label', 'en')->value }}" required />
                                            </div>
                                            <div class="col-md-5 col-12 mb-1">
                                                <label class="form-label fs-5" for="basic-addon-name">ضع الكلمة المناسبة</label>
                                                <input type="text" id="value_label_ar"
                                                    value="{{ $filterValue->fieldSingleValue('label', 'ar')->value }}"
                                                    name="old_value_label_ar_{{ $filterValue->id }}" class="form-control" placeholder="ضع الكلمة المناسبة"
                                                    aria-describedby="basic-addon-name" required />
                                            </div>
                                            <div class="col-md-2 col-12 mb-1">

                                                <button class=" mt-2 btn btn-icon btn-relief-outline-danger custom_filter_value_delete_btn" type="button">
                                                    <span>Remove Value</span>
                                            </button>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="row mb-1 ">
                                    <div class="col-12 ">
                                        <button class="btn btn-icon btn-relief-outline-danger custom_filter_delete_btn" type="button">
                                            <span>Remove Filter</span>
                                    </button>
                                    </div>
                                </div>

                                <hr/>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="row" id="custom_filters_div">

                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-icon btn-relief-outline-primary"
                            type="button" id="add_new_filter">
                            <i data-feather="plus" class="me-25"></i>
                            <span>Add New Filter</span>
                        </button>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-12 col-md-3">
            <label class="form-label fs-5" for="Image">Image</label>
            <i>( .png, .jpg, .jpeg )</i><br>
            <i>Resolution (1024 * 765)</i>
            <input id="attachment" type="file"
                class="filepond @error('image') is-invalid
                @enderror"
                name="image" accept="image/png, image/jpeg, image/jpg" />
            @error('image')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
