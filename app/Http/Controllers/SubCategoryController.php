<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', compact('categories', 'subcategories'));
    }

    public function store(SubCategoryRequest $request) {

        SubCategory::insert([
            'name' =>$request->name,
            'category_id' =>$request->category_id,
            'status' => $request->status == TRUE ? '1' :'0',
            'slug' => strtolower(str_replace(' ', '-',$request->name)),
        ]);
        
        Alert::success("Thành Công", "Thêm Danh Mục Nhỏ Thành Công");

        return redirect()->route('subcategory.index');
    }

    public function edit($subcategory){
        $subcategories = SubCategory::findOrFail($subcategory);
        $categories = Category::get();
        return view('admin.subcategory.edit', compact('subcategories', 'categories'));
    }

    public function update(SubCategoryRequest $request){
        $subcategory_id = $request->id;
        SubCategory::findOrFail($subcategory_id)->update([
            'name' =>$request->name,
            'category_id' =>$request->category_id,
            'status' => $request->status == TRUE ? '1' :'0',
            'slug' => strtolower(str_replace(' ', '-',$request->name)),
        ]);
        Alert::success("Thành Công", "Sửa Danh Mục Nhỏ Thành Công");

        return redirect()->route('subcategory.index');
    }

    public function destroy($subcategory){
        $subcategories = SubCategory::find($subcategory);
        $subcategories->delete();
        Alert::success("Thành Công", "Xoá Danh Mục Nhỏ Thành Công");
        return redirect()->route('subcategory.index');
    }

    

}
