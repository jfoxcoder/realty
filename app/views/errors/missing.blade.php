@extends('layouts.default')
@section('title', 'Resource Not Found')

@section('content')


<div class="row">

    <h1>Something went wrong :-(</h1>

    <div class="panel">
        <p style="color: black;">{{ $message }}</p>
    </div>

</div>


@stop


@section('scripts')

@stop