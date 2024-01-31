<nav class="navbar bg-dark navbar-expand-lg bd-navbar fixed-top" data-bs-theme="dark">
    <div class="container-xxl bd-gutter flex-wrap flex-lg-nowrap text-uppercase">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/brand.png')}}" alt="brand"
                 height="32" class="rounded">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} {{ request()->routeIs('home') ? 'active' : '' }}"
                       aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('discover') ? 'active' : '' }}"
                       href="{{ route('discover') }}">DISCOVER
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('product') ? 'active' : '' }}"
                       href="{{ route('product') }}">ALL PRODUCTS
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('product/female') ? 'active' : '' }}"
                       href="{{ route('product/female') }}">WOMEN'S PERFUMES
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('product/male') ? 'active' : '' }}"
                       href="{{ route('product/male') }}">MEN'S PERFUMES
                    </a>
                </li>
            </ul>
            <form class="d-flex search-form mb-0" role="search">
                <div class="input-group input-group-sm">
                    <input class="form-control" name="search" type="search" placeholder="Type to search..."
                           aria-label="Search"
                           value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">
                        <i class="bi bi-person"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/wishlist">
                        <i class="bi bi-star"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart') }}">
                        <i class="bi bi-bag"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
