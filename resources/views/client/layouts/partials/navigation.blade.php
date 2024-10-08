<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand fs-4 fst-italic text-dark d-flex align-items-center" href="/">
            <img src="{{ asset('client/img/logo.png') }}" alt="Logo" class="me-2" style="height: 40px;">
            <span class="fw-bold">Nasi</span> Kulit.
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-5 {{ Request::is('products*') ? 'active' : '' }} text-dark position-relative"
                        href="{{ route('client.product.index') }}">
                        Produk
                        <span class="underline"></span>
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link fs-5 {{ Request::is('tentang-kami*') ? 'active' : '' }} text-dark position-relative"
                        href="{{ route('about') }}">
                        Tentang Kami
                        <span class="underline"></span>
                    </a>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link fs-5 dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @auth
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item ms-3">
                            <a class="nav-link fs-5 {{ Request::is('keranjang-saya*') ? 'active' : '' }} text-dark"
                                href="{{ route('client.product.cart') }}">
                                <i class="bi bi-cart3"></i>
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        border-bottom: 2px solid #ddd;
        transition: background-color 0.3s ease;
    }

    .navbar-brand img {
        transition: transform 0.3s ease;
    }

    .navbar-brand:hover img {
        transform: scale(1.1);
    }

    .nav-link {
        position: relative;
        overflow: hidden;
    }

    .nav-link .underline {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background-color: #333;
        transform: translateX(-105%);
        border-radius: 0 5px 5px 0; /* Rounded edge on the right side */
        transition: transform 0.4s ease;
    }

    .nav-link:hover .underline {
        transform: translateX(0);
    }

    .dropdown-menu {
        transition: opacity 0.3s ease;
    }

    .dropdown-menu.show {
        opacity: 1;
    }
</style>
