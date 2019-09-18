<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials._head')
</head>

<body>
    {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
    @else
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
    @endauth
    </div>
    @endif
    --}}
    @include('partials._nav')

    <div class="container">
        @include('partials._messages')
        @yield('content')
        <!-- yield this area, this area will be different -->
        @include('partials._footer')
    </div>

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    @include('partials._javascript')
    @yield('scripts')

</body>

</html>