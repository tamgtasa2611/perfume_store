@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Brands Manager</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 520px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts.navbar_adminMenu')
        </div>

        <!--  content  -->

        <div class="content-container mt-5 ">
            <div class="d-flex mx-auto mt-5">
                <h1 class="me-sm-5 text-white">Order list</h1>
                <nav style="width: 520px"></nav>

                <form class="d-flex search-form mb-0" action="{{route('order.index')}}">
                    <div class="input-group input-group-sm">
                        <input class="form-control" name="search" type="text" placeholder="Type to search...">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
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
                                                        <th scope="col">CUSTOMER</th>
                                                        <th scope="col">DATE bUY</th>
                                                        <th scope="col">STATUS</th>
                                                        <th scope="col">ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($orders->count() > 0)
                                                        @foreach ($orders as $order)
                                                            <tr style="background-color: #000000">
                                                                <td> {{$order->id}} </td>
                                                                <td> {{$order->customer->first_name}} {{$order->customer->last_name}}</td>
                                                                <td> {{$order->order_date}} </td>
                                                                <td>
                                                                    @if($order->order_status == 0)
                                                                        <button class="btn btn-warning">Pending</button>
                                                                    @elseif($order->order_status == 1)
                                                                        <button class="btn btn-primary">Delivery</button>
                                                                            @elseif($order->order_status == 2)
                                                                        <button class="btn btn-success">Completed</button>
                                                                            @elseif($order->order_status == 3)
                                                                        <button class="btn btn-danger">Canceled</button>
                                                                    @endif
                                                                </td>
                                                                <td class="d-flex justify-content-center pt-2">
                                                                    <div>
                                                                        <button type="button" class="btn btn-primary">
                                                                            <a href="{{route('order.edit', $order) }}"
                                                                               class="text-white nav-link bi-pencil"
                                                                               style="text-decoration: none">Edit</a>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                    </tbody>
                                                </table>
                                                <p class="text-white text-center fs-3 mt-5 ">
                                                    No Categories found!
                                                </p>
                                                @endif
                                                <div style="display: flex" class="justify-content-between">
                                                    <div class="pt-3">
                                                        {{$orders->onEachSide(3)->links()}}
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
    </div>
    <!--  js close button modal  -->
    <script src="//unpkg.com/alpinejs" defer></script>
</div>

</body>

<x-flash-message/>


