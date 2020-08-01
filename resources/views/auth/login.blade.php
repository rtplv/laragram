@extends('layouts.main')

@section('content')
<div class="login-page auth-page container">
        <article class="panel">
            <p class="panel-heading">
                {{ __('Login') }}
            </p>
            <div class="panel-block">
                <form class="auth-form"
                      method="POST"
                      action="{{ route('login') }}">
                    @csrf

                    <div class="field">
                        <label class="label">
                            {{ __('E-Mail Address') }}
                        </label>

                        <div class="control has-icons-left">
                            <input id="email" type="email"
                                   class="input @error('email') is-danger @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                        </div>

                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Password') }}</label>

                        <div class="control has-icons-left">
                            <input id="password" type="password"
                                   class="input @error('password') is-danger @enderror" name="password"
                                   required autocomplete="current-password">

                            <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                        </div>

                        @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox"
                                       name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="confirm-field field is-grouped">
                        <div class="control">
                            <button class="button is-success">{{ __('Login') }}</button>
                        </div>

                        <div class="control">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </div>
@endsection
