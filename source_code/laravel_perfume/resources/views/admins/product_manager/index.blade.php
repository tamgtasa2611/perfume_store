@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Customers Manager</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 360px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->
        <div class="content-container mt-5 ">
            <div class="d-flex mx-auto mt-5">
                <h1 class="me-sm-5 text-white">Product list</h1>
                <nav style="width: 810px"></nav>

                <form class="d-flex search-form mb-0" action="{{route('admin.product')}}">
                    <div class="input-group input-group-sm">
                        <form action="/">
                            <input class="form-control" name="search" type="text" placeholder="Type to search...">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>
                </form>
            </div>
            <section>
                <div class="h-100">
                    <div class="d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 row-gap-xxl-5">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-borderless table-dark text-white mb-0 text-center table-striped align-middle">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">PRODUCT NAME</th>
                                                        <th scope="col">QUANTITY</th>
                                                        <th scope="col">PRICE</th>
                                                        <th scope="col">DESCRIPTION</th>
                                                        <th scope="col">IMAGE</th>
                                                        <th scope="col">SIZE</th>
                                                        <th scope="col">CATEGORY</th>
                                                        <th scope="col">SEASON</th>
                                                        <th scope="col">GENDER</th>
                                                        <th scope="col">BRAND</th>
                                                        <th scope="col">ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($products->count() > 0)
                                                        @foreach ($products as $product)
                                                            <tr style="background-color: #000000">
                                                                <td> {{$product->id}} </td>
                                                                <td> {{$product->product_name}} </td>
                                                                <td> {{$product->quantity}} </td>
                                                                <td> {{$product->price}} </td>
                                                                <td> {{$product->description}} </td>
                                                                <td>
                                                                    <img src="{{ asset($product->image) }}" width="90px" height="90px">
                                                                </td>
                                                                <td> {{$product->size->size_name}}</td>
                                                                <td> {{$product->category->category_name}}</td>
                                                                <td> {{$product->season->season_name}}</td>
                                                                <td> {{$product->gender->gender_name}}</td>
                                                                <td> {{$product->brand->brand_name}}</td>

                                                                <td class="d-flex justify-content-center align-middle popover-body pt-5">
                                                                    <div>
                                                                        <button type="button" class="btn btn-primary">
                                                                            <a href="{{route('product.edit', $product) }}"
                                                                               class="text-white nav-link bi-pencil"
                                                                               style="text-decoration: none">Edit</a>
                                                                        </button>
                                                                    </div>

                                                                    <form method="post"
                                                                          action="{{ route('product.destroy', $product) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button
                                                                            class="text-white btn bg-danger border-danger-subtle bi bi-trash">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            <!--                              end modal-->
                                                        @endforeach
                                                    @else
                                                    </tbody>
                                                </table>
                                                <p class="text-white text-center fs-3 mt-5 ">
                                                    No Products found!
                                                </p>
                                                @endif
                                                <div style="display: flex" class="justify-content-between">
                                                    <button type="button"
                                                            class="btn btn-primary nice-box-shadow h-75 mt-3">
                                                        <a href="{{route('product.create')}}" class="text-white"
                                                           style="text-decoration: none">Add a product</a>
                                                    </button>
                                                    <div class="pt-3">
                                                        {{$products->onEachSide(3)->links()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <!--  js close button modal  -->
    <script>
        let clickClose = document.getElementById('click-close');
        let closeTarget = document.getElementById('close-target')

        function closeMes() {
            closeTarget.classList.add("d-none");
        }
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
</div>
</body>

<x-flash-message/>


