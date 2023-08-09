<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status == TRUE ? '1' :'0';
        $category->slug = strtolower(str_replace(' ', '-',$request->name));
        $category->save();
        Alert::success("Thành Công", "Thêm Danh Mục Thành Công");
        
        return redirect()->route('category.index');
    }

    public function edit($category){
        $categories = Category::findOrFail($category);
        return view('admin.category.edit', compact('categories'));
    }

    public function update(CategoryEditRequest $request){
        $categories_id = $request->id;
        $categories = Category::findOrFail($categories_id);
        $categories->name = $request->name;
        $categories->status = $request->status == TRUE ? '1' :'0';
        $categories->slug = strtolower(str_replace(' ', '-',$request->name));
        $categories->update();
        
        Alert::success("Thành Công", "Sửa Danh Mục Thành Công");
        return redirect()->route('category.index');
    }
    public function destroy($category){
            $categories = Category::find($category);
            $categories->delete();
            Alert::success("Thành Công", "Xoá Danh Mục Thành Công");
            return redirect()->back();
    }
}
