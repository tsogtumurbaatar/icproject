@extends('layouts.app')

@section('content')

<div class="content-page">
    <form class="pure-form pure-form-stacked" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <fieldset>
            <legend>Register</legend>
            <input id="name" type="text" name="name" class="pure-input-1" value="{{ old('name') }}" required autofocus placeholder="Name">

            <input id="email" type="email" name="email" class="pure-input-1" value="{{ old('email') }}" required placeholder="E-Mail Address">

            <input id="password" type="password" name="password" class="pure-input-1" required placeholder="Password">

            <input id="password-confirm" type="password" class="pure-input-1" name="password_confirmation" required placeholder="Confirm Password">

            <input type="submit" class="pure-button pure-button-primary" value="Register">
                
            
        </fieldset>
    </form>
</div>

@endsection