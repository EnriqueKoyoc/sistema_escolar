@extends('layouts.app')

@section('content')

<div class="row">
    <!-- Form with validation -->
    <div class="col s12 m12 l6">
        <div class="card-panel">
            <h4 class="header2">{{ __('Login') }}</h4>
            <div class="row">
                <form method="POST" action="{{ route('login') }}" class="col s12">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" name="email" type="email"
                                class="validate @error('email') is-invalid @enderror" autocomplete="email" autofocus
                                value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="password5" name="password" type="password"
                                class="validate @error('password') is-invalid @enderror" required
                                autocomplete="current-password">
                            <label for="password">Password</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{--  <div class="input-field col s4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>  --}}
                        <div class="input-field col s4">
                            <button class="btn waves-effect waves-light right" type="submit" name="action">{{
                                __('Login') }}
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                        <div class="input-field col s4">
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
@endsection