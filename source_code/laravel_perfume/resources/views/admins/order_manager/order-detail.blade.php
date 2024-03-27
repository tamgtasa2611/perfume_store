@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Order Manager</title>
<body style="background-color: #f2f7fe">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 360px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->
        <div class="content-container mt-3 w-100">
            <div class="d-flex justify-content-between container">
                <div class="fs-1">
                    Order Details #{{$order->id}}
                </div>
                <div class="d-flex align-items-center">
                    Status:
                    <select>
                        <option value="{{$order->order_status}}">
                            @foreach($order->order_status)

                            @endforeach
                                @case(0)
                                    <div class="text-danger">
                                        Pending
                                    </div>
                                    @break
                                @case(1)
                                    <div class="text-success">
                                        Confirmed
                                    </div>
                                    @break
                                @case(2)
                                    <div class="text-primary">
                                        Delivering
                                    </div>
                                    @break
                                @case(3)
                                    <div class="text-success">
                                        Complete
                                    </div>
                                    @break
                                @case(4)
                                    <div class="text-danger">
                                        Cancelled
                                    </div>
                                    @break
                            @endswitch
                        </option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="d-flex container w-75">
                <div class="w-100 me-5">
                    <div class="bg-white mt-5 rounded-5 w-100 p-3" style="height: 300px">
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Customer</p>
                            <p class="fs-3">{{$order->customer->first_name}} {{$order->customer->last_name}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Date</p>
                            <p class="fs-3">{{($order->order_date)}} </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Receiver name</p>
                            <p class="fs-3">{{$order->receiver_name}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Receiver phone</p>
                            <p class="fs-3">{{$order->receiver_phone}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Receiver address</p>
                            <p class="fs-3">{{$order->receiver_address}}</p>
                        </div>
                    </div>
                    <div class="bg-white mt-5 rounded-5 w-100 p-3" style="height: 300px">
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Total items</p>
                            <p class="fs-3">{{$order_item}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Amount</p>
                            <p class="fs-3">${{$order_amount}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Shipping</p>
                            <p class="fs-3">$10.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Total price</p>
                            <p class="fs-3">${{$order_total}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fs-3 fw-bold">Payment method</p>
                            <p class="fs-3">Pay on delivery</p>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-5">
                        <a href="{{route('order.index')}}" class="nav-link link-light">BACK</a>
                    </button>
                </div>
                <div class="w-50 border bg-white mt-5 rounded p-3 overflow-y-auto" style="height: 314px">
                    @foreach($order_details as $detail)
                        <div class="d-flex mb-3">
                            <div class="border rounded p-3 object-fit-fill
                             overflow-hidden w-25 me-3">
                                <img src="{{asset($detail->image)}}" width="80px" height="80px">
                            </div>
                            <div class="flex-fill d-flex flex-column justify-content-between">
                                <div>
                                    {{$detail->product_name}}
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        ${{$detail->sold_price}}
                                    </div>
                                    <div>
                                        x {{$detail->sold_quantity}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            window.addEventListener('hide:delete-modal', function () {
                $('#deleteModal').modal('hide');
            });
        </script>
    @endpush
    <script src="//unpkg.com/alpinejs" defer></script>

</div>
</body>
<x-flash-message/>


