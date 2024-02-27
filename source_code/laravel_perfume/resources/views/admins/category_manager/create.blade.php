@vite(["resources/sass/app.scss", "resources/js/app.js"])
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 620px"></div>
        <div class="position-fixed" style="height: 100%">

            @include("layouts/navbar_adminMenu");

        </div>

        <!--  content  -->
        <div class="justify-content-center mt-5" style="width: 520px">
            <h4 class="fs-1 text-white text-center">Add a new customer</h4>
            <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                <div class="card-body bg-white rounded-4 p-5 shadow-lg m-5">
                    <h2 class="card-title font-monospace">Form</h2>
                    <form>
                    @csrf
                        <div class="row justify-content-between w-100 pl-5">
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Category Name</label>
                                    <input class="rounded-3 input--style-4 px-3" type="text" name="category_name">
                                    @if($errors->has('category_name'))
                                        {{ $errors->first('category_name') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between w-75">
                            <div class="">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Description</label>
                                    <textarea class="rounded-3 input--style-4 px-3" rows="4" type="text" name="description"></textarea>
                                </div>
                           </div>
                        </div>
                    </form>
                    <div class="row justify-content-between w-100 mt-4">
                        <div class="col-4">
                            <div class="d-flex">
                                <a class="btn btn-primary nice-box-shadow font-monospace" href="{{route('category.index')}}">Back</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mr-5">
                                <button class="btn btn-primary nice-box-shadow font-monospace">ADD</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

