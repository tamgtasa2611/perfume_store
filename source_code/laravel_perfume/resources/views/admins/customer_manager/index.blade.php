@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Customers Manager</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 520px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->

        <div class="content-container mt-5 ">
            <div class="d-flex mx-auto mt-5">
                <h1 class="me-sm-5 text-white">Customer list</h1>
                <nav style="width: 520px"></nav>

                <form class="d-flex search-form mb-0" action="{{route('admin/customer')}}">
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
                                                    class="fs-6 table table-borderless table-dark text-white mb-0 text-center table-striped align-middle">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">FIRST NAME</th>
                                                        <th scope="col">LAST NAME</th>
                                                        <th scope="col">EMAIL</th>
                                                        <th scope="col">pwd (đã hash từ (123456))</th>
                                                        <th scope="col">PHONE</th>
                                                        <th scope="col">ADDRESS</th>
                                                        <th scope="col">STATUS</th>
                                                        <th scope="col">ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($customers as $customer)
                                                        <tr style="background-color: #000000">
                                                            <td> {{$customer->id}} </td>
                                                            <td> {{$customer->first_name}} </td>
                                                            <td> {{$customer->last_name}} </td>
                                                            <td> {{$customer->email}} </td>
                                                            <td> {{$customer->password}} </td>
                                                            <td> {{$customer->phone_number}} </td>
                                                            <td> {{$customer->address}} </td>
                                                            <td>
                                                                @switch($customer->status)
                                                                    @case(1)
                                                                        <button class="btn btn-success"><a
                                                                                href="status.php?id='.$customer['id'].'&status=1"
                                                                                class="link-light nav-link">Active</a>
                                                                        </button>
                                                                        @break
                                                                    @case(2)
                                                                        <button class="btn btn-warning"><a
                                                                                href="status.php?id='.$customer['id'].'&status=2"
                                                                                class="link-light nav-link">Locked</a>
                                                                        </button>
                                                                        @break
                                                                    @case(3)
                                                                        <button class="btn btn-danger"><a
                                                                                href="status.php?id='.$customer['id'].'&status=3"
                                                                                class="link-light nav-link">Banned</a>
                                                                        </button>
                                                                        @break
                                                                @endswitch

                                                            </td>
                                                            <td class="d-flex justify-content-center pt-4">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary">
                                                                        <a href="{{route('customer/edit', $customer) }}"
                                                                           class="text-white nav-link bi-pencil"
                                                                           style="text-decoration: none">Edit</a>
                                                                    </button>
                                                                </div>

                                                                <form method="post"
                                                                      action="{{ route('customer/destroy', $customer) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        class="text-white btn bg-danger border-danger-subtle">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>


                                                        <!--                              end modal-->
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <div style="display: flex" class="justify-content-between">
                                                    <button type="button"
                                                            class="btn btn-primary nice-box-shadow h-75 mt-3">
                                                        <a href="{{route('customer/create')}}" class="text-white"
                                                           style="text-decoration: none">Add a customer</a>
                                                    </button>
                                                    <div class="pt-3">
                                                        {{$customers->onEachSide(3)->links()}}
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


