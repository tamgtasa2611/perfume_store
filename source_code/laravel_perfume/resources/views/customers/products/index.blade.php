@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="d-flex justify-content-between mb-3">
        <div class="w-100 text-uppercase text-center bg-black fs-3 fw-bold text-white py-4">
            All Perfumes
        </div>
    </div>
    <div class="container-fluid fs-6">
        {{--                SORTING--}}
        <div class="d-flex justify-content-end align-items-center">
            <form action="" class="d-flex" style="width: 250px">
                <label for="sorting" class="w-50 d-flex align-items-center justify-content-center px-1">
                    Sort by
                </label>
                <select class="form-select" aria-label="sorting" id="sorting" name="sorting"
                        onchange="this.form.submit()">
                    <option value="default" {{$sorting == 'default' ? 'selected' : ''}}>Default
                    </option>
                    <option value="newest" {{$sorting == 'newest' ? 'selected' : ''}}>Newest</option>
                    <option value="bestseller" {{$sorting == 'bestseller' ? 'selected' : ''}}>Bestseller</option>
                    <option value="low_to_high" {{$sorting == 'low_to_high' ? 'selected' : ''}}>Price: Low to High</option>
                    <option value="high_to_low" {{$sorting == 'high_to_low' ? 'selected' : ''}}>Price: High to Low</option>
                </select>
            </form>
        </div>
        {{--        MAIN--}}
        <div class="d-flex">
            {{--FILTER--}}
            <div class="w-20 pe-3">
                <hr class="mt-0">
                <form action="" method="get">
                    <div class="w-100 filter-item">
                        <div>
                            <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                                 data-bs-toggle="collapse" data-bs-target="#price" aria-expanded="false"
                                 aria-controls="price">
                                <div class="filter-title">Price</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="price">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price" id="0" value="0"
                                            {{$price == 0 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="0">
                                            $0 - $50
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price" id="1" value="1"
                                            {{$price == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="1">
                                            $50 - $100
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price" id="2"
                                               value="2"{{$price == 2 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="2">
                                            $100 - $200
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price" id="3"
                                               value="3"{{$price == 3 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="3">
                                            > $200
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="w-100 filter-item">
                        <div>
                            <div class="d-flex justify-content-between align-items-center hover-pointer filter-main"
                                 data-bs-toggle="collapse" data-bs-target="#brand" aria-expanded="false"
                                 aria-controls="brand">
                                <div class="filter-title">Brand</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="brand">
                                <div>
                                    @foreach($products as $product)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="brand" id="ga"
                                                   value=""
                                            >
                                            <label class="form-check-label" for="ga">
                                                Giorgio Armani
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <a href="" class="btn btn-dark rounded-5 w-45">Reset</a>
                        <button class="btn btn-primary rounded-5 w-45">Apply</button>
                    </div>
                </form>
            </div>
            {{--END FILTER--}}
            {{--PRODUCT--}}
            <div class="w-80">
                {{--                PRODUCT LIST--}}
                <div class="container text-center">
                    <div class="row row-cols-3">
                        @foreach($products as $product)
                            <div class="col border">
                                <div
                                    class="position-relative overflow-hidden d-flex justify-content-center">
                                    <img
                                        src="{{$product->image}}"
                                        height="200px"
                                        class="p-1 mt-5"
                                        alt="product_image">
                                    <div
                                        class="w-100 mt-3 position-absolute d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-calendar p-1"></i>
                                            <span class="p-1">
                                                {{$product->season_name}}
                                            </span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-droplet p-1"></i>
                                            <span class="p-1">
                                                {{$product->size_name}}ml
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 text-capitalize">
                                    {{$product->product_name}}
                                </div>
                                <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                                    <div class="text-start text-success">${{$product->price}}</div>
                                    <div class="d-flex text-end">
                                        <a href="" class="btn btn-dark rounded-5 me-2">
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
                        @endforeach
                    </div>
                </div>
                {{--                    pagination--}}
                <div class="mt-5">
                    <div class="pt-3">
                        {{$products->onEachSide(2)->links()}}
                    </div>
                </div>
            </div>
            {{--END PRODUCT--}}
        </div>
    </div>
    @include('layouts/footer')
</x-layout>
<script src="{{asset('frontend/js/product.js')}}"></script>
