<title>Products</title>
@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    {{--    HEADING--}}
    <div class="d-flex justify-content-between mb-3">
        <div class="w-100 text-capitalize text-center bg-black fs-3 fw-bold text-white py-4">
            {{$search != "" ? 'Search results for "' . $search . '"' : 'All Perfumes'}}
        </div>
    </div>
    <div class="container-fluid fs-6">
        {{--                SORTING--}}
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                Filter
            </div>
            <form action="" class="d-flex" style="width: 250px">
                {{--                select--}}
                <label for="sorting" class="w-50 d-flex align-items-center justify-content-center px-1">
                    Sort by
                </label>
                <select class="form-select bg-white rounded-5" aria-label="sorting" id="sorting" name="sorting"
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
                {{--                lay giay tri search--}}
                <input type="hidden" class="invisible" name="search" value="{{$search}}">
                {{--                lay gia tri filter      --}}
                <input type="hidden" class="invisible" name="price_1" value="{{$f_price_1}}">
                <input type="hidden" class="invisible" name="price_2" value="{{$f_price_2}}">
                @foreach($f_brand as $brand_value)
                    <input type="hidden" class="invisible" name="brand[]"
                           value="{{is_array($brand_value) ? implode($brand_value) : $brand_value}}">
                @endforeach
                @foreach($f_gender as $gender_value)
                    <input type="hidden" class="invisible" name="gender[]"
                           value="{{is_array($gender_value) ? implode($gender_value) : $gender_value}}">
                @endforeach
                @foreach($f_category as $category_value)
                    <input type="hidden" class="invisible" name="category[]"
                           value="{{is_array($category_value) ? implode($category_value) : $category_value}}">
                @endforeach
                @foreach($f_size as $size_value)
                    <input type="hidden" class="invisible" name="size[]"
                           value="{{is_array($size_value) ? implode($size_value) : $size_value}}">
                @endforeach
                @foreach($f_season as $season_value)
                    <input type="hidden" class="invisible" name="season[]"
                           value="{{is_array($season_value) ? implode($season_value) : $season_value}}">
                @endforeach
            </form>
        </div>
        {{--        MAIN--}}
        <div class="d-flex">
            {{--FILTER--}}
            <div class="w-20 pe-3">
                <hr class="mt-0">
                <form action="" method="get">
                    {{--                    lay gia tri search--}}
                    <input type="hidden" class="invisible" name="search" value="{{$search}}">
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
                    {{--GENDER--}}
                    <div class="w-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center h-pointer"
                                 data-bs-toggle="collapse" data-bs-target="#gender"
                                 aria-controls="gender">
                                <div class="">Gender</div>
                                <div>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="collapse collapsing expand" id="gender">
                                <div>
                                    @foreach($genders as $gender)
                                        <div class="form-check">
                                            <input class="form-check-input h-pointer" type="checkbox" name="gender[]"
                                                   id="gender_{{$gender->id}}"
                                                   value="{{$gender->id}}"
                                                {{in_array($gender->id, $f_gender) ? 'checked' : ''}}
                                            >
                                            <label class="form-check-label h-pointer" for="gender_{{$gender->id}}">
                                                {{$gender->gender_name}}
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
                                                {{$size->size_name}}
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
                        @if(count($products) != 0)
                            @foreach($products as $product)
                                <div class="col border bg-white">
                                    <div
                                        class="position-relative overflow-hidden d-flex justify-content-center">
                                        <a href="/product/{{$product->id}}">
                                            <img
                                                src="{{$product->image}}"
                                                height="200px"
                                                class="p-1 mt-5"
                                                alt="product_image">
                                        </a>
                                        <div
                                            class="w-100 mt-3 position-absolute d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-calendar p-1"></i>
                                                <span class="p-1">
                                                {{$product->season->season_name}}
                                            </span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                @switch($product->gender->gender_name)
                                                    @case("Male")
                                                        <i class="bi bi-gender-male p-1"></i>
                                                        @break
                                                    @case("Female")
                                                        <i class="bi bi-gender-female p-1"></i>
                                                        @break
                                                    @case("Unisex")
                                                        <i class="bi bi-gender-neuter p-1"></i>
                                                        @break
                                                @endswitch
                                                <span class="p-1">
                                                {{$product->gender->gender_name}}
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 text-capitalize">
                                        {{$product->product_name}}
                                    </div>
                                    <div class="mt-5 mb-3 d-flex justify-content-between align-items-center">
                                        <div class="text-start text-success">${{$product->price}}</div>
                                        <div class="d-flex justify-content-end">
                                            <a href="/product/{{$product->id}}"
                                               class="btn btn-light border rounded-5">
                                                <span class="px-2">View details</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="d-flex vh-100 w-100 align-items-start justify-content-center fs-5">
                                No result
                            </div>
                        @endif
                    </div>
                </div>
                {{--                    pagination--}}
                <div class="mt-5">
                    {{$products->onEachSide(2)->links()}}
                </div>
            </div>
            {{--END PRODUCT--}}
        </div>
    </div>
    @include('layouts/footer')
</x-layout>
<script src="{{asset('frontend/js/product.js')}}"></script>
