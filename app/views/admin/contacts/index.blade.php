@extends('layouts.admin')
@section('title', 'Manage Contacts')

@section('content')

<header class="row">
    <h1>Contact Messages</h1>
    <em class="right">Contact test data auto-generated with <a href="https://github.com/fzaninotto/Faker">Faker</a> PHP library.</em>
</header>



<div class="row">
    <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
        @foreach($contacts as $c)
        <li data-contact="{{ $c->id }}">
            <article class="contact-box" >
                <header>
                <h5 class="contact-name">{{ $c->name }}<small class="contact-delete-btn icon-close icon-btn right" title="Delete {{ $c->name}}"></small></h5>

                <div class="contact-email">{{ HTML::mailto($c->email, $c->email, []) }}</div>

                <div class="show-date-listed-box">Received&nbsp;<span class="show-listed-diff">{{ $c->getDiffCreatedAt() }}</span>&nbsp;on&nbsp;<span class="show-listed-date">{{ $c->getFormattedCreatedAt() }}</span></div>

                </header>

                <div class="contact-message">{{ $c->message}}</div>
            </article>
        </li>
        @endforeach
    </ul>
</div>
@stop



@section('scripts')
    {{ HTML::script('scripts/joseph/ContactsManager.js') }}
@stop

