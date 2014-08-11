<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{ HTML::style('styles/jquery.growl.css') }}
    {{ HTML::style('styles/main.css') }}
    {{ HTML::style('styles/icon-fonts/style.css') }}
    {{ HTML::style('styles/ui-lightness/jquery-ui-1.10.4.css') }}



    <title>@yield('title') &ndash; Realty</title>
</head>

<body>

    <nav class="top-bar" data-topbar>

        <ul class="title-area">
            <li class="name">
                <h1><a href="#">Realty</a></h1>
            </li>
            <li class="toggle-topbar menu-icon">
                <a href="#"><span>Menu</span></a>
            </li>
        </ul>

        <section class="top-bar-section">
            <ul class="right">

                <li class="{{ set_active('admin') }}">{{ link_to_route('admin.home', 'Home') }}</li>
                <li class="{{ set_active('admin/locations') }}">{{ link_to_route('admin.locations.index', 'Locations') }}</li>
                <li class="{{ set_active('admin/listings') }}">{{ link_to_route('admin.listings.index', 'Listings') }}</li>

                <li class="has-dropdown">
                    <a href="#">{{ Auth::user()->email }}</a>
                    <ul class="dropdown">
                        <li>{{ link_to_route('logout', 'Logout') }}</li>
                    </ul>
                </li>
            </ul>
        </section>
    </nav>




    @if (Session::get('flash_message'))
        <div class="flash">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <div id="container">
        @yield('content')
    </div>




    <!-- jQuery -->
    {{ HTML::script('scripts/vendor/jquery-2.1.1.min.js') }}
    {{ HTML::script('scripts/vendor/jquery-ui-1.10.4.min.js') }}

    <!-- Foundation -->
    {{ HTML::script('scripts/vendor/foundation/foundation.js') }}

    <!-- Foundation Add-ons -->
    {{ HTML::script('scripts/vendor/foundation/foundation.topbar.js') }}
    {{ HTML::script('scripts/vendor/foundation/foundation.reveal.js') }}
    {{ HTML::script('scripts/vendor/foundation/foundation.dropdown.js') }}

    <!-- Underscore -->
    {{ HTML::script('scripts/vendor/underscore.js') }}

    <!-- User Notifications -->
    {{ HTML::script('scripts/vendor/jquery.growl.js') }}
    {{ HTML::script('scripts/joseph/News.js') }}


    <script>
        $(document).foundation();
    </script>

    <!-- Client-side data from JavaScript::put -->
    @include('partials.jsdata')

    @yield('scripts')
</body>
</html>