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
                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" style="color: #c0c0c0">
                        <i class="bi bi-cart" style="padding-top: 30px"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--   CART -->>
<div class="offcanvas offcanvas-end" id="offcanvasExample"
     tabindex="-1" aria-modal="true" aria-labelledby="offcanvasExampleLabel">
    <!-- Close -->
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="fe fe-x" aria-hidden="true"></i>
    </button>

    <!-- Header-->
    <div class="offcanvas-header lh-fixed fs-lg">
        <strong class="mx-auto">Your Cart </strong>
    </div>

    <!-- Body-->
    <ul class="list-group list-group-lg lh-fixed list-group-flush">
        <li class="list-group-item">
            @if(\Illuminate\Support\Facades\Session::get('cart') != null)
                @foreach(Session::get('cart') as $product_id => $product)
                    <form class="m-0" action="{{route('product.updateCartQuantity', $product_id)}}">
                        <div class="row align-items-center">

                            <div class="col-4">
                                <!-- Image -->
                                <a href="/product/{{$product_id}}"
                                   class="overflow-hidden ratio ratio-1x1 d-flex align-items-center justify-content-center">
                                    <img src="{{asset($product['image'])}}" class="object-fit-cover">
                                </a>

                            </div>
                            <div class="col-8">
                                <!-- Title -->
                                <p class="fs-sm fw-bold mb-6">
                                    <a class="text-body">{{$product['product_name']}}</a> <br>
                                    <span class="text-muted">${{$product['price']}}</span>
                                </p>


                                <!--Footer -->
                                <div class="d-flex align-items-center">
                                    <!-- Quantity -->
                                    <input type="number" name="buy_quantity" min="1"
                                           value="{{$product['quantity']}}"
                                           class="form-control rounded-3"
                                           style="margin-right: 20px"
                                           onchange="this.form.submit()">
                                    @php
                                        $total_items[$product_id] = $product['quantity']
                                    @endphp

                                        <!-- Select -->
                                    <select class="form-select form-select-xxs w-auto" style="margin-right: 20px">
                                        <option value="3">50ml</option>
                                        <option value="4">100ml</option>
                                        <option value="5">125ml</option>
                                        <option value="6">200ml</option>
                                    </select>

                                    <!-- Remove -->
                                    <a class="fs-xs text-gray-400 ms-auto" href="{{route('product.deleteFromCart', $product_id)}}">
                                        <i style="color:red" class="bi bi-x"></i>
                                    </a>

                                </div>
                            </div>

                            <div class="w-10 p-2 text-success">
                                ${{$product['price'] * $product['quantity']}}
                                @php
                                    $amount[$product_id] = $product['price'] * $product['quantity']
                                @endphp
                            </div>
                        </div>
                    </form>
                @endforeach
            @else
                 <div class="d-flex align-items-center justify-content-center flex-column min-vh-50">
                     <div class="fs-6 mb-3">
                          Your cart is empty
                     </div>
                          <a href="{{route('product')}}" class="btn btn-primary rounded-5">Shop now</a>
                 </div>
            @endif
        </li>
    </ul>

    <!-- Footer -->
    <div class="offcanvas-footer justify-between lh-fixed fs-sm bg-light mt-auto">
        <div class="mb-3 d-flex justify-content-around">
            <div> Total items </div>
            <div>
                @if(\Illuminate\Support\Facades\Session::get('cart') != null)
                    {{array_sum($total_items)}}
                @else
                    0
                @endif
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-around">
                    <div>
                        Amount
                    </div>
                    <div class="text-success">
                        @if(\Illuminate\Support\Facades\Session::get('cart') != null)
                            ${{array_sum($amount)}}
                        @else
                            $0
                        @endif
                    </div>
                </div>
        <div class="d-flex align-items-center justify-content-center">
                <a class="btn w-70 btn-dark" href="#">
                    Continue to checkout
                </a>
            </div>
        <div class="d-flex align-items-center justify-content-center" style="margin-top: 10px; margin-bottom: 10px">
            <a class="btn w-70 btn-outline-dark" href="{{route('product')}}">
                Continue shopping
            </a>
        </div>
    </div>

    <!-- Empty cart (remove `.d-none` to enable it) -->
    <div class="d-none">

        <!-- Close -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fe fe-x" aria-hidden="true"></i>
        </button>

        <!-- Header-->
        <div class="offcanvas-header lh-fixed fs-lg">
            <strong class="mx-auto">Your Cart (0)</strong>
        </div>

        <!-- Body -->
        <div class="offcanvas-body flex-grow-0 my-auto">

            <!-- Heading -->
            <h6 class="mb-7 text-center">Your cart is empty 😞</h6>

            <!-- Button -->
            <a class="btn w-100 btn-outline-dark" href="/product">
                Continue Shopping
            </a>

        </div>

    </div>

</div>
