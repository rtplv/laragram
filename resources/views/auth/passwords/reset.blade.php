@extends('layouts.main')

@section('content')
<div class="reset-password-page auth-page container">
    <article class="panel">
        <p class="panel-heading">
            {{ __('Reset Password') }}
        </p>
        <div class="panel-block">
            <form class="auth-form"
                  method="POST"
                  action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                    <label class="label">
                        {{ __('E-Mail Address') }}
                    </label>

                    <div class="control has-icons-left">
                        <input id="email"
                               type="email"
                               class="input @error('email') is-danger @enderror"
                               name="email"
                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                        <input id="password"
                               type="password"
                               class="input @error('password') is-danger @enderror"
                               name="password" required autocomplete="new-password">

                        <span class="icon is-small is-left">
                          <i class="fas fa-key"></i>
                        </span>
                    </div>

                    @error('password')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label class="label">{{ __('Confirm Password') }}</label>

                    <div class="control has-icons-left">
                        <input id="password-confirm"
                               type="password"
                               class="input"
                               name="password_confirmation" required autocomplete="new-password">

                        <span class="icon is-small is-left">
                          <i class="fas fa-check"></i>
                        </span>
                    </div>
                </div>

                <div class="confirm-field field">
                    <div class="control">
                        <button class="button is-success">{{ __('Reset Password') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </article>
</div>
@endsection
