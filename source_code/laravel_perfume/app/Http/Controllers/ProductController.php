<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Season;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    //show all products
    public function index(Request $request)
    {
        //search
        $search = "";
        if (isset($request->search)) {
            $search = $request->search;
        }
        //filter
        $price_1 = 0;
        $price_2 = 9999;
        if ($request->price_1 != null) {
            $price_1 = $request->price_1;
        }
        if ($request->price_2 != null) {
            $price_2 = $request->price_2;
        }
        if ($price_1 > $price_2) {
            $bigger = $price_1;
            $price_1 = $price_2;
            $price_2 = $bigger;
        }

        $brand = Brand::all('id')->toArray();
        if (isset($request->brand)) {
            $brand = $request->brand;
        }

        $category = Category::all('id')->toArray();
        if (isset($request->category)) {
            $category = $request->category;
        }

        $size = Size::all('id')->toArray();
        if (isset($request->size)) {
            $size = $request->size;
        }

        $season = Season::all('id')->toArray();
        if (isset($request->season)) {
            $season = $request->season;
        }

        //sorting
        $sorting = 'default';
        if (isset($request->sorting)) {
            $sorting = $request->sorting;
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
            ->whereBetween('price', [$price_1, $price_2])
            ->whereIn('brand_id', $brand)
            ->whereIn('category_id', $category)
            ->whereIn('size_id', $size)
            ->whereIn('season_id', $season)
            ->where('product_name', 'like', '%' . $search . '%')
            ->orderBy($orderBy, $orderDirection)
            ->paginate(6)
            ->withQueryString();
//        cach 3 khong join duoc
//        $products = Product::paginate(6);

        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $seasons = Season::all();

        return view('customers.products.index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
            'sizes' => $sizes,
            'seasons' => $seasons,
            'search' => $search,
            'sorting' => $sorting,
            'f_price_1' => $price_1,
            'f_price_2' => $price_2,
            'f_brand' => $brand,
            'f_category' => $category,
            'f_size' => $size,
            'f_season' => $season
        ]);
    }

    public function show(int $id)
    {
        $product = DB::table('products')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('sizes', 'products.size_id', 'sizes.id')
            ->join('seasons', 'products.season_id', 'seasons.id')
            ->select('products.*', 'brands.brand_name', 'categories.category_name', 'sizes.size_name', 'seasons.season_name')
            ->where('products.id', '=', $id)
            ->first();

        return view('customers.products.show', [
            'product' => $product
        ]);
    }
}
