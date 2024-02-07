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
                    <option value="newest" {{$sorting == 'newest' ? 'selected' : ''}}>Newest
                    </option>
                    <option value="bestseller" {{$sorting == 'bestseller' ? 'selected' : ''}}>
                        Bestseller
                    </option>
                    <option value="low_to_high" {{$sorting == 'low_to_high' ? 'selected' : ''}}>
                        Price: Low to High
                    </option>
                    <option value="high_to_low" {{$sorting == 'high_to_low' ? 'selected' : ''}}>
                        Price: High to Low
                    </option>
                </select>
                <input type="hidden" class="invisible" name="price_1" value="{{$f_price_1}}">
                <input type="hidden" class="invisible" name="price_2" value="{{$f_price_2}}">
            </form>
        </div>
        {{--        MAIN--}}
        <div class="d-flex">
            {{--FILTER--}}
            <div class="w-20 pe-3">
                <hr class="mt-0">
                <form action="" method="get">
                    {{--                    PRICE--}}
                    <div class="w-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center h-pointer"
                                 data-bs-toggle="collapse" data-bs-target="#price"
                                 aria-controls="price">
                                <div class="">Price</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="price">
                                {{--                                <div>--}}
                                {{--                                    <div class="form-check">--}}
                                {{--                                        <input class="form-check-input h-pointer" type="checkbox" name="price[]"--}}
                                {{--                                               id="price_1"--}}
                                {{--                                               value="1"--}}
                                {{--                                            {{in_array(1, $f_price) ? 'checked' : ''}}>--}}
                                {{--                                        <label class="form-check-label h-pointer" for="price_1">--}}
                                {{--                                            $0 - $50--}}
                                {{--                                        </label>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-check">--}}
                                {{--                                        <input class="form-check-input h-pointer" type="checkbox" name="price[]"--}}
                                {{--                                               id="price_2"--}}
                                {{--                                               value="2"--}}
                                {{--                                            {{in_array(2, $f_price) ? 'checked' : ''}}>--}}
                                {{--                                        <label class="form-check-label h-pointer" for="price_2">--}}
                                {{--                                            $50 - $100--}}
                                {{--                                        </label>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-check">--}}
                                {{--                                        <input class="form-check-input h-pointer" type="checkbox" name="price[]"--}}
                                {{--                                               id="price_3"--}}
                                {{--                                               value="3" {{in_array(3, $f_price) ? 'checked' : ''}}>--}}
                                {{--                                        <label class="form-check-label h-pointer" for="price_3">--}}
                                {{--                                            $100 - $200--}}
                                {{--                                        </label>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-check">--}}
                                {{--                                        <input class="form-check-input h-pointer" type="checkbox" name="price[]"--}}
                                {{--                                               id="price_4"--}}
                                {{--                                               value="4" {{in_array(4, $f_price) ? 'checked' : ''}}>--}}
                                {{--                                        <label class="form-check-label h-pointer" for="price_4">--}}
                                {{--                                            > $200--}}
                                {{--                                        </label>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <input type="number" class="form-control w-45" name="price_1" id="price_1"
                                           step="0.01" value="{{$f_price_1 != 0 ? $f_price_1 : ''}}" min="0"
                                           placeholder="Start price">
                                    <input type="number" class="form-control w-45" name="price_2" id="price_2"
                                           step="0.01" value="{{$f_price_2 != 9999 ? $f_price_2 : ''}}" min="0"
                                           placeholder="End price">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    {{--BRAND--}}
                    <div class="w-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center h-pointer"
                                 data-bs-toggle="collapse" data-bs-target="#brand"
                                 aria-controls="brand">
                                <div class="">Brand</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="brand">
                                <div>
                                    @foreach($brands as $brand)
                                        <div class="form-check">
                                            <input class="form-check-input h-pointer" type="checkbox" name="brand[]"
                                                   id="brand_{{$brand->id}}"
                                                   value="{{$brand->id}}"
                                                {{in_array($brand->id, $f_brand) ? 'checked' : ''}}
                                            >
                                            <label class="form-check-label h-pointer" for="brand_{{$brand->id}}">
                                                {{$brand->brand_name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    {{--CATEGORY--}}
                    <div class="w-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center h-pointer"
                                 data-bs-toggle="collapse" data-bs-target="#category"
                                 aria-controls="category">
                                <div class="">Category</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="category">
                                <div>
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input h-pointer" type="checkbox" name="category[]"
                                                   id="category_{{$category->id}}"
                                                   value="{{$category->id}}"
                                                {{in_array($category->id, $f_category) ? 'checked' : ''}}
                                            >
                                            <label class="form-check-label h-pointer" for="category_{{$category->id}}">
                                                {{$category->category_name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    {{--SIZE--}}
                    <div class="w-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center h-pointer"
                                 data-bs-toggle="collapse" data-bs-target="#size"
                                 aria-controls="size">
                                <div class="">Sizes</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="size">
                                <div>
                                    @foreach($sizes as $size)
                                        <div class="form-check">
                                            <input class="form-check-input h-pointer" type="checkbox" name="size[]"
                                                   id="size_{{$size->id}}"
                                                   value="{{$size->id}}"
                                                {{in_array($size->id, $f_size) ? 'checked' : ''}}
                                            >
                                            <label class="form-check-label h-pointer" for="size_{{$size->id}}">
                                                {{$size->size_name}}ml
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    {{--SEASON--}}
                    <div class="w-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center h-pointer"
                                 data-bs-toggle="collapse" data-bs-target="#season"
                                 aria-controls="season">
                                <div class="">Season</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="season">
                                <div>
                                    @foreach($seasons as $season)
                                        <div class="form-check">
                                            <input class="form-check-input h-pointer" type="checkbox" name="season[]"
                                                   id="season_{{$season->id}}"
                                                   value="{{$season->id}}"
                                                {{in_array($season->id, $f_season) ? 'checked' : ''}}
                                            >
                                            <label class="form-check-label h-pointer" for="season_{{$season->id}}">
                                                {{$season->season_name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <a href="{{route('product')}}" class="btn btn-dark rounded-5 w-45">Reset</a>
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
