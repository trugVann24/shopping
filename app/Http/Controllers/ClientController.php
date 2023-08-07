<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function loadData(){
        $categories = Category::get();
        $sub_categories = SubCategory::get();
        $products = Product::get();
        return view('client.index', compact('categories', 'sub_categories', 'products'));
    }
    public function loadProductDetail($product){
        $product_details = Product::find($product);
        return view('client.product-details', compact('product_details'));
    }
    
    public function loadCart(){
        return view('client.cart');
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function removeCart(Request $request) {
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('Thành công', 'Xoá sản phẩm thành công khỏi giỏ hàng');
        }
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('Thành công', 'Cập nhật thành công sản phẩm');
        }
    }
}
