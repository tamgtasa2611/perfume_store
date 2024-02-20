@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="offcanvas offcanvas-end show visible justify-content-between align-items-center " id="modalShoppingCart"
         tabindex="-1" role="dialog" aria-modal="true">
        {{--        upper--}}
        <div class="w-100 h-60 flex-fill d-flex flex-column p-3">
            <div class="d-flex justify-content-between">
                <!-- Close -->
                <div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="bi bi-x" aria-hidden="true"></i>
                    </button>
                </div>
                <div>
                    <a href="{{route('product.cart')}}" class="text-decoration-none">
                        View full cart
                    </a>
                </div>
            </div>

            <!-- Header-->
            <div class="offcanvas-header justify-content-center">
                <strong class="fs-5">Your Cart</strong>
            </div>
            @php
                //            kiem tra xem cart co ton tai ko
                                $cartCheck = \Illuminate\Support\Facades\Session::get('cart');
            @endphp
            {{--            neu ton tai--}}
            @if($cartCheck != null)
                <!-- List group -->
                <ul class="p-0 m-0 scrollbar flex-fill overflow-y-auto overflow-x-hidden pe-1"
                    id="scroll-style">
                    @foreach(Session::get('cart') as $product_id => $product)
                        <li class="mb-3">
                            <form class="m-0" action="{{route('product.updateCartQuantity', $product_id)}}">
                                <div class="d-flex justify-content-between">
                                    <div class="w-25">
                                        <!-- Image -->
                                        <a href="/product/{{$product_id}}"
                                           class="overflow-hidden ratio ratio-1x1 border rounded d-flex align-items-center justify-content-center">
                                            <img src="{{asset($product['image'])}}" class="object-fit-cover">
                                        </a>
                                    </div>
                                    <div class="w-70">
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
                                            <div class="w-10 d-flex justify-content-center">
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
                {{--            neu cart trong --}}
            @else
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div>
                        Your cart is empty for now 🥺
                    </div>
                </div>
            @endif
        </div>
        {{--        lower--}}
        @if($cartCheck != null)
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
                <div>
                    <a class="btn w-100 btn-dark mb-3" href="{{route('checkout')}}">Continue to Checkout</a>
                    <a class="btn w-100 btn-outline-dark" href="{{route('product')}}">Continue Shopping</a>
                </div>
            </div>
        @endif
    </div>
    @include('layouts/footer')
</x-layout>
