@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <div class="d-flex justify-content-between mb-3">
        <div class="w-100 text-capitalize text-center fs-3 fw-bold bg-dark text-white py-4">
            Sannin Store Lego Products
        </div>
    </div>
    <div class="container-fluid fs-6">
        {{--                SORTING--}}
        <div class="d-flex justify-content-end align-items-center">
            <form action="" class="d-flex">
                <label for="sorting" class="w-50 d-flex align-items-center justify-content-center px-1">
                    Sort by
                </label>
                <select class="form-select" aria-label="sorting" id="sorting">
                    <option value="1">Default</option>
                    <option value="2">Newest</option>
                    <option value="3">Bestseller</option>
                    <option value="4">Price: Low to High</option>
                    <option value="5">Price: High to Low</option>
                    <option value="5">Price: High to Low</option>
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
                                 data-bs-toggle="collapse" data-bs-target="#sort" aria-expanded="false"
                                 aria-controls="sort">
                                <div class="filter-title">Sort by</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="sort">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort" id="re" value=""
                                               checked>
                                        <label class="form-check-label" for="re">
                                            Recommended
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort" id="ne" value="">
                                        <label class="form-check-label" for="ne">
                                            Newest
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort" id="lo" value="">
                                        <label class="form-check-label" for="lo">
                                            Price: Low to High
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sort" id="hi" value="">
                                        <label class="form-check-label" for="hi">
                                            Price: High to Low
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
                                        <input class="form-check-input" type="checkbox" name="price" id="0" value=""
                                        >
                                        <label class="form-check-label" for="0">
                                            $0 - $50
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price" id="1" value="">
                                        <label class="form-check-label" for="1">
                                            $50 - $100
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price" id="2" value="">
                                        <label class="form-check-label" for="2">
                                            $100 - $200
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="price" id="3" value="">
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand" id="ga" value=""
                                        >
                                        <label class="form-check-label" for="ga">
                                            Giorgio Armani
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand" id="ch" value="">
                                        <label class="form-check-label" for="ch">
                                            Channel
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand" id="di" value="">
                                        <label class="form-check-label" for="di">
                                            Dior
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand" id="dg" value="">
                                        <label class="form-check-label" for="dg">
                                            Dolce & Gabbana
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <a href="" class="btn btn-dark w-45">Reset</a>
                        <button class="btn btn-primary w-45">Apply</button>
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
                            <div class="col border bg-white">
                                <div
                                    class="position-relative overflow-hidden d-flex justify-content-center">
                                    <img
                                        src="{{$product->image}}"
                                        height="200px"
                                        class="p-1 mt-5"
                                        alt="product_image">
                                    <div
                                        class="w-100 mt-3 position-absolute d-flex justify-content-between">
                                        <div class="border rounded-5">
                                            <a href="" class="btn btn-light rounded-5 p-2">
                                                <i class="py-3 bi bi-star text-warning"></i>
                                            </a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-droplet p-1"></i>
                                            <span class="p-1">
                                                {{$product->size_id}}
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
                                        <a href="" class="btn btn-warning rounded-5 me-2">
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
                    {{--                    pagination--}}
                    <div class="mt-5">
                        <div class="pt-3">
                            {{$products->onEachSide(2)->links()}}
                        </div>
                    </div>
                </div>
            </div>
            {{--END PRODUCT--}}
        </div>
    </div>
    @include('layouts/footer')
</x-layout>
<script src="{{asset('frontend/js/product.js')}}"></script>
