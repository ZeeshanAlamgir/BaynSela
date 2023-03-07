<div class="details">
    <center><h3>A Few details about You</h3></center>
    <center><p>In order to create your account, we need a few details from you.</p></center>
    <div class="row mt-4">
        <input type="hidden" name="user_id" value="{{ isset($user) ? $user->id : 0  }}">
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>First Name</b></label>
            <input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" id="first_name"
                name="first_name" placeholder="First Name" value="{{ isset($user) ? $user->first_name :  old('first_name') }}"  />
            @error('first_name')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Last Name</b></label>
            <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" id="last_name"
                name="last_name" placeholder="Last Name" value="{{ isset($user) ? $user->last_name :  old('last_name') }}"  />
            @error('last_name')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Email</b></label>
            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email"
                name="email" placeholder="Email" value="{{ isset($user) ? $user->email :  old('email') }}"  />
            @error('email')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Confirm Email</b></label>
            <input type="text" class="form-control form-control-lg @error('confirm_email') is-invalid @enderror" id="confirm_email"
                name="confirm_email" placeholder="Confirm Email" value="{{ isset($user) ? $user->email :  old('email') }}"  />
            @error('confirm_email')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

    @if(isset($is_password) && $is_password==true)
        <div class="row mt-2">
            <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
                <label class="form-label fs-5" for="title"><b>Password</b></label>
                <input type="password" class="form-control form-control-lg @error('user_password') is-invalid @enderror" id="user_password"
                    name="user_password" placeholder="Password" value="{{old('user_password')}}"/>
                @error('user_password')
                    <div class="invalid-tooltip">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
                <label class="form-label fs-5" for="title"><b>Confirm Password</b></label>
                <input type="password" class="form-control form-control-lg @error('confirm_password') is-invalid @enderror" id="confirm_password"
                    name="confirm_password" placeholder="Confirm Password" value="{{old('confirm_password')}}"/>
                @error('confirm_password')
                    <div class="invalid-tooltip">{{ $message }}</div>
                @enderror
            </div>
        </div>        
    @endif

    <div class="row mt-2">
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Phone</b></label>
            <input type="number" class="form-control form-control-lg @error('phone') is-invalid @enderror" id="phone"
                name="phone" placeholder="Phone No" value="{{ isset($user) ? $user->phone :  old('phone') }}"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
            @error('phone')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Bayn Client ID</b></label>
            <input class="form-control @error('client_id') is-invalid @enderror" value="{{ isset($user) ? $user->client_id :  old('client_id') }}" type="number" name="client_id" id = "client_id" placeholder = "Bayn Client ID" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            @error('client_id')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<hr/>

<div class="company mt-3">
    <center><h3>Tell us about your company</h3></center>
    <center><p>If applicable, tell us a few details about your company.</p></center>
    <div class="row mt-4">
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Company Name</b></label>
            <input type="text" class="form-control form-control-lg @error('company_name') is-invalid @enderror" id="company_name"
                name="company_name" placeholder="Company Name" value="{{ isset($user) ? $user->company_name :  old('company_name') }}"  />
            @error('company_name')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Country</b></label>
            <input type="text" class="form-control form-control-lg @error('country') is-invalid @enderror" id="country"
                name="country" placeholder="Country" value="{{ isset($user) ? $user->country :  old('country') }}"  />
            @error('country')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>City</b></label>
            <input type="text" class="form-control form-control-lg @error('city') is-invalid @enderror" id="city"
                name="city" placeholder="City" value="{{ isset($user) ? $user->city :  old('city') }}" />
            @error('city')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Industry</b></label>
            <input type="text" class="form-control form-control-lg @error('industry') is-invalid @enderror" id="industry"
                name="industry" placeholder="Industry" value="{{ isset($user) ? $user->industry :  old('industry') }}" />
            @error('industry')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Company Size</b></label>
            <input type="number" class="form-control form-control-lg @error('company_size') is-invalid @enderror" id="company_size"
                name="company_size" placeholder="Company Size" value="{{ isset($user) ? $user->company_size :  old('company_size') }}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
            @error('company_size')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
            <label class="form-label fs-5" for="title"><b>Annual Marketing Budget</b></label>
            <input type="text" class="form-control form-control-lg @error('annual_marketing_budget') is-invalid @enderror" id="annual_marketing_budget"
                name="annual_marketing_budget" placeholder="Annual Marketing Budget" value="{{ isset($user) ? $user->annual_marketing_budget :  old('annual_marketing_budget') }}"   />
            @error('annual_marketing_budget')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<hr/>
<div class="mt-3 interests">
    <center><h3>Tell us about your interests</h3></center>
    <center><p>Please select up to 5 interests.</p></center>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-12 position-relative">
            <label for=""><b>Project Types <span class="text-danger">*</span> </b></label>
            <select class="form-control js-example-tokenizer select2 @error('project_type_id') is-invalid @enderror" required name="project_type_id[]" id="project_type_id" multiple="multiple"> 
                @isset($data)
                    @foreach ($data['project_types']['types'] as $key=>$project_type)
                        <option value="{{ $key }}" {{ isset($type_ids) ? ( in_array($key,$type_ids) ? 'selected' : '' ) : '' }} >{{ $project_type }}</option>
                    @endforeach
                @endisset
            </select>
            @error('project_type_id')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 col-lg-6 col-12 position-relative">
            <label for=""><b>Project Durations<span class="text-danger">*</span></b></label>
            <select class="form-control js-example-tokenizer select2 @error('project_duration_id') is-invalid @enderror" required name="project_duration_id[]" id="project_duration_id" multiple="multiple"> 
                @isset($data)
                    @foreach ($data['project_durations']['durations'] as $key=>$duration)
                        {{-- @dd($key) --}}
                        <option value="{{ $key }}" {{ isset($duration_ids) ? ( in_array($key,$duration_ids) ? 'selected' : '' ) : '' }}  >{{ $duration }}</option>
                    @endforeach
                @endisset
            </select>
            @error('project_duration_id')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
