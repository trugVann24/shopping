<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    
    public function loadProductDetail($product){
        $product_details = Product::find($product);
        return view('client.product-details', compact('product_details'));
    }

    public function loadCart()  {
        $cart = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('client.cart', compact(
            'cart',
            'total',
            'subtotal'
        ));
    }

    
    public function addToCart($id) {
        $product = Product::findOrFail($id);

        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price' => $product->discount_price ?? $product->price ,
            'qty' => 1,
            'weight' => $product->weight ?? 0,
            'options' => [
                'image' =>$product->image,
            ]
        ]);
        return back();
    }

    public function deleteToCart($id){
        Cart::remove($id);

        return back();
    }

    // Checkout

    public function loadCheckOut(){
        $cart = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('client.checkout', compact(
            'cart',
            'total',
            'subtotal'
        ));
    }

    // Add Order

    public function addOrder(Request $request) {

        // 1. add order
        $order = Order::create($request->all());
        // 2. add order detail
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price* $cart->qty,
            ];

            OrderDetails::create($data);
        }
        // 3. delete cart 

        Cart::destroy();
        // 4. return result 
        return "OK";
    }

    private function sendEmail($order, $total, $subtotal) {
        $email_to = $order->email;

        Mail::send('client.email', compact('order', 'total', 'subtotal'), function($message) use ($email_to){
            $message->from('trugvann.24@gmail.com', 'V-Store');
            $message->to($email_to, $email_to);
            $message->subject('Đặt hàng thành công');
        });
    }
    
}
