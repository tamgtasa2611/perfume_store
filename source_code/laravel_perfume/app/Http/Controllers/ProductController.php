<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    //show all products
    public function index()
    {
        //filter
        $sorting = 'default';
        if (isset($_GET['sorting'])) {
            $sorting = $_GET['sorting'];
        }

        $price = 0;
        if (isset($_GET['price'])) {
            $price = $_GET['price'];
        }

        $orderBy = "id";
        $orderDirection = "asc";
        switch ($sorting) {
            case 'newest':
                $orderDirection = "desc";
                break;
            case 'bestseller':
                //bestseller de lai khi nao lam xong order tinh sau
                break;
            case 'low_to_high':
                $orderBy = "price";
                break;
            case 'high_to_low':
                $orderBy = "price";
                $orderDirection = "desc";
                break;
        }

//        cach 1 loi filter
//        $products = Product::all()->filter(request('search'))->paginate(3);
        $products = DB::table('products')
            ->join('sizes', 'products.size_id', 'sizes.id')
            ->join('seasons', 'products.season_id', 'seasons.id')
            ->select('products.*', 'sizes.size_name', 'seasons.season_name')
            ->orderBy($orderBy, $orderDirection)
            ->paginate(6);
//        cach 3 khong join duoc
//        $products = Product::paginate(6);

        return view('customers.products.index', [
            'products' => $products,
            'sorting' => $sorting,
            'price' => $price
        ]);
    }
}
