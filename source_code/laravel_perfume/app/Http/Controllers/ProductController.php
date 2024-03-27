<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Category;
use App\Models\Season;
use App\Models\Size;
use App\Requests\StoreCustomerRequest;
use App\Requests\StoreProductRequest;
use App\Requests\UpdateCustomerRequest;
use App\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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

        $gender = Gender::all('id')->toArray();
        if (isset($request->gender)) {
            $gender = $request->gender;
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
//        cach 2
//        $products = DB::table('products')
//            ->join('products_sizes', 'products.id', 'products_sizes.product_id')
//            ->join('sizes', 'products_sizes.size_id', 'sizes.id')
//            ->join('seasons', 'products.season_id', 'seasons.id')
//            ->select('products.*', 'sizes.size_name', 'seasons.season_name')
//            ->whereBetween('price', [$price_1, $price_2])
//            ->whereIn('brand_id', $brand)
//            ->whereIn('category_id', $category)
//            ->whereIn('size_id', $size)
//            ->whereIn('season_id', $season)
//            ->where('product_name', 'like', '%' . $search . '%')
//            ->orderBy($orderBy, $orderDirection)
//            ->paginate(6)
//            ->withQueryString();

        $products = Product::with('season')
            ->with('gender')
            ->whereBetween('price', [$price_1, $price_2])
            ->whereIn('brand_id', $brand)
            ->whereIn('gender_id', $gender)
            ->whereIn('category_id', $category)
            ->whereIn('size_id', $size)
            ->whereIn('season_id', $season)
            ->where('product_name', 'like', '%' . $search . '%')
            ->orderBy($orderBy, $orderDirection)
            ->paginate(6)
            ->withQueryString();

        $brands = Brand::all();
        $genders = Gender::all();
        $categories = Category::all();
        $sizes = Size::all();
        $seasons = Season::all();

        return view('customers.products.index', [
            'products' => $products,
            'brands' => $brands,
            'genders' => $genders,
            'categories' => $categories,
            'sizes' => $sizes,
            'seasons' => $seasons,
            'search' => $search,
            'sorting' => $sorting,
            'f_price_1' => $price_1,
            'f_price_2' => $price_2,
            'f_brand' => $brand,
            'f_gender' => $gender,
            'f_category' => $category,
            'f_size' => $size,
            'f_season' => $season
        ]);
    }

    public function show(int $id)
    {
        $product = Product::with('brand')
            ->with('category')
            ->with('gender')
            ->with('size')
            ->with('season')
            ->where('id', $id)
            ->first();

        return view('customers.products.show', [
            'product' => $product
        ]);
    }
    public function show2()
    {
        $products = Product::with('brand')->paginate(4);
        return view("admins.product_manager.index", [
            "products" => $products
        ]);
    }

    public function showDetail(Product $product)
    {
        $brand = Brand::where('id', '=', $product->brand_id)->first();
        return view('admins.product_manager.product_details', [
            'product' => $product,
            'brand' => $brand,
        ]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $sizes = Size::all();
        $seasons = Season::all();
        $genders = Gender::all();
        return view('admins.product_manager.create', [
            'brands' => $brands,
            'categories' => $categories,
            'sizes' => $sizes,
            'seasons' => $seasons,
            'genders' => $genders
        ]);

    }

    public function store(StoreProductRequest $request)
    {
        if ($request->validated()) {
            $image = $request->file('image')->getClientOriginalName();
            if(!Storage::exists('images/products/'.$image)){
                Storage::putFileAs('images/products/', $request->file('image'), $image);
            }
            if ($request->has('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'images/products/';
                $file->move($path, $filename);

            }
            $array = [];
            $array = Arr::add($array, 'product_name', $request->product_name);
            $array = Arr::add($array, 'quantity', $request->quantity);
            $array = Arr::add($array, 'price', $request->price);
            $array = Arr::add($array, 'description', $request->description);
            $array = Arr::add($array, 'size_id', $request->size_id);
            $array = Arr::add($array, 'category_id', $request->category_id);
            $array = Arr::add($array, 'season_id', $request->season_id);
            $array = Arr::add($array, 'gender_id', $request->gender_id);
            $array = Arr::add($array, 'brand_id', $request->brand_id);
            $array = Arr::add($array, 'image', $image);
            //Lấy dữ liệu từ form và lưu lên db
            Product::create($array);
            return Redirect::route('admin.product')->with('success', 'Add a product successfully!');
        } else{
            return Redirect::back()-> with('unsuccessfully', 'Add a product unsuccessfully!');
        }
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $sizes = Size::all();
        $seasons = Season::all();
        $genders = Gender::all();
        return view('admins.product_manager.edit', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'sizes' => $sizes,
            'seasons' => $seasons,
            'genders' => $genders
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'size_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'season_id' => 'required|numeric',
            'gender_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'images/products/';
            $file->move($path, $filename);
            if (file_exists($product->image)) {
                unlink($product->image);
            }
        }

        $product->update([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path . $filename,
            'category_id' => $request->category_id,
            'size_id' => $request->size_id,
            'season_id' => $request->season_id,
            'gender_id' => $request->gender_id,
            'brand_id' => $request->brand_id,
        ]);
        //Quay về danh sách
        return Redirect::route('admin.product')->with('success', 'Edit a product successfully!');
    }

    public function destroy(Product $product)
    {
        //Xóa bản ghi được chọn
        $product->delete();
        //Quay về danh sách
        return Redirect::route('admin.product')->with('success', 'Delete a product successfully!');
    }

    public function cart()
    {
        return view('customers.carts.cart');
    }

    public function cartAjax()
    {
        return view('customers.products.index');
    }

    public function addToCart(int $id)
    {
        $product = Product::with('brand')
            ->with('category')
            ->with('gender')
            ->with('size')
            ->with('season')
            ->where('id', $id)
            ->first();

//        neu da co cart
        if (Session::exists('cart')) {
//            lay cart hien tai
            $cart = Session::get('cart');
//            neu san pham da co trong cart => +1 so luong
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
            } else {
//                them sp vao cart
                $cart = Arr::add($cart, $product->id, [
                    'image' => $product->image,
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'size' => [
                        'id' => $product->size->id,
                        'name' => $product->size->size_name
                    ]
                ]);
            }
        } else {
//            tao cart moi
            $cart = array();
            $cart = Arr::add($cart, $product->id, [
                'image' => $product->image,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
                'size' => [
                    'id' => $product->size->id,
                    'name' => $product->size->size_name
                ]
            ]);
        }
//        nem cart len session
        Session::put(['cart' => $cart]);

        return Redirect::route('product.cart');
    }

    public function addToCartAjax(int $id)
    {
        $product = Product::with('brand')
            ->with('category')
            ->with('gender')
            ->with('size')
            ->with('season')
            ->where('id', $id)
            ->first();
//        neu da co cart
        if (Session::exists('cart')) {
//            lay cart hien tai
            $cart = Session::get('cart');
//            neu san pham da co trong cart => +1 so luong
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
            } else {
//                them sp vao cart
                $cart = Arr::add($cart, $product->id, [
                    'image' => $product->image,
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'size' => [
                        'id' => $product->size->id,
                        'name' => $product->size->size_name
                    ]
                ]);
            }
        } else {
//            tao cart moi
            $cart = array();
            $cart = Arr::add($cart, $product->id, [
                'image' => $product->image,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
                'size' => [
                    'id' => $product->size->id,
                    'name' => $product->size->size_name
                ]
            ]);
        }
//        nem cart len session
        Session::put(['cart' => $cart]);

        return Redirect::route('product');
    }

    public function updateCartQuantity(int $id, Request $request)
    {
        //        lay cart hien tai
        $cart = Session::get('cart');
//        cap nhat so luong
        $cart[$id]['quantity'] = $request->buy_quantity;
        //        cap nhat cart moi
        Session::put(['cart' => $cart]);
        return Redirect::back();
    }

    public function deleteFromCart(Request $request)
    {
//        lay cart hien tai
        $cart = Session::get('cart');
//        xoa id cua product can xoa
        Arr::pull($cart, $request->id);
//        cap nhat cart moi
        Session::put(['cart' => $cart]);

        return Redirect::back();
    }

    public function deleteAllFromCart()
    {
//       xoa cart
        Session::forget('cart');

        return Redirect::back();
    }

    public function checkout()
    {

        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        return view('customers.carts.checkout', [
            'customer' => $customer
        ]);
    }
}
