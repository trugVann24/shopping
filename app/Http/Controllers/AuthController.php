<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registing(AuthRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // Alert::success("Thành Công", "Tạo Tài Khoản Thành Công");
        toast('Tạo Tài Khoản Thành Công!', 'Thành Công');
        return redirect()->route('login');
    }


    public function login()
    {
        if (Auth::user() && Auth::user()->is_admin == 1) {
            return redirect()->route('admin');
        } else if (Auth::user() && Auth::user()->is_admin == 0) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }


    public function logining(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email không được được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Nhập sai định dạng email',
            'password.required' => 'Mật khẩu không được được để trống',
        ]);

        $userAuth = $request->only('email', 'password');
        if (Auth::attempt($userAuth)) {
            if (Auth::user()->is_admin == 1) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('home');
            }
        } else {
            return back()->with('mess', 'Thông tin tài khoản mật khẩu không chính xác');
        }
    }


    public function admin()
    {
        return view('admin.index');
    }

    public function home(Request $request){
        $cart = Cart::content();
        $products = Product::paginate(6);

        if ($request->ajax()) {
            $html = '';

            foreach ($products as $product) {
                $html .= '
                            <div class="col-sm-6 col-xl-4 mb-3 " >
                                <div class="border rounded item-product">
                                    <a href = "/home/product-details/' . $product->id . '">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex justify-content-center flex-wrap align-items-center mb-2 pb-1">
                                                    <img src="uploads/products/'. $product->image .'" alt=""
                                                        class="img-fluid rounded-3 mb-2">
                                                    <div class="text-center mt-2">
                                                        <span class="d-block text-black fw-bold">' . $product->name . '</span>
                                                        <span class="text-danger fw-bold mt-2">' . $product->discount_price . ' VNĐ</span>
                                                        <span class="d-block text-secondary fw-bold">' . $product->price . ' VNĐ</span>
                                                            <div class="mt-1">
                                                            <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                                                4.4 <span class="text-warning"><i
                                                                        class="bx bxs-star me-1 mb-1"></i></span><span
                                                                    class="text-muted">(1.23k)</span>
                                                            </h6>
                                                    </div>
                                                    <div class="mt-2">
                                                        <a href="/home/cart/add-to-cart/' . $product->id . '"
                                                            class="d-flex align-items-center me-3 button-add">
                                                            <i class="bx bx-cart me-1" ></i>Thêm giỏ hàng</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                
                ';
            }

            return $html;
        }

        return view('client.index', compact(
            'cart'
        ));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
