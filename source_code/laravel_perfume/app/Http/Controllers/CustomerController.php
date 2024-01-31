<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
//        $customers = DB::table("customers")
//            ->get();
        $customers = Customer::paginate(6);
        return view("admins.customer_manager.index", [
            "customers" => $customers
        ]);
    }
}
