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
                    <!-- <p class="text-muted mb-4">Create and Learn</p> -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-3">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror rounded-pill border-0 shadow-sm px-4" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror rounded-pill border-0 shadow-sm px-4" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-pill border-0 shadow-sm px-4" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-pill border-0 shadow-sm px-4" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-group mb-3">
                                    <input id="password-confirm" type="password" class="form-control rounded-pill border-0 shadow-sm px-4" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                            <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                        {{ __('Register') }}
                                    </button>
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