@extends('layouts.app')

@section('content')

<div class="content-page">
    <form class="pure-form pure-form-stacked" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <fieldset>
            <legend>Login</legend>
            <input id="email" type="email" name="email" class="pure-input-1" value="{{ old('email') }}" required autofocus placeholder="E-Mail Address">

            <input id="password" type="password" name="password" class="pure-input-1" required placeholder="Password">

            <label for="remember" class="pure-checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>

            <input type="submit" value = "Login" class="pure-button pure-button-primary">
            <a href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </fieldset>
    </form>        
</div>
@endsection
