@extends('layouts.default')
@section('title', 'Contact Us')
@section('content')

<div class="row">
    <h1>Contact</h1>

    <div class="panel callout">Get in touch by completing the form below or using our provided contact details.</div>
</div>





<div class="row" style="margin-top: 30px">



    <!-- Contact Form Column -->
    <div class="medium-6 large-6 columns" >
<!--        <h3>Contact Form</h3>-->
        {{ Form::open(['route' => 'contacts.store']) }}


        <!-- Contact Name -->
        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('name', 'Name', ['class' => 'inline'] ) }}
            </div>
            <div class="small-10 columns">
                {{ Form::text('name', null, ['autofocus' => 'autofocus', 'required' => 'required', 'placeholder' => 'Required']) }}
                @if ($errors->first('name'))
                <small class="error">{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('email', 'Email', ['class' => 'inline'] ) }}
            </div>
            <div class="small-10 columns">
                {{ Form::email('email', null, ['autofocus' => 'autofocus', 'required' => 'required', 'placeholder' => 'Required']) }}
                @if ($errors->first('email'))
                <small class="error">{{ $errors->first('email') }}</small>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('phone', 'Phone', ['class' => 'inline'] ) }}
            </div>
            <div class="small-10 columns">
                {{ Form::text('phone', null, ['placeholder' => 'Optional']) }}
                @if ($errors->first('phone'))
                <small class="error">{{ $errors->first('phone') }}</small>
                @endif
            </div>
        </div>



        <!-- Message Field -->
        <div class="row">
            <div class="small-2 columns">
                {{ Form::label('message', 'Message', ['class' => 'inline'] ) }}
            </div>
            <div class="small-10 columns">
                {{ Form::textarea('message', null, ['required' => 'required']) }}
                @if ($errors->first('message'))
                <small class="error">{{ $errors->first('message') }}</small>
                @endif
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="small-10 small-offset-2 columns">
                {{ Form::submit('Send',
                ['class' => 'button small primary',
                'style' => 'width: 100%;']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>




    <!-- Contact Details Column -->
    <div class="medium-6 large-6 columns" >
<!--        <h3>Contact Details</h3>-->

        <!-- Phone -->
        <div class="row">
            <address class="small-6 columns">
                <div><strong>Free Phone</strong><span>0800 555-1234</span></div>
                <div><strong>Phone</strong><span>+64 3-377 2364</span></div>
                <div><strong>Fax</strong><span>+64 3-377 2365</span></div>
            </address>
            <address class="small-6 columns text-right">
                <div>334 Manchester St</div>
                <div>Christchurch 8013</div>
                <div>New Zealand</div>
            </address>
        </div>

        <!-- Map and Address -->
        <div class="row">

            <!-- Map -->
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="margin: auto; overflow:hidden;height:500px;width:90%;"><div id="gmap_canvas" style="height:500px;width:600px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.mapsembed.com" id="get-map-data">mapsembed.com</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(-43.5224331,172.64011860000005),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-43.5224331, 172.64011860000005)});infowindow = new google.maps.InfoWindow({content:"<b>Realty</b><br/>334 Manchester St<br/> Christchurch" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, 'load', init_map);</script>

        </div>





    </div>

</div>




@stop



