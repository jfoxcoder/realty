@extends('layouts.default')
@section('title', 'Wishlist')

@section('content')


<div class="row">
    <h1>Your Wishlist</h1>
</div>

<div class="row">
    @if ($listings->count())
        @include('partials.listings.list', $listings)
    @else
        <div class="callout panel columns">Your wishlist is empty!</div>

        {{ link_to_route('home', 'Back to listings') }}
    @endif
</div>


@stop


@section('scripts')
{{ HTML::script('scripts\joseph\WishlistManager.js') }}
{{ HTML::script('scripts\joseph\wishlist.js') }}

@stop