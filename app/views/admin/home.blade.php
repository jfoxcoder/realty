@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

<style>
    h3 > a:hover { text-decoration: underline; }
    h3 > a:active { text-decoration: none; }
</style>

<header class="row">
    <h1>Realty Admin Area</h1>
</header>


<div class="row panel callout">
    <h3>{{ link_to_route('admin.listings.index', 'Manage Listings') }}</h3>
    <span>Create, edit and delete listings and upload and manage property images.</span>
</div>


<div class="row panel callout">
    <h3>{{ link_to_route('admin.locations.index', 'Manage Locations') }}</h3>
    <span>Create, edit and delete regions, towns and suburbs.</span>
</div>

<div class="row panel callout">
    <h3>{{ link_to_route('admin.contacts.index', 'Manage Contacts') }}</h3>
    <span>Review, reply-to and delete contact messages.</span>
</div>

@stop