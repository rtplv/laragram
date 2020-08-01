@extends('layouts.main')

@section('content')
<div class="confirm-password-page auth-page container">
    <article class="panel">
        <p class="panel-heading">
            {{ __('Confirm Password') }}
        </p>
        <div class="panel-block">
            {{ __('Please confirm your password before continuing.') }}

            <form class="auth-form"
                  method="POST"
                  action="{{ route('password.confirm') }}">
                @csrf

                <div class="field">
                    <label class="label">{{ __('Password') }}</label>

                    <div class="control has-icons-left">
                        <input id="password"
                               type="password"
                               class="input @error('password') is-danger @enderror"
                               name="password" required autocomplete="current-password">

                        <span class="icon is-small is-left">
                          <i class="fas fa-key"></i>
                        </span>
                    </div>

                    @error('password')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="confirm-field field is-grouped">
                    <div class="control">
                        <button class="button is-success">{{ __('Confirm Password') }}</button>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </article>
</div>
@endsection
