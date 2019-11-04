@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/app.css')}}">
@section('content')
<script>
    document.getElementById("maincontent").style.marginLeft=0px;
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <div class="col-md-8">
            <div class="card" style="margin-top: 10%;">
                <div class="login" style="">
                <div class="card-header" style="font-size:50px;margin-bottom:0px;margin-left:0px; font-family:georgia;background-color: white;border:none;text-align: center">{{ __('Login') }}</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
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

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:150px; font-size:75%; margin-left: 16px;margin-top:20px;margin-bottom:10%;georgia;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </span>
</div>

@endsection
