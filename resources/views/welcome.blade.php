@extends('layout.master-without_nav')

@section('title') Login @endsection

@section('content')

<body class="account-body accountbg">
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box" style="background-color: white">
                                <div class="text-center p-3">
                                    <a class="logo logo-admin">
                                        <img src="{{ URL::asset('assets/images/brand-logo/imst.png') }}" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold font-18" style="color: black">Silahkan Masuk Terlebih Dulu</h4>
                                    <p class="text-muted  mb-0">Sign in to continue.</p>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active  p-3" id="LogIn_Tab" role="tabpanel">

                                        @if(Session::has('success'))
                                            <div class="alert alert-success text-center">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                        <form class="form-horizontal auth-form" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Username</label>
                                                <div class="input-group">
                                                    <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="Enter username" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row my-3">
                                                <div class="col-sm-6">
                                                    {{-- <div class="custom-control custom-switch switch-success">
                                                        <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember"> Remember me </label>
                                                    </div> --}}
                                                </div>
                                                <!--end col-->
                                                {{-- <div class="col-sm-6 text-end">
                                                    @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted font-13">
                                                        <i class="dripicons-lock"></i>
                                                        Forgot password?
                                                    </a>
                                                    
                                                    @endif
                                                </div> --}}
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end form-group-->
                                        </form>
                                        <!--end form-->
                                        <div class="m-3 text-center text-muted">
                                            {{-- <p class="mb-0">Do not have an account ? <a href="" class="text-primary ms-2">Free Register</a></p> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane px-3 pt-3" id="Register_Tab" role="tabpanel">

                                       @if(Session::has('success'))
                                            <div class="alert alert-success text-center">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif

                                            <!--end form-group-->
                                        </form>
                                        <!--end form-->
                                        <p class="my-3 text-muted">Already have an account ? <a href="{{ url('login') }}" class="text-primary ms-2">Log in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
