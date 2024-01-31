<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function admin()
    {
        $customers = DB::table("customers")
            ->get();
        return view("admins.customer_manager.index", [
            "customers" => $customers
        ]);
    }
}
