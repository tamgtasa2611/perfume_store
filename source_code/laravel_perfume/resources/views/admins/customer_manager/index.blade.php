
@vite(["resources/sass/app.scss", "resources/js/app.js"])

<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 520px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->

        <div class="content-container">
            <div class="d-flex">
                <h1 class="content-heading me-sm-5">Customer list</h1>
                <nav style="width: 520px"></nav>
                <form class="search-form" action="" method="get">
                    <input type="text" name="search" value="" placeholder="Search here..."
                           class="rounded-2 my-sm-5 text-white" style="background-color: #28334E">
                    <button type="button" class="btn btn-light nice-box-shadow" style="background-color: #28334E">
                        <i class="text-white bi-search" style="text-decoration: none"></i>
                    </button>
                </form>

            </div>
            <table class="table table-striped table-dark table-hover table-borderless align-middle text-center nice-box-shadow">
                <thead class="text-white">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                @foreach ($customers as $customer)

                <tr style="background-color: #000000">
                    <td> {{$customer->id}} </td>
                    <td> {{$customer->first_name}} </td>
                    <td> {{$customer->last_name}} </td>
                    <td> {{$customer->email}} </td>
                    <td> {{$customer->phone_number}} </td>
                    <td> {{$customer->address}} </td>
                </tr>
                <!--          modal  delete        -->
{{--                <div id="delete-modal?cus=<?= $customer['id'] ?>" class="my-modal" style="z-index: 10">--}}
{{--                    <div class="modal__content">--}}
{{--                        <h2>Confirm delete</h2>--}}

{{--                        <p>--}}
{{--                            Do you really want to delete <span style="color: red"><?= $customer['first_name'] ?>--}}
{{--                                                                                      <?= $customer['last_name'] ?>--}}
{{--                                </span>?--}}
{{--                        </p>--}}

{{--                        <div class="modal__footer">--}}
{{--                            <div>--}}
{{--                                <a href="destroy.php?id=<?= $customer['id'] ?>" class="btn btn-danger"--}}
{{--                                   style="font-size: 16px;">--}}
{{--                                    Delete</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="modal__close">&times;</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!--                              end modal-->
                @endforeach
            </table>
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
</div>
</body>



