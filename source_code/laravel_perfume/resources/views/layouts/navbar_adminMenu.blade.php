
<nav class="d-flex flex-column flex-shrink-0 p-3 text-white rounded-3 navbar-expand-sm bg-dark" style="height: 100%; background-color: #03002e" >
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
<!--        <span class="bi me-2 me-4">-->
<!--            <img src="../resources/images/brand.png" width="50" height="40">-->
<!--        </span>-->
        <span class="fs-3 ml-3">
            Perfume Store
        </span>
    </a>
    <hr style="background-color: white">
    <ul class="nav nav-pills flex-column height-100 fs-4 p-1 small rounded-5 shadow-sm">
        <span>
            Menu
        </span>
        <li class="nav-item link-opacity-50-hover">
            <a href="{{route('dashboard.index')}}" aria-current="page"
               class="fs-3 nav-link link-light link-offset-1-hover bi bi-house mx-3 mt-3 {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                <span class="ms-3">Dashboard</span>
            </a>
        </li>
        <span class="my-sm-3">
            Manage
        </span>
        <li class="nav-item link-opacity-50-hover">
            <a href="{{route('admin.product')}}"
               class="fs-3 nav-link link-light bi bi-box2 mx-3 {{ request()->routeIs('admin.product') ? 'active' : '' }}">
                <span class="ms-3">Products</span>
            </a>
        </li>
        <li class="nav-item link-opacity-50-hover">
            <a href="{{route('category.index')}}"
               class="fs-3 nav-link link-light bi bi-tag mx-3 {{ request()->routeIs('category.index') ? 'active' : '' }}">
                <span class="ms-3">Category</span>
            </a>
        </li>
        <li class="nav-item link-opacity-50-hover">
            <a href="{{route('size.index')}}"
               class="fs-3 nav-link link-light bi bi-arrows-angle-expand mx-3 {{ request()->routeIs('size.index') ? 'active' : '' }}">
                <span class="ms-3">Size</span>
            </a>
        </li>
        <li class="nav-item link-opacity-50-hover">
            <a href="{{route('brand.index')}}"
               class="fs-3 nav-link link-light bi bi-windows mx-3 {{ request()->routeIs('brand.index') ? 'active' : '' }}">
                <span class="ms-3">Brand</span>
            </a>
        </li>
        <li class="nav-item link-opacity-50-hover">
            <a href="{{route('order.index')}}"
               class="fs-3 nav-link link-light bi bi-file-earmark-richtext mx-3 {{ request()->routeIs('order.index') ? 'active' : '' }}">
                <span class="ms-3">Orders</span>
            </a>
        </li>
        <li class="nav-item link-opacity-50-hover">
            <a href="{{route('admin.customer')}}"
               class="fs-3 nav-link link-light bi bi-person mx-3 {{ request()->routeIs('admin.customer') ? 'active' : '' }}">
                <span class="ms-3">Customers</span>
            </a>
        </li>
        <span class="my-sm-3">
            Other
        </span>
        <li class="nav-item link-opacity-50-hover">
            <a href="#" class="fs-3 nav-link link-light bi bi-gear mx-3">
                <span class="ms-3">Settings</span>
            </a>
        </li>
        <li class="nav-item link-opacity-50-hover">
            <a href="../login_logout/login.php" class="fs-3 nav-link link-light bi bi-box-arrow-in-left mx-3">
                <span class="ms-3">Sign out</span>
            </a>
        </li>
    </ul>
    <hr>

</nav>
