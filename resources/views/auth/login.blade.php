@extends('layouts.app')

@section('title', 'Sign in')
@section('content')
    <section class="auth-wrap"><a class="photo-credit auth-photo-credit" href="https://commons.wikimedia.org/wiki/File:Gorila_de_monta%C3%B1a_(Gorilla_beringei_beringei),_parque_nacional_de_la_Selva_Impenetrable_de_Bwindi,_Uganda,_2024-02-02,_DD_80.jpg" target="_blank" rel="noopener noreferrer">Photo: Diego Delso · CC BY-SA 4.0</a><div class="auth-card"><span class="eyebrow">WELCOME BACK</span><h1>Your next journey<br><em>is waiting.</em></h1><p>Sign in to see your trip inquiries and keep planning.</p>
        <form class="form-stack" method="POST" action="{{ route('login.store') }}">@csrf
            <label>Email address<input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus></label>
            <label>Password<input type="password" name="password" autocomplete="current-password" required></label>
            <label class="check-label"><input type="checkbox" name="remember" value="1"> Keep me signed in</label>
            <button class="button button-dark button-full" type="submit">Sign in <span>→</span></button>
        </form><div class="auth-switch">New to Barya? <a href="{{ route('register') }}">Create an account</a></div>
    </div></section>
@endsection
