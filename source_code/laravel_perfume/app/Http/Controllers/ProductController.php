<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //show all products
    public function index()
    {
//        cach 1 loi
//        $products = Product::all()->filter(request('search'))->paginate(3);
//        cach 2 ko phai mvc
//        $products = DB::table('products')->paginate(3);
        $products = Product::paginate(6);

        return view('customers.products.index', [
            'products' => $products
        ]);
    }
}
