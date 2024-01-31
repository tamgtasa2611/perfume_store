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
        $sorting = 1;
        if (isset($_GET['sorting'])) {
            $sorting = $_GET['sorting'];
        }
        $currentPage = 1;
        if (isset($_GET['page'])) {
            $currentPage = $_GET['page'];
        }
        $orderBy = "id";
        $orderDirection = "asc";
        switch ($sorting) {
            case 2:
                $orderDirection = "desc";
                break;
            case 3:
                //bestseller de lai khi nao lam xong order tinh sau
                break;
            case 4:
                $orderBy = "price";
                break;
            case 5:
                $orderBy = "price";
                $orderDirection = "desc";
                break;
        }

//        cach 1 loi filter
//        $products = Product::all()->filter(request('search'))->paginate(3);
        $products = DB::table('products')
            ->join('sizes', 'products.size_id', 'sizes.id')
            ->select('products.*', 'sizes.size_name')
            ->orderBy($orderBy, $orderDirection)
            ->paginate(6);
//        cach 3 khong join duoc
//        $products = Product::paginate(6);

        return view('customers.products.index', [
            'products' => $products,
            'currentPage' => $currentPage,
            'sorting' => $sorting
        ]);
    }
}
