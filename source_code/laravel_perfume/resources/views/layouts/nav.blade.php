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
                       href="{{ route('product') }}">STORE
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                       href="{{ route('contact') }}">CONTACT
                    </a>
                </li>
            </ul>
            <form method="get" action="{{ route('product') }}" class="d-flex search-form mb-0" role="search">
                @csrf
                <div class="input-group input-group-sm">
                    <input class="form-control" name="search" type="search" placeholder="Type to search..."
                           aria-label="Search"
                           value="{{request()->query('search')}}">
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
                    {{--                    <a class="nav-link" href="{{ route('product.cartAjax') }}">--}}
                    {{--                        <i class="bi bi-cart"></i>--}}
                    {{--                    </a>--}}
                    <a data-bs-toggle="offcanvas" href="#offcanvas"
                       class="nav-link">
                        <i class="bi bi-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{--------------------------------------------------------------------------------------------}}
{{--CART--}}
<div class="offcanvas offcanvas-end border shadow" id="offcanvas"
     tabindex="-1" aria-modal="true" aria-labelledby="offcanvasLabel"
     style="transition: all 0.4s ease-in-out">
    <div id="myCart" class="w-100 h-100 d-flex flex-column">
        {{--    UPPER --}}
        <div class="w-100">
            <!-- Close -->
            <div class="p-3 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Header-->
            <div class="p-3 d-flex justify-content-center">
                <strong class="fs-5">Your Cart</strong>
            </div>
        </div>
        @php
            //            kiem tra xem cart co ton tai ko
                            $cartCheck = \Illuminate\Support\Facades\Session::get('cart');
        @endphp
        {{--        BODY --}}
        {{--     neu ton tai CART--}}
        @if($cartCheck != null)
            <div class="w-100 h-40 flex-fill d-flex flex-column p-3">
                <!-- List group -->
                <ul class="p-0 m-0 scrollbar flex-fill overflow-y-auto overflow-x-hidden pe-1"
                    id="scroll-style">
                    @foreach(Session::get('cart') as $product_id => $product)
                        <li class="mb-3">
                            <form class="m-0" action="{{route('product.updateCartQuantity', $product_id)}}">
                                <div class="d-flex justify-content-between">
                                    <div class="w-20">
                                        <!-- Image -->
                                        <a href="/product/{{$product_id}}"
                                           class="overflow-hidden ratio ratio-1x1 border rounded d-flex align-items-center justify-content-center">
                                            <img src="{{asset($product['image'])}}" class="object-fit-cover">
                                        </a>
                                    </div>
                                    <div class="w-75">
                                        <div class="d-flex h-100 justify-content-between">
                                            <div class="d-flex flex-column justify-content-between w-80">
                                                <!-- Title -->
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <a class="text-dark text-decoration-none fw-bold text-break"
                                                           href="/product/{{$product_id}}">
                                                            {{$product['product_name']}}
                                                        </a>
                                                    </div>
                                                    <div>
                                                        {{$product['size']['name']}}
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center justify-content-between">
                                                    {{--select--}}
                                                    <div class="text-start text-success">
                                                        ${{$product['price']}}
                                                    </div>
                                                    <div>
                                                        <i class="bi bi-x"></i>
                                                    </div>
                                                    <!-- Quantity -->
                                                    <div class="text-end w-40">
                                                        <input type="number" name="buy_quantity" min="1"
                                                               value="{{$product['quantity']}}"
                                                               class="form-control"
                                                               onchange="this.form.submit()">
                                                    </div>
                                                    @php
                                                        $total_items[$product_id] = $product['quantity']
                                                    @endphp
                                                </div>
                                            </div>
                                            <div class="w-10 d-flex justify-content-center align-items-center">
                                                <!-- Remove -->
                                                <a class="h-25"
                                                   href="{{route('product.deleteFromCart', $product_id)}}">
                                                    <i class="bi bi-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $amount[$product_id] = $product['price'] * $product['quantity']
                                    @endphp
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{--        lower --}}
            <div class="w-100 p-3">
                <!-- Footer -->
                <div class="justify-between">
                    <div class="mb-3">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                Total items
                            </div>
                            <div>
                                {{array_sum($total_items)}}
                            </div>
                        </div>

                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                Amount
                            </div>
                            <div class="text-success">
                                ${{array_sum($amount)}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <a class="btn w-45 btn-outline-dark" href="{{route('product')}}">Continue Shopping</a>
                    <a class="btn w-45 btn-dark" href="{{route('checkout')}}">Continue to Checkout</a>
                </div>
            </div>
            {{--            neu cart trong --}}
        @else
            <div class="d-flex align-items-center justify-content-center w-100 h-100">
                <div>
                    Your cart is empty for now 🥺
                </div>
            </div>
        @endif
    </div>
</div>

<script src="{{asset('frontend/js/home.js')}}"></script>
<script src="{{asset('frontend/js/cart.js')}}"></script>

