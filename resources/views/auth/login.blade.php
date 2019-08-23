@extends('main')
@section('title', 'Login')
@section('content')

<div class="wrapper">
    <div class="container">
    <div class="row">
    <div class="col">
     
    <span class="title">Tools Mobile<br/>Forensik.</span>
        <p class="col-md-7">Expert System dalam pemilihan tools untuk investigasi mobile forensik</p>
    </div>
    <div class="col">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="col-md-7 text-md-right"><h3>{{ __('Login') }}</h3></div><br>
          <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn home-button">
                                    {{ __('Login') }}
                                </button>

                            </div>
                            <div class="col-md-7 offset-md-3"><br/>
                            <p>Don't have an account ? <a class="line-link" href="{{ route('home') }}">Sign Up</a></p>
                            </div>
                        </div>
                    </form>
    </div>
    </div>
  </div>
    </div>
</div>



   @endsection
