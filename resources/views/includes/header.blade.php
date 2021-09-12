<header>
    <div id="menu-btn-element" onclick="menuToggle()">
        <div id="menu-btn">
            <div class="menu-icon"></div>
            <p class="menu-text">Menu</p>
        </div>
    </div>
    <nav id="main-menu" class="menu-closed">

        <ul>
            <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="menu-item"><a href="{{ route('projects') }}">Projects</a></li>
            <li class="menu-item"><a href="{{ route('contact') }}">Contact</a></li>
            @if ($isAdmin)
                <li class="menu-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="menu-item"><a href="{{ route('diary') }}">Diary</a></li>
            @endif
            @if ($isAdmin || $isPremiumUser)
                <li class="menu-item"><a href="{{ route('tools') }}">Tools</a></li>
            @endif
        </ul>

        <ul>
            @guest
                <li class="menu-item"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
{{--                @if (Route::has('register'))--}}
{{--                    <li class="menu-item"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
{{--                @endif--}}
            @else
                <li class="menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><a href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>

    </nav>
</header>
