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

    public function loadProductDetail($product)
    {
        $product_details = Product::find($product);
        return view('client.product-details', compact('product_details'));
    }

    public function loadCart()
    {
        $cart = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('client.cart', compact(
            'cart',
            'total',
            'subtotal'
        ));
    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'price' => $product->discount_price ?? $product->price,
            'qty' => 1,
            'weight' => $product->weight ?? 0,
            'options' => [
                'image' => $product->image,
            ]
        ]);
        return back();
    }

    public function deleteToCart($id)
    {
        Cart::remove($id);

        return back();
    }

    // Checkout

    public function loadCheckOut()
    {
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

    public function addOrder(Request $request)
    {

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
                'total' => $cart->price * $cart->qty,
            ];

            OrderDetails::create($data);
        }
        // 3. delete cart 

        Cart::destroy();
        // 4. return result 
        return "OK";
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('client.email', compact('order', 'total', 'subtotal'), function ($message) use ($email_to) {
            $message->from('trugvann.24@gmail.com', 'V-Store');
            $message->to($email_to, $email_to);
            $message->subject('Đặt hàng thành công');
        });
    }

    // public function loadProduct(Request $request)
    // {
    //     $products = Product::all();
    //     return response()->json([
    //         'products' => $products,
    //     ]);

    //     $products = Product::paginate(3);

    //     if ($request->ajax()) {
    //         $html = '';

    //         foreach ($products as $product) {
    //             $html .= '
    //             <div class="col-sm-6 col-xl-4 mb-3 " >
    //                             <div class="border rounded item-product">
    //                                 <a href = "/home/product-details/' . $product->id . '" class = "">
    //                                 <div class="card-body ">
    //                                     <div class="d-flex align-items-center justify-content-between">
                                            
    //                                             <div class="d-flex justify-content-center flex-wrap align-items-center mb-2 pb-1">
    //                                             <img src="{{ asset("uploads/products/' . $product->image . '") }}" alt=""
    //                                                 class="img-fluid rounded-3 mb-2">
    //                                             <div class="text-center mt-2">
    //                                                 <span class="d-block text-black fw-bold">' . $product->name . '</span>
    //                                                 <span class="text-danger fw-bold mt-2">' . $product->discount_price . ' VNĐ</span>
    //                                                 <span class="d-block text-secondary fw-bold">' . $product->price . ' VNĐ</span>
    //                                                     <div class="mt-1">
    //                                                     <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
    //                                                         4.4 <span class="text-warning"><i
    //                                                                 class="bx bxs-star me-1 mb-1"></i></span><span
    //                                                             class="text-muted">(1.23k)</span>
    //                                                     </h6>
    //                                             </div>
    //                                             <div class="mt-2">
    //                                                 <a href="/home/cart/add-to-cart/' . $product->id . '"
    //                                                     class="d-flex align-items-center me-3 button-add">
    //                                                     <i class="bx bx-cart me-1" ></i>Thêm giỏ hàng</a>
    //                                             </div>
    //                                             </div>
    //                                         </div>
    //                                     </div>
    //                                 </div>
    //                                 </a>
    //                             </div>
    //                     </div>
                
    //             ';
    //         }

    //         return $html;
    //     }

    //     return view('client.index');
    // }


    public function searchProduct()
    {
        $products = Product::select('name')->where('status', '1')->get();
        $data = [];

        foreach ($products as $key) {
            $data[] = $key['name'];
        }
        return $data;
    }

    // Load Profile
    public function loadProfile() {
        return view('client.profile');
    }
}
