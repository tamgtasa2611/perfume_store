@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Edit Category</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 620px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->
        <div class="justify-content-center mt-5" style="width: 520px">
            <h4 class="fs-1 text-white text-center">Edit order #{{$order->id}}</h4>
            <form method="post" action="{{ route('order.update', $order) }}" enctype="multipart/form-data">
                <div class="card-body bg-white rounded-4 p-5 shadow-lg m-5">
                    <h2 class="card-title font-monospace">Edit Form</h2>
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-between w-100 pl-5">
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="col-form-label text-dark font-monospace">Order Status</label>
                                    <select class="dropdown" type="select" name="order_status">
                                        @if($order->order_status == 0)
                                            <option> Pending</option>
                                        @elseif($order->order_status == 1)
                                            <option> Delivery </option>
                                        @elseif($order->order_status == 2)
                                            <option> Completed</option>
                                        @elseif($order->order_status == 3)
                                            <option> Canceled</option>
                                        @endif

                                            <option value="1"> Delivery</option>
                                            <option value="2"> Completed</option>
                                        <option value="3"> Canceled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-between w-100 mt-4">
                        <div class="col-4">
                            <div class="d-flex">
                                <a class="btn btn-primary nice-box-shadow font-monospace"
                                   href="{{route('order.index')}}">Back</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mr-5">
                                <button class="btn btn-primary nice-box-shadow font-monospace">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

