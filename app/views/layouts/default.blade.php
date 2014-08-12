<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{ HTML::style('styles/main.css') }}
    {{ HTML::style('styles/icon-fonts/style.css') }}

    <title>@yield('title') &ndash; Realty</title>

    <style>
        .flash {
            padding: 1em;
            border: 1px dotted black;
        }
    </style>
</head>

<body>


<nav class="top-bar" data-topbar>

    <ul class="title-area">
        <li class="name">
            <h1>{{ link_to_route('home', 'Realty') }}</h1>
        </li>
        <li class="toggle-topbar menu-icon">
            <a href="#"><span>Menu</span></a>
        </li>
    </ul>

    <section class="top-bar-section">
        <ul class="right">

            <li class="{{ set_active('/') }}">{{ link_to_route('home', 'Home') }}</li>

            @if(Auth::check())
                <li class="{{ set_active('wishlist') }}">{{ link_to_route('wishlist', 'Your Wishlist') }}</li>
            @endif

                <li class="{{ set_active('about') }}">{{ link_to_route('about', 'About') }}</li>
                <li class="{{ set_active('contact') }}">{{ link_to_route('contact', 'Contact') }}</li>

            @if(Auth::guest())
                <!-- Guest -->
                <li>{{ link_to_route('register', 'Register') }}</li>
                <li>{{ link_to_route('login', 'Login') }}</li>
                <li><small>{{ link_to_route('admin.login', 'Admin') }}</small></li>
            @else
                <li class="has-dropdown">
                    <a href="#">{{ Auth::user()->email }}</a>
                    <ul class="dropdown">
                        <li>{{ link_to_route('logout', 'Logout') }}</li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
</nav>










    @if (Session::get('flash_message'))
        <div class="flash">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <div class="container">
        @yield('content')
    </div>



    {{ HTML::script('scripts/vendor/jquery-2.1.1.min.js') }}
    {{ HTML::script('scripts/vendor/foundation/foundation.js') }}
    {{ HTML::script('scripts/vendor/foundation/foundation.topbar.js') }}
    {{ HTML::script('scripts/vendor/underscore.js') }}




    <script>
        $(document).foundation();
    </script>
    @include('partials.jsdata')
    @yield('scripts')
</body>
</html>