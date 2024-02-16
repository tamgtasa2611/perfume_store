@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container bg-white h-80 mt-5 rounded-5 d-flex justify-content-center align-items-center">
        {{--       IMG--}}
        <div class="w-50 d-flex align-items-center justify-content-center h-100 overflow-hidden">
            <img src="{{asset($product->image)}}" alt="product_image"
                 class="h-80">
        </div>
        {{--        MAIN--}}
        <div class="w-50 pe-3">
            {{--            HEADING--}}
            <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                <div class="fs-3 fw-bold text-capitalize w-50">{{$product->product_name}}
                </div>
                <div>
                    <div class="btn rounded-5 btn-dark border">{{$product->category->category_name}}</div>
                </div>
            </div>
            {{--            BODY--}}
            <div class="d-flex justify-content-start align-items-center">
                <div class="fs-5 fw-bold text-success">
                    <span class="text-danger text-decoration-line-through">${{$product->price + 20}}</span>
                    ${{$product->price}}
                </div>
            </div>
            <div class="my-3">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <table class="table table-bordered text-center w-100 my-3">
                <tr>
                    <td class="w-25">Brand</td>
                    <td class="bg-white">{{$product->brand->brand_name}}</td>
                </tr>
                <tr>
                    <td class="w-25">Size</td>
                    <td class="bg-white">{{$product->size->size_name}}</td>
                </tr>
                <tr>
                    <td class="w-25">Season</td>
                    <td class="bg-white">{{$product->season->season_name}}</td>
                </tr>
                <tr>
                    <td class="w-25">In stock</td>
                    <td class="bg-white">{{$product->quantity}}</td>
                </tr>
            </table>
            {{--BUTTON--}}
            <form action="" class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center w-25">
                    <a href="{{route('product')}}" class="text-decoration-none d-flex align-items-center">
                        <i class="bi bi-arrow-left me-2"></i>
                        Back
                    </a>
                </div>
                <div class="w-75 d-flex justify-content-end">
                    <a class="btn btn-light border rounded-5 me-3" href="{{route('product.addToCart2', $product->id)}}"
                       id="addToCart">
                        <i class="p-2 bi bi-cart"></i>
                        <span class="pe-2">Add to cart</span>
                    </a>
                    <a class="btn btn-primary rounded-5" href="{{route('product.addToCart', $product)}}">
                        <i class="p-2 bi bi-bag"></i>
                        <span class="pe-2">Buy now</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    @include('layouts/footer')
</x-layout>
<script src="{{asset('frontend/js/product.js')}}"></script>
