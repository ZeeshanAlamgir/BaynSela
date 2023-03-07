<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#accordianEvent{{ $service->id }}" aria-expanded="false"
            aria-controls="accordianEvent{{ $service->id }}">
            {{ $service ? $service->fieldSingleValue('service_heading', 'en')->value : $key }} : Projects/Events
        </button>
    </h2>

    <div id="accordianEvent{{ $service->id }}" class="accordion-collapse collapse"
        data-bs-parent="#accordionDiv_{{ $service->id }}">
        <div class="accordion-body">

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="accordion accordion-margin" id="accordianEvents_{{ $service->id }}">

                                @foreach ($service->events as $key2 => $event)
                                    {{ view('app.admin-panel.services.event-sub-accordian')
                                    ->with('service',$service)->with('event',$event)->with('key2', $key2) }}
                                @endforeach

                            </div>

                            <form method="POST" action="{{ route('services.events.store') }}"
                                enctype="multipart/form-data" id="add_event_form_{{ $service->id }}"
                                class="d-none mt-2">
                                @csrf

                                <div class="row mb-2">
                                    <div class="col-12 col-md-9">

                                        <div class="row mb-2">
                                            <div class="col-md-6 col-12">
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                <label class="form-label fs-5" for="itemname">Service</label>
                                                <input type="text" class="form-control" id="service"
                                                    aria-describedby="itemname" name="service" placeholder="Service"
                                                    value="{{ $service ? $service->fieldSingleValue('service_heading', 'en')->value : '' }}"
                                                    readonly />
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="itemname">Location Link</label>
                                                <input type="text" class="form-control" id="location"
                                                    aria-describedby="itemname" name="location" placeholder="Location"
                                                    value="" required />
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="itemname">Title</label>
                                                <input type="text" class="form-control" id="title_en"
                                                    aria-describedby="itemname" name="title_en" placeholder="Title"
                                                    value="" required />
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                <input type="text" id="title_ar" value="" name="title_ar"
                                                    class="form-control" placeholder="عنوان" aria-label="عنوان"
                                                    aria-describedby="basic-addon-name" required />
                                            </div>
                                        </div>


                                        <div class="row mb-2">
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="itemname">Description</label>
                                                <input type="text" class="form-control" id="description_en"
                                                    aria-describedby="itemname" name="description_en"
                                                    placeholder="Description" value="" required />
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="basic-addon-name">وصف</label>
                                                <input type="text" id="description_ar" value=""
                                                    name="description_ar" class="form-control" placeholder="وصف"
                                                    aria-label="وصف" aria-describedby="basic-addon-name" required />
                                            </div>
                                        </div>

                                        {{-- <div class="row mb-3">
                                            <div class="col-12">
                                                <label class="form-label fs-5" for="itemname">Filters</label>
                                                <select class="select2 form-select" name="filters[]" multiple="multiple" id="{{ $service->id }}">
                                                    @foreach ($service->filters as $filter)
                                                        <option value="{{ $filter->id }}">{{ $filter->fieldSingleValue('label', 'en')->value }}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                        </div> --}}

                                        <div class="row mb-2">
                                            <div class="col-12 col-md-6 mb-1">
                                                <h3>Numbers</h3>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <button class="btn btn-icon btn-relief-outline-primary add_new_number"
                                                    type="button" data-service_id="{{ $service->id }}">
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New Number</span>
                                                </button>
                                            </div>
                                            <div class="col-12" id="numbers_div_{{ $service->id }}">

                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12 col-md-6 mb-1">
                                                <h3>Partnerships</h3>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <button
                                                    class="btn btn-icon btn-relief-outline-primary add_new_partnership"
                                                    data-item="0" type="button"
                                                    data-service_id="{{ $service->id }}">
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New Partnership</span>
                                                </button>
                                            </div>
                                            <div class="col-12" id="partnership_div_{{ $service->id }}">

                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12 col-md-6 mb-1">
                                                <h3>Image Maps</h3>
                                            </div>
                                            <div class="col-12 col-md-6 text-end">
                                                <button
                                                    class="btn btn-icon btn-relief-outline-primary add_new_imagemap"
                                                    data-item="0" type="button"
                                                    data-service_id="{{ $service->id }}">
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New Image Map</span>
                                                </button>
                                            </div>
                                            <div class="col-12" id="imagemaps_div_{{ $service->id }}">

                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <label class="form-label fs-5" for="itemname">About</label>
                                                <textarea class="tinymce-editor" rows="12" name="about_en"></textarea>

                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <label class="form-label fs-5" for="basic-addon-name">حول</label>
                                                <textarea class="tinymce-editor" rows="12" name="about_ar"></textarea>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-12 col-md-3">

                                        <div class="row mb-2">
                                            <label class="form-label fs-5" for="Client Logo">Client Logo</label>
                                            <i>( .png, .jpg, .jpeg )</i><br>
                                            <i>Resolution (132 * 75)</i>
                                            <input id="logo-{{ $service->id }}" type="file"
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
                                            <input id="gallery-{{ $service->id }}" type="file"
                                                class="filepond @error('gallery') is-invalid @enderror"
                                                name="gallery[]" multiple accept="image/png, image/jpeg, image/jpg" />
                                            @error('gallery')
                                                <div class="invalid-tooltip">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">


                                        <button class="btn btn-relief-outline-success text-nowrap px-1 btn-margin-top "
                                            type="submit">
                                            <i data-feather='save'></i>
                                            <span>Save</span>
                                        </button>

                                        <button class="btn btn-icon btn-relief-outline-danger cancel_new_event"
                                            id="cancel_new_event_{{ $service->id }}" type="button"
                                            data-service_id="{{ $service->id }}">
                                            <i data-feather="x" class="me-25"></i>
                                            <span>Cancel</span>
                                        </button>

                                    </div>
                                </div>

                            </form>

                            <div class="row mt-2">
                                <div class="col-6">

                                    <button class="btn btn-icon btn-relief-outline-primary add_new_event"
                                        id="add_new_event_{{ $service->id }}" type="button"
                                        data-service_id="{{ $service->id }}">
                                        <i data-feather="plus" class="me-25"></i>
                                        <span>Add New Event</span>
                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
