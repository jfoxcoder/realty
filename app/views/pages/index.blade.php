@extends('layouts.default')
@section('title', 'Home')
@section('content')


<div class="row" style="margin-top: 80px;">
    <div class="panel clearfix">
        {{ Form::open(['method' => 'get']) }}

        <div class="small-4 columns">
        {{ Form::label('region') }}
        {{ Form::select('region', [], ['disabled' => 'disabled']) }}
        </div>

        <div class="small-4 columns">
        {{ Form::label('town', 'Town') }}
        {{ Form::select('town', [], ['disabled' => 'disabled']) }}
        </div>
        <div class="small-4 columns">
        {{ Form::label('suburb') }}
        {{ Form::select('suburb', [], ['disabled' => 'disabled']) }}
        </div>

        <div class="columns">

        {{ Form::submit('Search', ['class' => 'filter-submit-btn tiny button success right']) }}
            <a href="{{ URL::route('home') }}" class="tiny button right primary" style="margin-right: 15px">Reset</a>

        </div>
            {{ Form::close() }}

    </div>
</div>

<div class="row">
    @include('partials.listings.list', $listings)
</div>

@stop


@section('scripts')
    {{ HTML::script('scripts/joseph/LocationManager.js') }}
    {{ HTML::script('scripts/joseph/location-filter.js') }}
    {{ HTML::script('scripts/joseph/WishlistManager.js') }}
    {{ HTML::script('scripts/joseph/wishlist.js') }}
@stop