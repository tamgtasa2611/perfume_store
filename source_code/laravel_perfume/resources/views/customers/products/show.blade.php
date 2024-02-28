<title>{{$product->product_name}}</title>
@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container bg-white h-70 mt-5 rounded d-flex justify-content-evenly align-items-center
    overflow-y-hidden">
        {{--       IMG--}}
        <div class="w-40 d-flex align-items-center justify-content-center ratio ratio-4x3
        overflow-hidden object-fit-contain p-5">
            <img src="{{asset($product->image)}}" alt="product_image"
                 class="p-5">
        </div>
        {{--        MAIN--}}
        <div class="w-60 pe-3">
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
                    ${{$product->price}}
                </div>
            </div>
            <div class="my-3">
                <p>
                    {{$product->description}}
                </p>
            </div>
            <table class="table table-bordered text-center w-100 my-3 fs-6">
                <tr>
                    <td class="w-25">Brand</td>
                    <td class="bg-white">{{$product->brand->brand_name}}</td>
                </tr>
                <tr>
                    <td class="w-25">Gender</td>
                    <td class="bg-white">{{$product->gender->gender_name}}</td>
                </tr>
                <tr>
                    <td class="w-25">Size</td>
                    <td class="bg-white">{{$product->size->size_name}}ml</td>
                </tr>
                <tr>
                    <td class="w-25">Season</td>
                    <td class="bg-white">{{$product->season->season_name}}</td>
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
                    <a class="btn btn-light border rounded-5"
                       id="addToCartAjax">
                        <i class="p-2 bi bi-cart"></i>
                        <span class="pe-2">Add to cart</span>
                    </a>
                    <a class="btn btn-primary rounded-5 ms-3"
                       href="{{route('product.addToCart', $product->id)}}">
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
