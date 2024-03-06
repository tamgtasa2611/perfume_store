<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Requests\SizeFormRequest;
use Illuminate\Support\Facades\Redirect;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::paginate(6);
        return view('admins.size_manager.index', [
            "sizes" => $sizes
        ]);
    }
    public function create()
    {
        return view('admins.size_manager.create');
    }

    public function store(SizeFormRequest $request)
    {
        Size::create($request->all());
        return Redirect::route('size.index')->with('success', 'Add a size successfully!');

    }

    public function edit(Size $size)
    {
        return view('admins.size_manager.edit', [
            "size" => $size
        ]);
    }

    public function update(SizeFormRequest $request, Size $size)
    {
        //Lấy dữ liệu trong form và update lên db
        $size->update($request->all());
        return Redirect::route('size.index')->with('success', 'Edit a size successfully!');
    }

//    public $delete_id;
//
//    public function deleteEmp()
//    {
//        $size = Size::where('id', $this->delete_id)->first();
//        $size->delete();
//        $this->dispatchBrowserEvent('hide:delete-modal');
//        return Redirect::route('size.index')->with('success', 'Delete a size successfully!');
//    }

    public function destroy(Size $size)
    {
        //Xóa bản ghi được chọn
        $size->delete();
        //Quay về danh sách
        return Redirect::route('size.index')->with('success', 'Delete a size successfully!');
    }
}
