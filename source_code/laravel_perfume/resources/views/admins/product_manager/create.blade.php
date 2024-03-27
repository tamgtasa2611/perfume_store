@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Create</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 550px"></div>
        <div class="position-fixed" style="height: 100%">

            @include("layouts/navbar_adminMenu");

        </div>

        <!--  content  -->
        <div class="justify-content-center mt-5" style="width: 720px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>Add Product
                                <a href="{{route('admin.product')}}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                                aria-controls="home-tab-pane" aria-selected="true">
                                            Home
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="detail-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail-tab-pane" type="button" role="tab"
                                                aria-controls="detail-tab-pane" aria-selected="false">
                                            Details
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Quantity</label>
                                            <input type="text" name="quantity" class="form-control" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Price</label>
                                            <input type="text" name="price" class="form-control" required>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Description</label>
                                            <textarea type="text" name="description" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Brand</label>
                                            <select name="brand_id" class="form-control">
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Category</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Size</label>
                                            <select name="size_id" class="form-control">
                                                @foreach($sizes as $size)
                                                    <option value="{{$size->id}}">{{$size->size_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Season</label>
                                            <select name="season_id" class="form-control">
                                                @foreach($seasons as $season)
                                                    <option value="{{$season->id}}">{{$season->season_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Gender</label>
                                            <select name="gender_id" class="form-control">
                                                @foreach($genders as $gender)
                                                    <option value="{{$gender->id}}">{{$gender->gender_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label class="fs-4">Upload Product Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

