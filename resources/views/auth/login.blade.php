@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 mt-5">
            <div class="card p-5">
                <div class="row">
                    <div class="col-md-12 text-center" style="font-weight: 500; font-size: 20px;">
                        <img src="{{asset('img/itsu.jpeg')}}" height="auto" width="70" class="img-fluid">
                        Nomination Form
                    </div>


                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row input-field mb-1 mt-1">
                        <div class="col-md-12">
                            <label for="username">{{ __('Index Number') }}</label>
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="input-field row mb-1">
                        <div class="col-md-12">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ __('Login') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                     {{ __('Forgot Your Password?') }}
                                 </a>
                             @endif--}}
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
