@extends('userlayouts.layouts.header')

@section('content')
<body class="signupbg">



<div style="padding-bottom: 30px;float: left;width: 100%; margin-top:5%" >


<div class="adminlogin_outer">

<div class="adminlogin_inner">

<div class="admminlogo_outer">
<a href="{{ url('/') }}"><img class="signupbglo" src="{{ asset('user/images/logo.png') }}" ></a>
</div>



<div class="adminlogin_form">

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="admin_box" style="margin-bottom:0px;margin-top: 5%;">
                                <input type="submit" class="btn btn-primary" 
                                    value="{{ __('Send Password Reset Link') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
