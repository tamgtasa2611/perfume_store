<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table("products")
            ->get();
        return view("customers.products.index", [
            "products" => $products
        ]);
    }
}
