@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')

    <div class="offcanvas offcanvas-end show" id="modalShoppingCart" tabindex="-1" role="dialog" aria-modal="true" style="visibility: visible;">

        <!-- Close -->
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fe fe-x" aria-hidden="true"></i>
        </button>

        <!-- Header-->
        <div class="offcanvas-header lh-fixed fs-lg">
            <strong class="mx-auto">Your Cart </strong>
        </div>

        <!-- List group -->


        <ul class="list-group list-group-lg list-group-flush">
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
                                        <option value="1">25ml</option>
                                        <option value="2">30ml</option>
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
                                    $total_price[$product_id] = $product['price'] * $product['quantity']
                                @endphp
                            </div>
                        </div>
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
        </form>
        <!-- Footer -->
        <div class="offcanvas-footer justify-between lh-fixed fs-sm bg-light mt-auto">
            <strong>Subtotal</strong> <strong class="ms-auto">
                @if(\Illuminate\Support\Facades\Session::get('cart') != null)
                    ${{array_sum($total_price)}}
                @else
                    $0
                @endif
            </strong>
        </div>

        <!-- Buttons -->
        <div class="offcanvas-body">
            <a class="btn w-100 btn-dark" href="/checkout">Continue to Checkout</a>
            <a class="btn w-100 btn-outline-dark mt-2" href="/product">Continue Shopping</a>
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
    @include('layouts/footer')
</x-layout>
