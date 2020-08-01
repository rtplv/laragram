@extends('layouts.main')

@section('content')
<div class="reset-by-email-page auth-page container">
        <article class="panel">
            <p class="panel-heading">
                {{ __('Reset Password') }}
            </p>
            <div class="panel-block">
                @if (session('status'))
                    <div class="notification is-warning">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="auth-form"
                      method="POST"
                      action="{{ route('password.email') }}">
                    @csrf

                    <div class="field">
                        <label class="label">
                            {{ __('E-Mail Address') }}
                        </label>

                        <div class="control has-icons-left">
                            <input id="email"
                                   type="email"
                                   class="input @error('email') is-danger @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            <span class="icon is-small is-left">
                              <i class="fas fa-envelope"></i>
                            </span>
                        </div>

                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="confirm-field field">
                        <div class="control">
                            <button class="button is-success">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </div>
@endsection
