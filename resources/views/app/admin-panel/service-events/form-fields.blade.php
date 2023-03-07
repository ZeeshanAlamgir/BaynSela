
<div class="row mb-2">
    <div class="col-12 col-md-9">

        <div class="row mb-2">
            <div class="col-md-6 col-12 ">

                <label class="form-label fs-5" for="itemname">Service</label>
                <input type="text" class="form-control" id="service"
                    aria-describedby="itemname" name="service" placeholder="Service"
                    value="{{ $service ? $service->fieldSingleValue('service_heading', 'en')->value : '' }}"
                    readonly />
                    <input type="hidden" value="{{ $service->id }}" name="servce_id" id="service_id">
            </div>
            <div class="col-md-6 col-12 position-relative">
                <label class="form-label fs-5" for="itemname">Location Link</label>
                <input type="text" class="form-control" id="location"
                    aria-describedby="itemname" name="location" placeholder="Location"
                    value="{{ isset($event) ? $event->location : old('location') }}"  />
                    {{-- @error('location')
                        <div class="invalid-tooltip">{{ $message }}</div>
                    @enderror --}}
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6 col-12 position-relative">
                <label class="form-label fs-5" for="itemname">Title</label>
                <input type="text" class="form-control" id="title_en"
                    aria-describedby="itemname" name="title_en" placeholder="Title"
                    value="{{ isset($event) ? $event->fieldSingleValue('title', 'en')->value : old('title_en') }}"
                     />
                    {{-- @error('title_en')
                        <div class="invalid-tooltip">{{ $message }}</div>
                    @enderror --}}
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                <input type="text" id="title_ar"
                value="{{ isset($event) ? $event->fieldSingleValue('title', 'ar')->value : old('title_ar')  }}"
                name="title_ar"
                    class="form-control" placeholder="عنوان" aria-label="عنوان"
                    aria-describedby="basic-addon-name"  />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6 col-12">
                <label class="form-label fs-5" for="itemname">Description</label>
                <input type="text" class="form-control" id="description_en"
                    aria-describedby="itemname" name="description_en"
                    placeholder="Description"
                    value="{{ isset($event) ? $event->fieldSingleValue('description', 'en')->value : old('description_en') }}"  />
            </div>
            <div class="col-md-6 col-12">
                <label class="form-label fs-5" for="basic-addon-name">وصف</label>
                <input type="text" id="description_ar"
                value="{{ isset($event) ?  $event->fieldSingleValue('description', 'ar')->value : old('description_ar') }}"
                    name="description_ar" class="form-control" placeholder="وصف"
                    aria-label="وصف" aria-describedby="basic-addon-name"  />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6 col-12">
                <label class="form-label fs-5" for="select2-multiple">Image Maps</label>
                <select name="map_loads[]" class="select2 form-select" id="select2-multiple" multiple>
                    @foreach ($image_map_loads as $image_map_load)
                        @isset($event)
                            <option value="{{ $image_map_load->id }}" {{is_array($maps_array) && in_array($image_map_load->id, $maps_array) ? 'selected' : '' }}
                                >{{ $image_map_load->map_name }}</option>

                        @else
                            <option value="{{ $image_map_load->id }}" {{ (old("map_loads[]") == $image_map_load->id ? "selected":"") }}>{{ $image_map_load->map_name }}</option>
                        @endisset
                    @endforeach
                </select>
                @error('map_loads')
                    <div class="invalid-tooltip">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-1">
            <h3>Default Filters</h3>
        </div>

        {{-- @if ($service!=null) --}}
            @if($service->date_filter!=null)
            @isset($event)
                <div class="row mb-2">
                    <div class="col-12 col-md-6">
                        <input type="hidden" name="date_filter" value="true" />
                        <label class="form-label fs-5" for="fp-range">Date</label>
                        <input
                            type="text"
                            id="fp-range"
                            class="form-control flatpickr-range"
                            placeholder="YYYY-MM-DD to YYYY-MM-DD"
                            name="date"
                            value="@if ($event->start_date != null) {{ $event->start_date }} @endif @if ($event->end_date != null) to {{ $event->end_date }} @endif"
                        />
                    </div>
                </div>
            @else
                <div class="row mb-2">
                    <div class="col-12 col-md-6">
                        <input type="hidden" name="date_filter" value="true" />
                        <label class="form-label fs-5" for="fp-range">Date</label>
                        <input
                            type="text"
                            id="fp-range"
                            class="form-control flatpickr-range"
                            placeholder="YYYY-MM-DD to YYYY-MM-DD"
                            name="date"
                            value=""
                        />
                    </div>
                </div>
            @endisset
            @endif

        {{-- @endif --}}

        <div class="row mb-2">
            <h3>Filters</h3>
        </div>
        <div class="row mb-2">
            @if ($service)
                {{-- @if($service->date_filter!=null) --}}
                <div class="row">
                    @foreach ($service->filters as $filter)
                        <div class="col-6">

                            <div class="row">

                                <div class="col-10">

                                    <label class="form-label fs-5" for="itemname">{{ $filter->fieldSingleValue('label', 'en')->value  }}</label>
                                    <select class="select2 form-select filter_values-{{$filter->id}}" name="filtersvalues[]" id="" multiple="multiple">
                                        @foreach ($filter->filterValues as $filterValue)
            
                                        @isset($event)
                                            @php
                                                $hasFilter = is_event_has_filter_value($event->id,$filter->id,$filterValue->id);
                                            @endphp
                                        @endisset
                                            <option value="{{ $filterValue->id }}" @isset($event) @if ($hasFilter) selected @endif @endisset>{{ $filterValue->fieldSingleValue('label', 'en')->value  }}</option>
            
                                        @endforeach
                                    </select>
        
                                </div>
                                <div class="col-2 mt-2">
        
                                    <label for="">All</label>
                                    <input class="form-check-input" name="checkbox" value="1" type="checkbox" id="filter-{{ $filter->id }}">
        
                                </div>
                            </div>
                        
                    </div>
                        @endforeach
                    </div>
                {{-- @endif --}}
            @endif
        </div>

        <div class="row mb-2">
            <div class="col-12 col-md-6 mb-1">
                <h3>Numbers</h3>
            </div>
            <div class="col-12 col-md-6 text-end">
                <button class="btn btn-icon btn-relief-outline-primary" id="add_new_number"
                    type="button">
                    <i data-feather="plus" class="me-25"></i>
                    <span>Add New Number</span>
                </button>
            </div>

            @isset($event)
                <div class="col-12" id="old_numbers_div">
                    @foreach ($event->numbers as $number)
                        <div class="row mb-2">
                            <input type="hidden" name="old_numbers[]" value="{{ $number->id }}">
                            <div class="col-md-6 col-12">
                                <input type="hidden" name="number_ids[]" value="{{ $number->id }}">
                                <label class="form-label fs-5" for="itemname">Number</label>
                                <input type="text" class="form-control numbers" id="number[]"
                                    aria-describedby="itemname" name="old_number[]"
                                    placeholder="Number"
                                    value="{{ $number->number }}"  />
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">Label</label>
                                <input type="text" class="form-control" id="label_en[]"
                                    aria-describedby="itemname" name="old_label_en[]"
                                    placeholder="Label"
                                    value="{{ $number->fieldSingleValue('label', 'en')->value }}"  />
                            </div>
                            <div class="col-md-6 col-12">
                                <label class="form-label fs-5" for="itemname">مُلصَق</label>
                                <input type="text" class="form-control" id="label_ar[]"
                                    aria-describedby="itemname" name="old_label_ar[]"
                                    placeholder="مُلصَق"
                                    value="{{ $number->fieldSingleValue('label', 'ar')->value }}"  />
                            </div>
                            <div class="col-md-6 col-12">
                                <button class="btn btn-icon btn-relief-outline-danger mt-2 remove_old_number"   type="button"
                                    >
                                    <span>Remove</span>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset

            <div class="col-12" id="numbers_div">

            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-md-6 mb-1">
                <h3>Partnerships</h3>
            </div>
            <div class="col-12 col-md-6 text-end">
                <button
                    class="btn btn-icon btn-relief-outline-primary" id="add_new_partnership"
                    data-item="0" type="button"
                    >
                    <i data-feather="plus" class="me-25"></i>
                    <span>Add New Partnership</span>
                </button>
            </div>

            @isset($event)
                <div class="col-12">
                    @foreach ($event->partnerships as $partnership)
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12 mb-1">
                                            <input type="hidden" name="partnership_ids[]" value="{{ $partnership->id }}">
                                            <label class="form-label fs-5" for="itemname">Title</label>
                                            <input type="text" class="form-control"
                                                aria-describedby="itemname" name="old_partnership_title_en[]"
                                                placeholder="Title"
                                                value="{{ $partnership->fieldSingleValue('title', 'en')->value }}"  required/>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">عنوان</label>
                                            <input type="text" class="form-control"
                                                aria-describedby="itemname" name="old_partnership_title_ar[]"
                                                placeholder="عنوان"
                                                value="{{ $partnership->fieldSingleValue('title', 'ar')->value }}" required />
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">Description</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="old_partnership_description_en[]" placeholder="Description"   >{{ $partnership->fieldSingleValue('description', 'en')->value }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">وصف</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="old_partnership_description_ar[]" placeholder="وصف"   >{{ $partnership->fieldSingleValue('description', 'ar')->value }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <label class="form-label fs-5" for="itemname">Popup Description</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="old_popup_description_en[]" placeholder="Popup Description"   >{{ $partnership->fieldSingleValue('popup_description', 'en')->value }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-2">
                                            <label class="form-label fs-5" for="itemname">وصف منبثق</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="old_popup_description_ar[]" placeholder="وصف منبثق"   >{{ $partnership->fieldSingleValue('popup_description', 'ar')->value }}</textarea>
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
                                                            value="{{ $item->fieldSingleValue('title', 'en')->value }}"  />
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label fs-5" for="itemname">عنوان</label>
                                                        <input type="text" class="form-control"
                                                            aria-describedby="itemname" name="u_e_item_title_ar_{{ $item->id }}[]"
                                                            placeholder="عنوان"
                                                            value="{{ $item->fieldSingleValue('title', 'ar')->value }}"  />
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label fs-5" for="itemname">Description</label>
                                                            <textarea class="form-control form-control-lg "
                                                                rows="5" name="u_e_item_description_en_{{ $item->id }}[]" placeholder="Description"   >{{ $item->fieldSingleValue('description', 'en')->value }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label class="form-label fs-5" for="itemname">وصف</label>
                                                            <textarea class="form-control form-control-lg "
                                                                rows="5" name="u_e_item_description_ar_{{ $item->id }}[]" placeholder="وصف"   >{{ $item->fieldSingleValue('description', 'ar')->value }}</textarea>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <button class="btn btn-icon btn-relief-outline-danger u_e_remove_partnership_item"   type="button"
                                                            >
                                                            <span>Remove Item</span>
                                                        </button>
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
            @endisset

            <div class="col-12" id="partnership_div">

            </div>
        </div>


        {{-- <div class="row mb-2">
            <div class="col-12 col-md-6 mb-1">
                <h3>Image Maps</h3>
            </div>
            <div class="col-12 col-md-6 text-end">
                <button
                    class="btn btn-icon btn-relief-outline-primary " id="add_new_imagemap"
                    data-item="0" type="button"
                    >
                    <i data-feather="plus" class="me-25"></i>
                    <span>Add New Image Map</span>
                </button>
            </div>

            @isset($event)
                <div class="col-12" id="old_imagemaps_div">
                    @foreach ($event->maps as $map)
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-12 mb-1">
                                            <input type="hidden" name="map_ids[]" value="{{ $map->id }}">
                                            <label class="form-label fs-5" for="itemname">Script</label>
                                                <textarea class="form-control form-control-lg "
                                                    rows="5" name="old_scripts[]" placeholder="Place Script here..."  required >{{ $map->script }}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <button class="btn btn-icon btn-relief-outline-danger remove_old_imagemap mt-2"   type="button"
                                                >
                                                <span>Remove Image Map</span>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                </div>
            @endisset

            <div class="col-12" id="imagemaps_div">

            </div>
        </div> --}}

        <div class="row mb-2">
            <div class="col-12">
                <label class="form-label fs-5" for="itemname">About</label>
                <textarea class="tinymce-editor" rows="12" id="about_en" name="about_en" placeholder="About in Eng">@isset($event) {!! $event->fieldSingleValue('about', 'en')->value !!} @endisset</textarea>

            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <label class="form-label fs-5" for="basic-addon-name">حول</label>
                <textarea class="tinymce-editor" rows="12" id="about_ar" name="about_ar" placeholder="About in Ar">@isset($event) {!! $event->fieldSingleValue('about', 'ar')->value !!} @endisset</textarea>
            </div>
        </div>


    </div>

    <div class="col-12 col-md-3">

        <div class="row mb-2">
            <label class="form-label fs-5" for="Client Logo">Client Logo</label>
            <i>( .png, .jpg, .jpeg )</i><br>
            <i>Resolution (132 * 75)</i>
            <input id="logo" type="file"
                class="filepond" name="logo"
                multiple accept="image/png, image/jpeg, image/jpg" />
            {{-- @error('logo') @error('logo') is-invalid @enderror
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror --}}
        </div>

        <div class="row">
            <label class="form-label fs-5" for="Gallery">Gallery</label>
            <i>( .png, .jpg, .jpeg )</i><br>
            <i>Resolution (1492 * 515)</i>
            <input id="gallery" type="file"
                class="filepond "
                name="gallery[]" multiple accept="image/png, image/jpeg, image/jpg" />
            {{-- @error('gallery')@error('gallery') is-invalid @enderror
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror --}}
        </div>

    </div>
</div>
