@extends('layouts.app')
{{-- <link rel="stylesheet" href="{{ asset('css/app.css')}}"> --}}
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login" style="transform: translateX(15vw);
       margin-top:0px;">
                <div class="card-header" style="font-size:60px;margin-bottom:25px;margin-left:-25px; font-family:georgia;">{{ __('Login') }}</div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="container3">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"style="font-family:georgia;">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width:250px;font-family:georgia;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-family:georgia;">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"style="width:250px;font-family:georgia;">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}style="margin-left:130px;">

                                    <label class="form-check-label" for="remember" style="margin-left:20px;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="bottom" style="transform: translateX(15vw);
                        display: inline-block;>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:150px; font-size:75%; margin-left: -16px;margin-top:20px;font-family:georgia;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request')}}" style="margin-top:20px;
                                    margin-left: -25px;font-family:georgia;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
