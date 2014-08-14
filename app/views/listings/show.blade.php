@extends('layouts.default')
@section('title', $listing->title)

@section('content')

@if (Auth::check())
<?php
$on = in_array($listing->id, $wishes);
$wish = $on ? 'wish-on' : 'wish-off';
$title = $on ? 'Remove from wishlist' : 'Add to wishlist';
?>
@endif

<div class="row" style="margin-top: 80px;">
    <div class="small-9 columns">
        <h1>{{ $listing->title }}</h1>
    </div>

    <div class="small-3 columns">
        <span class="show-listing-price">$&nbsp;{{ $listing->getFormattedPrice() }}</span>
    </div>

</div>

<div class="row">

    <div class="small-12 columns">
        <!-- location information, e.g, 93 Gayhurst Road Dallington-->
        <div class="show-listing-address">
            <h5>
            <span>{{ $listing->street_number }}</span>&nbsp;<span>{{ $listing->street_name }}</span>,&nbsp;<span>{{ $listing->suburb->name }}</span>
            </h5>
        </div>

    </div>
</div>

<div class="row">
    <div class="columns">
        <div class="show-date-listed-box">Listed&nbsp;<span class="show-listed-diff">{{ $listing->getDiffCreatedAt() }}</span>&nbsp;on&nbsp;<span class="show-listed-date">{{ $listing->getFormattedCreatedAt() }}</span></div>

    </div>
</div>

<div class="row">
    <div class="small-12 small-centered columns">
        @include('partials.listings.gallery', $listing)
    </div>
</div>



<div class="row">



    <div class="small-9 columns">



        <h3>Property Description<div data-listing="{{ $listing->id }}" class="left">
                @if(Auth::check())
                <span style="height: 30px" class="btn icon-star3 {{ $wish }}" title="{{ $title }}" data-address="{{ $listing->getStreetAddress() }}"></span>
                @else

                <a href="{{ URL::route('login') }}" style="height: 30px" class="btn icon-star3 wish-off" title="Sign-in to create a wishlist"></a>
                @endif
            </div></h3>
        <p>{{ $listing->description }}</p>



    </div>

    <div class="small-3 columns">

        <table class="right">
            <tr><td>Bedrooms</td><td>{{ $listing->beds }}</td></tr>
            <tr><td>Bathrooms</td><td>{{ $listing->baths }}</td></tr>
            <tr><td>Cars</td><td>{{ $listing->cars }}</td></tr>
        </table>
    </div>

</div>









@stop


@section('scripts')
    {{ HTML::script('scripts/vendor/jssor/jssor.core.js') }}
    {{ HTML::script('scripts/vendor/jssor/jssor.utils.js') }}
    {{ HTML::script('scripts/vendor/jssor/jssor.slider.min.js') }}

    {{ HTML::script('scripts/joseph/gallery.js') }}

    {{ HTML::script('scripts/joseph/WishlistManager.js') }}
    {{ HTML::script('scripts/joseph/wishlist.js') }}
@stop