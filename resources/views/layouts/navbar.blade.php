<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if (route('home')==url()->current()) active @endif">
                <a class="nav-link" href="{{ route('home') }}">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            @if(Auth::user()->is_admin)
            <li class="nav-item @if (route('books.index')==url()->current()) active @endif">
                <a class="nav-link" href="{{ route('books.index') }}" >Books</a>
            </li>
            @endif
            <li class="nav-item @if (route('subscribe.index')==url()->current()) active @endif">
                <a class="nav-link" href="{{ route('subscribe.index') }}" >@if(Auth::user()->is_admin)Subscribers @else Book @endif</a>
            </li>


        </ul>
        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>

    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->