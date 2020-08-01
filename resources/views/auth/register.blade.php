@extends('layouts.main')

@section('content')
<div class="register-page auth-page container">
        <article class="panel">
            <p class="panel-heading">
                {{ __('Register') }}
            </p>
            <div class="panel-block">
                <form class="auth-form"
                      method="POST"
                      action="{{ route('register') }}">
                    @csrf

                    <div class="field">
                        <label class="label">
                            {{ __('Name') }}
                        </label>

                        <div class="control has-icons-left">
                            <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                        </div>

                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">{{ __('E-Mail Address') }}</label>

                        <div class="control has-icons-left">
                            <input id="email"
                                   type="email"
                                   class="input @error('email') is-danger @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

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
                                   class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">


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

                        <div class="control">
                            <input id="password-confirm"
                                   type="password"
                                   class="input" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="confirm-field field is-grouped">
                        <div class="control">
                            <button class="button is-success">{{ __('Register') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </div>
@endsection
