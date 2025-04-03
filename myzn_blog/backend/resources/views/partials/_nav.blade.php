    {{-- Default Bootstrap Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Laravel Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? "active" : " " }}">
                    <a class="nav-link " href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('/blog') ? "active" : " " }}">
                    <a class="nav-link " href="/blog">Blog <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('about') ? "active" : " " }}">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? "active" : " " }}">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>

            </ul>

            <ul class="my-2 my-lg-0 navbar-nav">
                @if (Auth::check())

                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                            <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                         </a>
                        </div>
                    </div>

                @else
                    <li class="nav-item">
                        <a class="btn btn-default" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-default" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                @endif
            </ul>

        </div>
    </nav>
