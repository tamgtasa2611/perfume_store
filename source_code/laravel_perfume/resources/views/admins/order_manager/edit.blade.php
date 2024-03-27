@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Edit Category</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 540px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->
        <div class="justify-content-center mt-5">
            <h4 class="fs-1 text-white text-center">Edit order </h4>
            <form method="post" action="{{ route('order.update', $order->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body bg-white rounded-4 p-5 shadow-lg my-3">
                    <h2 class="card-title font-monospace">Edit Form</h2>

                    <div class="row justify-content-between w-100 pl-5">
                        <div class="col-md-12">
                            <div style="display: flex; justify-content: space-between">
                                <div class="col-md-7">
                                    <h4> Delivery address </h4>
                                    Receiver Name: {{ $order->receiver_name }}<br>
                                    Receiver Phone: {{ $order->receiver_phone}}<br>
                                    Receiver Address:{{ $order->receiver_address}}<br>
                                </div>
                                <div class="col-md-4">
                                    <form method="post" class="form-control" action="{{ route('order.update', $order) }}">
                                        <div class="d-flex justify-content-end">
                                            <select class="form-select" type="select" name="order_status">
                                                @if($order->order_status == 0)
                                                    <option> Pending</option>
                                                    <option value="1"> Delivery</option>
                                                    <option value="2"> Completed</option>
                                                    <option value="3"> Canceled</option>

                                                @elseif($order->order_status == 1)
                                                    <option> Delivery </option>
                                                    <option value="0"> Pending</option>
                                                    <option value="2"> Completed</option>
                                                    <option value="3"> Canceled</option>

                                                @elseif($order->order_status == 2)
                                                    <option> Completed</option>
                                                    <option value="0"> Pending</option>
                                                    <option value="1"> Delivery</option>
                                                    <option value="3"> Canceled</option>
                                                @elseif($order->order_status == 3)
                                                    <option> Canceled</option>
                                                    <option value="0"> Pending</option>
                                                    <option value="1"> Delivery</option>
                                                    <option value="2"> Completed</option>
                                                @endif
                                            </select>
                                            <button type="submit" class="btn btn-primary ">
                                                OK
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5> Product </h5><br>
                            <table class="table bg-white">
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($order_details as $order_detail)
                                    <tr style="margin-top: 20px;">
                                        <td width="280px">
                                            @if ($order_detail->product)
                                                <img style="height: 180px;" class="object-fit-cover p-3"
                                                     src="{{  $order_detail->product->image}}">
                                            @endif
                                        </td>
                                        <td>
                                            <h3>{{ $order_detail->product->product_name }}</h3>
                                                Amount: {{ $order_detail->sold_quantity }}<br>
                                                Price: ${{ $order_detail->sold_price }}
                                        </td>
                                        <td>
                                            <strong>Cost: $
                                                @php
                                                    // Tính tổng chi phí của mỗi sản phẩm trong giỏ hàng
                                                    $money = $order_detail->sold_price * $order_detail->sold_quantity;
                                                    echo $money;
                                                    $total += $money;
                                                @endphp
                                            </strong>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-md-12" style="display: flex; justify-content: space-between; color: firebrick">
                            <h3> Total </h3>
                            <h3> {{$total}} </h3>
                        </div>
                        <br>
                    </div>

                    <div class="row justify-content-between w-100 mt-4">
                        <div class="col-4">
                            <div class="d-flex">
                                <a class="btn btn-primary nice-box-shadow font-monospace"
                                   href="{{route('order.index')}}">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

