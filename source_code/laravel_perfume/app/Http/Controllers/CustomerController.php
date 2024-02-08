<?php

namespace App\Http\Controllers;

use App\Requests\StoreCustomerRequest;
use App\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;


class CustomerController extends Controller
{
    public function show()
    {
//        $customers = DB::table("customers")
//            ->get();
        $customers = Customer::paginate(6);
        return view("admins.customer_manager.index", [
            "customers" => $customers
        ]);
    }
    public function create()
    {
        return view('admins.customer_manager.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        if($request->validated()){
            $array = [];
            $array = Arr::add($array, 'first_name', $request->first_name);
            $array = Arr::add($array, 'last_name', $request->last_name);
            $array = Arr::add($array, 'email', $request->email);
            $array = Arr::add($array, 'password', $request->password);
            $array = Arr::add($array, 'phone_number', $request->phone_number);
            $array = Arr::add($array, 'address', $request->address);
            //Lấy dữ liệu từ form và lưu lên db
            Customer::create($array);

            return Redirect::route('admin/customer')->with('success', 'Add a customer successfully!');
        }
    }

    public function edit(Customer $customer)
    {
        return view('admins.customer_manager.edit', [
            "customer" => $customer
        ]);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'first_name', $request->first_name);
        $array = Arr::add($array, 'last_name', $request->last_name);
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'password', $request->password);
        $array = Arr::add($array, 'phone_number', $request->phone_number);
        $array = Arr::add($array, 'address', $request->address);
        $array = Arr::add($array, 'status', $request->status);
        $customer->update($array);
        //Quay về danh sách
        return Redirect::route('admin/customer')->with('success', 'Edit a customer successfully!');
    }

    public function destroy(Customer $customer)
    {
        //Xóa bản ghi được chọn
        $customer->delete();
        //Quay về danh sách
        return Redirect::route('admin/customer')->with('success', 'Delete a customer successfully!');
    }
}
