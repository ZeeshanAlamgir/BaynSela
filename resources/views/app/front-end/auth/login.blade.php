
@extends('app.front-end.layout.layout')
<link rel="stylesheet" href="{{ asset('app-assets/css/custom/login.css') }}">
@section('content')

<div class="auth-container">
    <div class="margin-content">
        <div id="login_1" data-v-456f8fab="" class="login-page">
            <div data-v-456f8fab="" class="auth-content">
                <h1 data-v-456f8fab="">Welcome back!</h1>
                <p data-v-456f8fab="">Login to the Bayn platform using your e-mail and password</p><span data-v-456f8fab="">
                    <form data-v-456f8fab="" novalidate="novalidate" class="form" action="{{ route('login.post') }}" method="POST">
                        <div data-v-456f8fab="" class="input-group input-margin">
                            <div data-v-456f8fab="" class="input-wrapper"><input data-v-456f8fab="" name="email" id="email" type="text" placeholder="Email" class=""><label data-v-456f8fab="" for="email" class="label-name"><span data-v-456f8fab="" class="content-name">Email</span></label></div><span data-v-456f8fab="" class="error"></span>
                        </div>
                        <div data-v-456f8fab="" class="input-group">
                            <div data-v-456f8fab="" class="input-wrapper"><input data-v-456f8fab="" name="password" id="password" type="password" placeholder="Password" class=""><label data-v-456f8fab="" for="password" class="label-name"><span data-v-456f8fab="" class="content-name">Password</span></label></div><span data-v-456f8fab="" class="error"></span>
                        </div>
                        <div data-v-456f8fab="" class="forgot-password">
                            <a id="Forgot_pass" data-v-456f8fab="" href="#" class="">Forgot password?</a>
                        </div><button data-v-456f8fab="" type="submit" class="primary">Login</button>
                        <div data-v-456f8fab="" class="create-account"><span data-v-456f8fab="">Don’t have an account yet?</span><a data-v-456f8fab="" href="{{ route('signup') }}" class="">Create one here</a></div>
                    </form>
                </span>
            </div>
        </div>
        <!-- Forgot password form start  -->
        <div id="forgot_form" data-v-31f0712a="" class="forgot-password-page" style="display: none;">
            <div data-v-31f0712a="" class="auth-content">
                <h1 data-v-31f0712a="">Enter your e-mail address!</h1>
                <p data-v-31f0712a="">Please enter your e-mail associated with your Bayn account and we’ll send you an e-mail with the next steps.</p><span data-v-31f0712a="">
                    <form data-v-31f0712a="" novalidate="novalidate" class="form">
                        <div data-v-31f0712a="" class="input-group input-margin">
                            <div data-v-31f0712a="" class="input-wrapper"><input data-v-31f0712a="" id="email" type="email" placeholder="Email" class=""><label data-v-31f0712a="" for="email" class="label-name"><span data-v-31f0712a="" class="content-name">Email</span></label></div><span data-v-31f0712a="" class="error"></span>
                        </div><button data-v-31f0712a="" type="submit" class="primary">Send e-mail</button>
                    </form>
                </span>
            </div>
        </div>
        <!-- Forgot password form end  -->
    </div>
    <div class="register-image" style="background-image: url({{ asset('assets/images/login-img.png') }});"></div>
</div>

@endsection

@section('custom-js')

<script>
    @if (Session::has('created'))
        alert();
        toastr.success('Account created successfully!');
    @endif
</script>
<script>
 $(document).ready(function() {
        $("#Forgot_pass").click(function() {
            $("#login_1").hide();
            $("#forgot_form").show();
        });

    });
</script>

@endsection
