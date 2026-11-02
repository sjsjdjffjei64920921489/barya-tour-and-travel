@extends('layouts.app')

@section('title', 'Contact our team')
@section('content')
    <section class="page-hero page-hero-contact"><div class="page-hero-inner"><span class="eyebrow eyebrow-light">LET’S START WITH A HELLO</span><h1>Tell us what<br><em>you’re dreaming of.</em></h1><p>Questions, ideas, or a trip you can’t stop thinking about? We’d love to hear from you.</p><a class="photo-credit page-photo-credit" href="https://commons.wikimedia.org/wiki/File:River_Nile,_Jinja,_Uganda_3.jpg" target="_blank" rel="noopener noreferrer">Photo: Owobusingye · CC BY 4.0</a></div></section>
    <section class="contact-layout section-wrap">
        <div class="contact-aside"><span class="eyebrow">GET IN TOUCH</span><h2>Every great trip<br>starts somewhere.</h2><p>Share a little about what you have in mind. Our team will be in touch to help you take the next step.</p><div class="contact-note"><span>✦</span><div><strong>Not sure where to begin?</strong><p>Tell us the kind of experience you’re looking for and we’ll help you explore the options.</p></div></div></div>
        <form class="contact-form form-stack" method="POST" action="{{ route('contact.store') }}">@csrf
            <div class="field-row"><label>Your name<input name="name" autocomplete="name" value="{{ old('name', auth()->user()?->name) }}" required maxlength="120"></label><label>Email address<input type="email" name="email" autocomplete="email" value="{{ old('email', auth()->user()?->email) }}" required maxlength="255"></label></div>
            <label>Subject<input name="subject" value="{{ old('subject') }}" required maxlength="160" placeholder="What can we help with?"></label>
            <label>Your message<textarea name="message" rows="6" required maxlength="3000" placeholder="Tell us a bit more...">{{ old('message') }}</textarea></label>
            <button class="button button-dark" type="submit">Send your message <span>↗</span></button>
        </form>
    </section>
@endsection
