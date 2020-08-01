@extends('layouts.main')

@section('content')
<div class="verify-page auth-page container">
    <article class="panel">
        <p class="panel-heading">
            {{ __('Verify Your Email Address') }}
        </p>
        <div class="panel-block">
            @if (session('resent'))
                <div class="notification is-warning">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="ui-link">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </article>
</div>
@endsection
