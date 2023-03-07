<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#accordianItem{{ $service->id }}" aria-expanded="false"
            aria-controls="accordianItem{{ $service->id }}">
            {{ $service ? $service->fieldSingleValue('service_heading', 'en')->value : $key }}
        </button>
    </h2>

    <div id="accordianItem{{ $service->id }}" class="accordion-collapse collapse"
        data-bs-parent="#accordionDiv_{{ $service->id }}">
        <div class="accordion-body">

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('services.update', ['id' => $service->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <div class="row mb-2">
                                            <div class="col-md-6 col-12">
                                                <input type="hidden" name="id" id="id"
                                                    value="{{ $service->id }}">
                                                <label class="form-label fs-5" for="itemname">Heading</label>
                                                <input type="text" class="form-control" id="service_heading_en"
                                                    aria-describedby="itemname" name="service_heading_en"
                                                    placeholder="Heading"
                                                    value="{{ $service ? $service->fieldSingleValue('service_heading', 'en')->value : '' }}" />
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="basic-addon-name">عنوان</label>
                                                <input type="text" id="service_heading_ar"
                                                    value="{{ $service->fieldSingleValue('service_heading', 'ar')->value }}"
                                                    name="service_heading_ar" class="form-control" placeholder="عنوان"
                                                    aria-label="Name" aria-describedby="basic-addon-name" required />
                                            </div>
                                        </div>
                                        <div class="row mb-2">

                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="Description">Description</label>
                                                <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description" rows="5"
                                                    name="service_description_en" id="service_description_en"> {{ $service->fieldSingleValue('service_description', 'en')->value }}
                                                                        </textarea>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="form-label fs-5" for="Description">وصف</label>
                                                <textarea class="form-control form-control-lg @error('description') is-invalid @enderror description"
                                                    name="service_description_ar" id="service_description_ar" rows="5">  {{ $service->fieldSingleValue('service_description', 'ar')->value }}
                                                                        </textarea>
                                            </div>

                                        </div>


                                        <div class="row mb-2">
                                            <div class="col-12 text-center">
                                                <button
                                                    class="btn btn-relief-outline-danger text-nowrap px-1 btn-margin-top delete_btn me-1"
                                                    data-delete_id="{{ $service->id }}" type="button">
                                                    <i data-feather="x" class="me-25"></i>
                                                    <span>Delete</span>
                                                </button>
                                                <button
                                                    class="btn btn-relief-outline-success text-nowrap px-1 btn-margin-top update_btn"
                                                    type="submit">
                                                    <i data-feather="x" class="me-25"></i>
                                                    <span>Update</span>
                                                </button>
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
                                                        @if ($service->date_filter) checked @endif />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <h3>Custom Filters</h3>
                                        </div>

                                        {{ view('app.admin-panel.services.service-filters-section')->with('service', $service) }}


                                        <div class="row">
                                            <div class="col-6">

                                                <button class="btn btn-icon btn-relief-outline-primary add_new_filter"
                                                    type="button" data-service_id="{{ $service->id }}">
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New Filter</span>
                                                </button>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label class="form-label fs-5" for="Image">Image</label>
                                        <i>( .png, .jpg, .jpeg )</i><br>
                                        <i>Resolution (1024 * 765)</i>
                                        <input id="attachment-{{ $service->id }}" type="file"
                                            class="filepond @error('image') is-invalid @enderror" name="image"
                                            multiple accept="image/png, image/jpeg, image/jpg" />
                                        @error('image')
                                            <div class="invalid-tooltip">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
