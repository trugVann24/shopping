<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
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
    public function menu(){
        $categories = Category::get();
        return view('layouts.client', compact('categories'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
