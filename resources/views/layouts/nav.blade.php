    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="{{ route('ideas.index') }}"><span class="fas fa-brain me-1">
                </span>{{ config('app.name') }}</a>
            <a class="btn nav-item btn-sm" href="{{ route('setLang','en') }}">En</a>
            <a class="btn nav-item btn-sm" href="{{ route('setLang','ar') }}">Ar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('login') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                    @auth
                        @if (Auth::user()->is_admin)
                            <li class="nav-item mx-4">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">Admin
                                    Dashboard</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <div class="d-flex gap-2">
                                <div class="d-flex gap-1">
                                    <img src="{{ $user->getImageUrl() }}" alt="Profile" class="rounded-circle"
                                        style="height:3rem">
                                    <a class="nav-link {{ Route::is('profile') ? 'active' : '' }}"
                                        href="{{ route('profile', Auth::id()) }}"> {{ Auth::user()->name }} </a>
                                </div>
                                <div class="d-flex align-items-center justify-contnet-center">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-info"
                                            href="{{ route('logout') }}">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
