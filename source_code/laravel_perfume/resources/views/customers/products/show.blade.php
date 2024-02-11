@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="container bg-white h-80 mt-5 rounded-5 d-flex justify-content-center align-items-center">
        <div class="w-50 d-flex align-items-center justify-content-center h-100">
            <img src="{{asset($product->image)}}" alt="product_image"
                 class="h-80">
        </div>
        <div class="w-50">
            <div class="w-100 d-flex justify-content-between align-items-baseline">
                <div class="fs-4 fw-bold text-capitalize">{{$product->product_name}}</div>
                <div class="fst-italic">brand</div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="fs-5 fw-bold text-success">${{$product->price}}</div>
                <div class="">{{$product->quantity}} left in stock</div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span class="me-3">
                        Quantity
                    </span>
                    <input type="number" class="form-control rounded-5 w-25" name="quantity" id="quantity"
                           step="1" value="" min="0">
                </div>
                <div>
                    <a href="" class="btn btn-light border rounded-5 me-2">
                        <i class="p-2 bi bi-bag"></i>
                        <span class="pe-2">Add to cart</span>
                    </a>
                    <a href="" class="btn btn-primary rounded-5">
                        <i class="p-2 bi bi-bag"></i>
                        <span class="pe-2">Buy now</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
</x-layout>
