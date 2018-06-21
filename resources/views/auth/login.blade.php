@extends('layouts.auth')
@section('content')
    <img class="logo" src="http://via.placeholder.com/250x150"/>
    <form id="login" method="post" action="{{ url('login') }}" style="text-align: center" class="mdl-card__supporting-text">
        {{ csrf_field() }}
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="email" id="username">
            <label class="mdl-textfield__label" for="username">Gebruikersnaam</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="password" type="password" id="password">
            <label class="mdl-textfield__label" for="password">Wachtwoord</label>
        </div>
    </form>
    {{ $errors }}
    <button form="login" type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect">Login</button>
@endsection
