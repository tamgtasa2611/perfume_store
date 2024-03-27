@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Product Manager</title>
<body style="background-color: #f2f7fe">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 360px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->
        <div class="content-container mt-5 w-100">
            <h1 class="me-sm-5 text-center">Product Detail #{{$product->id}}</h1>
            <div class="container bg-white mt-5 rounded-5 d-flex justify-content-center align-items-center w-75" style="height: 700px">
                {{--       IMG--}}
                <div class="w-10 d-flex align-items-center justify-content-center h-50 overflow-hidden me-5">
                    <img src="{{asset($product->image)}}" alt="product_image"
                         class="h-75">
                </div>
                {{--        MAIN--}}
                <div class="w-50">
                    {{--            HEADING--}}
                    <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                        <div class="fs-3 fw-bold text-capitalize w-50">{{$product->product_name}}</div>
                        <div>
                            <div class="btn rounded-5 btn-dark border">{{$product->category->category_name}}</div>
                        </div>
                    </div>
                    {{--            BODY--}}
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="fs-5 fw-bold text-success">
                            <span class="">${{$product->price + 20}}</span>
                        </div>
                    </div>
                    <div class="my-3">
                        <p>
                            {{$product->description}}
                        </p>
                    </div>
                    <table class="table table-bordered text-center w-100 my-3">
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
                            <td class="bg-white">{{$product->size->size_name}}</td>
                        </tr>
                        <tr>
                            <td class="w-25">Season</td>
                            <td class="bg-white">{{$product->season->season_name}}</td>
                        </tr>
                    </table>
                    {{--BUTTON--}}
                    <form action="" class="d-flex justify-content-between align-items-center w-100">
                        <div class="d-flex align-items-center w-25">
                            <a href="{{route('admin.product')}}" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-arrow-left me-2"></i>
                                Back
                            </a>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary h-100">
                                <a href="{{route('product.edit', $product) }}"
                                   class="text-white nav-link"
                                   style="text-decoration: none">Edit Product</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>

</div>
</body>
<x-flash-message/>


