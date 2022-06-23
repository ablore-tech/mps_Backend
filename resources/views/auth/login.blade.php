@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image">
            <img src="/images/bg.jpg">
        </div>
        <!-- The content half -->
        <div class="col-md-6 bg-light">
        <div class="login d-flex align-items-center py-5">

            <!-- Demo content-->
            <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 mx-auto">
                <h3 class="display-4">Let's get Started!</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                    <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror rounded-pill border-0 shadow-sm px-4" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group  mb-3">
                                    <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror rounded-pill border-0 shadow-sm px-4 text-primary" name="password" required autocomplete="current-password" placeholder="Password" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input class="custom-control-input" type="checkbox" name="customCheck1" id="customCheck1" {{ old('customCheck1') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}
                                </label>
                            </div>        
                            <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                            </div> 
                        </form>
                </div>
            </div>
            </div>
            </div><!-- End -->

        </div>
        </div><!-- End -->

    </div>
    </div>
</div>
@endsection
