@extends('layouts.main')

@section('content')
    <div class="az-body">
        <div class="az-signin-wrapper">
            <div class="az-card-signin">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('assets/img/logofix.png') }}" alt="Logo" srcset="" style="width: 100px">
                </div>
                <div class="az-signin-header">
                    <h2>Selamat Datang!</h2>
                    <h4>Silakan Login dahulu</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="nik" id="nik" name="nik" class="form-control" placeholder="Masukkan NIK anda"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Masukkan Password anda">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- form-group -->
                        <button type="submit" class="btn btn-az-primary btn-block">{{ __('Login') }}</button>
                </div><!-- az-signin-header -->
                <div class="az-signin-footer">
                    {{-- <p><a href="">Forgot password?</a></p>
                    <p>Don't have an account? <a href="page-signup.html">Create an Account</a></p> --}}
                </div><!-- az-signin-footer -->
                </form>
            </div><!-- az-card-signin -->
        </div><!-- az-signin-wrapper -->
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                                <div class="col-md-6">
                                    <input id="nik" type="nik" class="form-control @error('nik') is-invalid @enderror"
                                        name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
