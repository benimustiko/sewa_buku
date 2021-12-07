<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
    <div class="container">
        @guest
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        @endguest
        @if (Auth::check())
            @if (Auth::user()->is_admin != 0)
                <a class="navbar-brand" href="{{ route('daftarsewa') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @else
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @endif
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @if (Auth::check())
                    @if (Auth::user()->is_admin != 0)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('daftarsewa') }}">{{ __('DAFTAR SEWA') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books') }}">{{ __('BOOKS') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('HOME') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bukumu') }}">{{ __('BUKUMU') }}</a>
                        </li>
                    @endif
                @endif
            </ul>

            @auth
                <ul class="navbar-nav ms-auto">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </ul>
            @endauth
        </div>
    </div>
</nav>