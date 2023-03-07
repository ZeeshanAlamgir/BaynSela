<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#accordianEventItem{{ $event->id }}" aria-expanded="false"
            aria-controls="accordianEventItem{{ $event->id }}">
            {{ $key2 + 1 }}:
            {{ $event ? $event->fieldSingleValue('title', 'en')->value : '' }}
        </button>
    </h2>

    <div id="accordianEventItem{{ $event->id }}" class="accordion-collapse collapse"
        data-bs-parent="#accordianEvents_{{ $event->id }}">
        <div class="accordion-body">
            <form method="POST" action="{{ route('services.events.update') }}" enctype="multipart/form-data"
                class="mt-2">
                @csrf

                <div class="row mb-2">

                    <div class="col-12 col-md-9">

                        <div class="row mb-2">
                            <div class="col-md-6 col-12">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <label class="form-label fs-5" for="itemname">Service{{ $event->id }}</label>
                                <input type="text" class="form-control" id="service" aria-describedby="itemname"
                                    name="service" placeholder="Service"
                                    value="{{ $service ? $service->fieldSingleValue('service_heading', 'en')->value : '' }}"
                                    readonly />
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">Location Link</label>
                                <input type="text" class="form-control" id="location" aria-describedby="itemname"
                                    name="location" placeholder="Location" value="{{ $event->location }}" required />
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">Title</label>
                                <input type="text" class="form-control" id="title_en"
                                    aria-describedby="itemname" name="title_en" placeholder="Title"
                                    value="{{ $event->fieldSingleValue('title', 'en')->value  }}" required />
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                <input type="text" id="title_ar"
                                value="{{ $event->fieldSingleValue('title', 'ar')->value  }}" name="title_ar"
                                    class="form-control" placeholder="عنوان" aria-label="عنوان"
                                    aria-describedby="basic-addon-name" required />
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">Description</label>
                                <input type="text" class="form-control" id="description_en"
                                    aria-describedby="itemname" name="description_en"
                                    placeholder="Description" value="{{ $event->fieldSingleValue('description', 'en')->value  }}" required />
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="basic-addon-name">وصف</label>
                                <input type="text" id="description_ar" value="{{ $event->fieldSingleValue('description', 'ar')->value  }}"
                                    name="description_ar" class="form-control" placeholder="وصف"
                                    aria-label="وصف" aria-describedby="basic-addon-name" required />
                            </div>
                        </div>

                        <div class="row mb-1">
                            <h3>Default Filters</h3>
                        </div>

                        @if ($service->date_filter)
                            <div class="row mb-2">
                                <div class="col-12 col-md-6">
                                    <input type="hidden" name="date_filter" value="true" />
                                    <label class="form-label fs-5" for="fp-range">Date</label>
                                    <input
                                        type="text"
                                        id="fp-range-{{ $event->id }}"
                                        class="form-control flatpickr-range"
                                        placeholder="YYYY-MM-DD to YYYY-MM-DD"
                                        name="date"
                                        value="@if ($event->start_date != null) {{ $event->start_date }} @endif @if ($event->end_date != null) to {{ $event->end_date }} @endif"
                                    />
                                </div>
                            </div>
                        @endif

                        <div class="row mb-2">
                            <h3>Filters</h3>
                        </div>

                        <div class="row mb-2">
                            @foreach ($service->filters as $filter)
                                <div class="row col-md-6">
                                    <label class="form-label fs-5" for="itemname">{{ $filter->fieldSingleValue('label', 'en')->value  }}</label>
                                    <select class="select2 form-select" name="filtersvalues[]" id="">
                                        @foreach ($filter->filterValues as $filterValue)
                                            @php
                                                $hasFilter = is_event_has_filter_value($event->id,$filter->id,$filterValue->id);
                                            @endphp

                                            <option value="{{ $filterValue->id }}" @if ($hasFilter) selected @endif >{{ $filterValue->fieldSingleValue('label', 'en')->value  }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        {{-- @php
                            $event_filters = $event->filters;
                            $event_filters_array = [];
                            foreach ($event_filters as $value) {
                                array_push($event_filters_array, $value->id);
                            }
                        @endphp

                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="form-label fs-5" for="itemname">Filters</label>
                                <select class="select2 form-select" name="filters[]" multiple="multiple" id="filter_multi_{{ $event->id }}">
                                    @foreach ($service->filters as $filter)
                                        <option value="{{ $filter->id }}"
                                            {{is_array($event_filters_array) && in_array($filter->id, $event_filters_array) ? 'selected' : '' }}
                                            >{{ $filter->fieldSingleValue('label', 'en')->value }}</option>
                                    @endforeach

                                  </select>
                            </div>
                        </div> --}}

                        <div class="row mb-2">
                            <div class="col-12 col-md-6 mb-1">
                                <h3>Numbers</h3>
                            </div>
                            <div class="col-12 col-md-6 text-end">
                                <button class="btn btn-icon btn-relief-outline-primary u_e_add_new_number"
                                    type="button" data-event_id="{{ $event->id }}">
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New Number</span>
                                </button>
                            </div>
                            <div class="col-12" id="u_e_numbers_div_{{ $event->id }}">

                                @foreach ($event->numbers as $number)
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12">
                                            <input type="hidden" name="number_ids[]" value="{{ $number->id }}">
                                            <label class="form-label fs-5" for="itemname">Number</label>
                                            <input type="text" class="form-control" id="number[]"
                                                aria-describedby="itemname" name="number[]"
                                                placeholder="Number"
                                                value="{{ $number->number }}" required />
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="form-label fs-5" for="itemname">Label</label>
                                            <input type="text" class="form-control" id="label_en[]"
                                                aria-describedby="itemname" name="label_en[]"
                                                placeholder="Label"
                                                value="{{ $number->fieldSingleValue('label', 'en')->value }}" required />
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="form-label fs-5" for="itemname">مُلصَق</label>
                                            <input type="text" class="form-control" id="label_ar[]"
                                                aria-describedby="itemname" name="label_ar[]"
                                                placeholder="مُلصَق"
                                                value="{{ $number->fieldSingleValue('label', 'ar')->value }}" required />
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <button class="btn btn-icon btn-relief-outline-danger mt-2 u_e_remove_number"   type="button"
                                                >
                                                <span>Remove</span>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-md-6 mb-1">
                                <h3>Partnerships</h3>
                            </div>
                            <div class="col-12 col-md-6 text-end">
                                <button
                                    class="btn btn-icon btn-relief-outline-primary u_e_add_new_partnership"
                                    data-item="0" type="button"
                                    data-event_id="{{ $event->id }}">
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New Partnership</span>
                                </button>
                            </div>
                            <div class="col-12" id="u_e_partnership_div_{{ $event->id }}">

                                @foreach ($event->partnerships as $partnership)
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12 mb-1">
                                            <input type="hidden" name="partnership_ids[]" value="{{ $partnership->id }}">
                                            <label class="form-label fs-5" for="itemname">Title</label>
                                            <input type="text" class="form-control"
                                                aria-describedby="itemname" name="partnership_title_en[]"
                                                placeholder="Title"
                                                value="{{ $partnership->fieldSingleValue('title', 'en')->value }}" required />
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">عنوان</label>
                                            <input type="text" class="form-control"
                                                aria-describedby="itemname" name="partnership_title_ar[]"
                                                placeholder="عنوان"
                                                value="{{ $partnership->fieldSingleValue('title', 'ar')->value }}" required />
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">Description</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="partnership_description_en[]" placeholder="Description"  required >{{ $partnership->fieldSingleValue('description', 'en')->value }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">وصف</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="partnership_description_ar[]" placeholder="وصف"  required >{{ $partnership->fieldSingleValue('description', 'ar')->value }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">Popup Description</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="popup_description_en[]" placeholder="Popup Description"  required >{{ $partnership->fieldSingleValue('popup_description', 'en')->value }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-2">
                                            <label class="form-label fs-5" for="itemname">وصف منبثق</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="popup_description_ar[]" placeholder="وصف منبثق"  required >{{ $partnership->fieldSingleValue('popup_description', 'ar')->value }}</textarea>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <h3>Items:</h3>
                                                </div>
                                                <div class="col-12 col-md-6 text-end">
                                                    <button class="btn btn-icon btn-relief-outline-primary u_e_add_new_item" data-partnership_id="{{ $partnership->id }}" type="button"
                                                        >
                                                        <span>Add New Item</span>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 mb-1 " id="u_e_items_div_{{ $partnership->id }}">

                                            @foreach ($partnership->items as $item)
                                                <div class="row mb-1">
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <input type="hidden" name="p_items_{{ $partnership->id }}[]" value="{{ $item->id }}">
                                                        <label class="form-label fs-5" for="itemname">Title</label>
                                                        <input type="text" class="form-control"
                                                            aria-describedby="itemname" name="u_e_item_title_en_{{ $item->id }}[]"
                                                            placeholder="Title"
                                                            value="{{ $item->fieldSingleValue('title', 'en')->value }}" required />
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label fs-5" for="itemname">عنوان</label>
                                                        <input type="text" class="form-control"
                                                            aria-describedby="itemname" name="u_e_item_title_ar_{{ $item->id }}[]"
                                                            placeholder="عنوان"
                                                            value="{{ $item->fieldSingleValue('title', 'ar')->value }}" required />
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label fs-5" for="itemname">Description</label>
                                                            <textarea class="form-control form-control-lg "
                                                                rows="5" name="u_e_item_description_en_{{ $item->id }}[]" placeholder="Description"  required >{{ $item->fieldSingleValue('description', 'en')->value }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label fs-5" for="itemname">وصف</label>
                                                            <textarea class="form-control form-control-lg "
                                                                rows="5" name="u_e_item_description_ar_{{ $item->id }}[]" placeholder="وصف"  required >{{ $item->fieldSingleValue('description', 'ar')->value }}</textarea>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <button class="btn btn-icon btn-relief-outline-danger u_e_remove_partnership"   type="button"
                                                >
                                                <span>Remove Partnership</span>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 col-md-6 mb-1">
                                <h3>Image Maps</h3>
                            </div>
                            <div class="col-12 col-md-6 text-end">
                                <button
                                    class="btn btn-icon btn-relief-outline-primary u_e_add_new_imagemap"
                                    data-item="0" type="button"
                                    data-event_id="{{ $event->id }}">
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New Image Map</span>
                                </button>
                            </div>
                            <div class="col-12" id="u_e_imagemaps_div_{{ $event->id }}">

                                @foreach ($event->maps as $map)
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12 mb-1">
                                            <input type="hidden" name="map_ids[]" value="{{ $map->id }}">
                                            <label class="form-label fs-5" for="itemname">Script</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="scripts[]" placeholder="Place Script here..."  required >{{ $map->script }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <button class="btn btn-icon btn-relief-outline-danger u_e_remove_imagemap mt-2"   type="button"
                                                >
                                                <span>Remove Image Map</span>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="form-label fs-5" for="itemname">About</label>
                                <textarea class="tinymce-editor" rows="12" name="about_en" required>{!! $event->fieldSingleValue('about', 'en')->value !!}</textarea>

                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="form-label fs-5" for="basic-addon-name">حول</label>
                                <textarea class="tinymce-editor" rows="12" name="about_ar" required>{!! $event->fieldSingleValue('about', 'ar')->value !!}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-md-3">

                        <div class="row mb-2">
                            <label class="form-label fs-5" for="Client Logo">Client Logo</label>
                            <i>( .png, .jpg, .jpeg )</i><br>
                            <i>Resolution (132 * 75)</i>
                            <input id="update-logo-{{ $event->id }}" type="file"
                                class="filepond @error('logo') is-invalid @enderror" name="logo"
                                multiple accept="image/png, image/jpeg, image/jpg" />
                            @error('logo')
                                <div class="invalid-tooltip">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <label class="form-label fs-5" for="Gallery">Gallery</label>
                            <i>( .png, .jpg, .jpeg )</i><br>
                            <i>Resolution (1492 * 515)</i>
                            <input id="update-gallery-{{ $event->id }}" type="file"
                                class="filepond @error('gallery') is-invalid @enderror"
                                name="gallery[]" multiple accept="image/png, image/jpeg, image/jpg" />
                            @error('gallery')
                                <div class="invalid-tooltip">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-6">

                            <button class="btn btn-relief-outline-success text-nowrap px-1 btn-margin-top "
                                type="submit">
                                <i data-feather='save'></i>
                                <span>Update</span>
                            </button>

                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
