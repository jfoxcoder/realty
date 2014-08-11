@extends('layouts.default')
@section('title', 'Admin Login')
@section('content')

<div class="row">
    <h1>Admin Login</h1>
</div>

{{ Form::open(['route' => 'admin.sessions.store']) }}

<div class="row">
    <div class="small-10 small-centered medium-5 columns">

        <!-- Email Field. -->
        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('email', 'Email', ['class' => 'inline'] ) }}
            </div>
            <div class="small-9 columns">
                {{ Form::email('email', null, ['autofocus' => 'autofocus', 'required' => 'required']) }}
                @if ($errors->first('email'))
                <small class="error">{{ $errors->first('email') }}</small>
                @endif
            </div>
        </div>

        <!-- Password Field. -->
        <div class="row">
            <div class="small-3 columns">
                {{ Form::label('password', 'Password', ['class' => 'inline'] ) }}
            </div>
            <div class="small-9 columns">
                {{ Form::password('password', ['required' => 'required']) }}
                @if ($errors->first('password'))
                <small class="error">{{ $errors->first('password') }}</small>
                @endif
            </div>
        </div>

        <!-- Login Button. -->
        <div class="row">
            <div class="small-9 small-offset-3 columns">
                {{ Form::submit('Login Admin',
                ['class' => 'button small alert',
                'style' => 'width: 100%;']) }}
            </div>
        </div>
    </div>
</div>


{{ Form::close() }}

@stop



