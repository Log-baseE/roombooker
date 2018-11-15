<nav class="main-nav">
    <div class="container">
        <a href="{{ route('front.index') }}" class="logo">
            LOGO
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarLinks"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarLinks" class="navbar-links left-links">
            <ul>
                <li><a href="{{ route('front.about') }}">{{ __('About Us') }}</a></li>
                <li class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button">{{ __('Support') }}</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('front.faq') }}">FAQ</a>
                        <a class="dropdown-item" href="{{ route('front.contact') }}">{{ __('Contact us') }}</a>
                    </div>
                </li>
                <li role="separator" class="divider"></li>
            </ul>
        </div>
        <div id="navbarLinks" class="navbar-links right-links">
            <ul>
                @guest
                <li>
                    <a class="login" href="{{ route('login') }}">{{ __('Log in') }}</a>
                </li>
                <li>
                    <a class="dashboard-action" href="{{ route('signup') }}">{{ __('Sign up') }}</a>
                </li>
                @else
                <li>
                    <a class="dashboard-action" href="{{ route('dashboard.index') }}">{{ __('Go to dashboard') }}</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
