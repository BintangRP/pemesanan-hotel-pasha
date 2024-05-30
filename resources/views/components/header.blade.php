<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4"><img src="{{ asset('assets/favicon-32x32.png') }}" alt="logo"></span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                aria-current="page">Home</a></li>
        <li class="nav-item"><a href="/pricelist"
                class="nav-link {{ request()->is('pricelist') ? 'active' : '' }}">Pricelist</a></li>
        <li class="nav-item"><a href="/pesan" class="nav-link {{ request()->is('pesan') ? 'active' : '' }}">Booking
                Kamar</a></li>
        <li class="nav-item"><a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">Tentang
                Kami</a></li>
    </ul>
</header>
