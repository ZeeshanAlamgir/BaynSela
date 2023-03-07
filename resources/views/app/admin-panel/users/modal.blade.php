{{-- {{dd($user_data['project_types'])}} --}}
<div class="modal fade" id="userInfo" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">User Information</h1>
                </div>
                <form id="editUserForm" class="row gy-1 pt-75">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="client_id">Client ID</label>
                        <input type="text" id="client_id" name="client_id" class="form-control" placeholder="Client ID" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="company_name">Company Name</label>
                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company Name" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="country">Country</label>
                        <input type="text" id="country" name="country" class="form-control" placeholder="Country" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" placeholder="City" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="industry">Industry</label>
                        <input type="text" id="industry" name="industry" class="form-control" placeholder="Industry" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="company_size">Company Size</label>
                        <input type="text" id="company_size" name="company_size" class="form-control" placeholder="Company Size" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="annual_marketing_budget">Annual Marketing Budget</label>
                        <input type="text" id="annual_marketing_budget" name="annual_marketing_budget" class="form-control" placeholder="Annual Marketing Budget" />
                    </div>

                    {{-- <div class="col-12 col-md-6">
                        <label class="form-label" for="project-type-select-multi">Project Types</label>
                        <div class="mb-1">
                            <select class="select2 form-select" multiple="multiple" id="project-type-select-multi" disabled>
                                
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="project-duration-select-multi">Project Durations</label>
                        <div class="mb-1">
                            <select class="select2 form-select" multiple="multiple" id="project-duration-select-multi" disabled>
                               
                            </select><button type="reset" class="btn btn-secondary w-100 close-modal">
                            Close
                        </button>
                        </div>
                    </div> --}}
                    
                    <div class="col-12 col-md-12 text-center mt-5 pt-50">
                        <button type="reset" class="btn btn-secondary w-100 close-modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>