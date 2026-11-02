@extends('layouts.app')

@section('title', 'Create an account')
@section('content')
    <section class="auth-wrap"><a class="photo-credit auth-photo-credit" href="https://commons.wikimedia.org/wiki/File:Gorila_de_monta%C3%B1a_(Gorilla_beringei_beringei),_parque_nacional_de_la_Selva_Impenetrable_de_Bwindi,_Uganda,_2024-02-02,_DD_80.jpg" target="_blank" rel="noopener noreferrer">Photo: Diego Delso · CC BY-SA 4.0</a><div class="auth-card"><span class="eyebrow">MAKE ROOM FOR MORE</span><h1>Your journey<br><em>starts here.</em></h1><p>Create an account to send trip inquiries and keep an eye on your plans.</p>
        <form class="form-stack" method="POST" action="{{ route('register.store') }}">@csrf
            <label>Your name<input type="text" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus maxlength="120"></label>
            <label>Email address<input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required maxlength="255"></label>
            <label>Password<input type="password" name="password" autocomplete="new-password" required minlength="8"></label>
            <label>Confirm password<input type="password" name="password_confirmation" autocomplete="new-password" required minlength="8"></label>
            <button class="button button-dark button-full" type="submit">Create account <span>→</span></button>
        </form><div class="auth-switch">Already have an account? <a href="{{ route('login') }}">Sign in</a></div>
    </div></section>
@endsection
