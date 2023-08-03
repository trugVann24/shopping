<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Product::all();
        $sub_categories = SubCategory::all();
        return view('admin.product.index', compact('sub_categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/',$filename);
            $product->image = $filename;
        }

        $product->name = $request->name;
        $product->sub_category_id = $request->sub_category_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->status = $request->status == TRUE ? '1' :'0';
        $product->slug = strtolower(str_replace(' ', '-',$request->name));
        $product->save();
        Alert::success("Thành Công", "Thêm Sản Phẩm Thành Công");

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $products = Product::findOrFail($product);
        $sub_categories = SubCategory::get();
        return view('admin.product.edit', compact('products', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $products = Product::findOrFail($product);
        if($request->hasFile('image')){
            $destination = 'uploads/products/'.$products->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/',$filename);
            $products->image = $filename;
        }

        $products->name = $request->name;
        $products->sub_category_id = $request->sub_category_id;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->discount_price = $request->discount_price;
        $products->description = $request->description;
        $products->status = $request->status == TRUE ? '1' :'0';
        $products->slug = strtolower(str_replace(' ', '-',$request->name));
        $products->update();
        Alert::info("Thành Công", "Sửa Sản Phẩm Thành Công");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product){
        $products = Product::find($product);
        $products->delete();
        Alert::info("Thành Công", "Xoá Sản Phẩm Thành Công");
        return redirect()->route('product.index');
    }
}
