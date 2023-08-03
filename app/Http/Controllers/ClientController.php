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
    
    
}
