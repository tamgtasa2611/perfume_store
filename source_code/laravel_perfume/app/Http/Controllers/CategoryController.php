<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(6);
        return view('admins.category_manager.index', [
            "categories" => $categories
        ]);
    }
    public function create()
    {
        return view('admins.category_manager.create');
    }

    public function store(CategoryFormRequest $request)
    {

        Category::create($request->all());
            return Redirect::route('category.index')->with('success', 'Add a category successfully!');

    }

    public function edit(Category $category)
    {
        return view('admins.category_manager.edit', [
            "category" => $category
        ]);
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        //Lấy dữ liệu trong form và update lên db
            $category->update($request->all());
        return Redirect::route('category.index')->with('success', 'Edit a category successfully!');
    }

    public function destroy(Category $category)
    {
        //Xóa bản ghi được chọn
        $category->delete();
        //Quay về danh sách
        return Redirect::route('category.index')->with('success', 'Delete a category successfully!');
    }
}
