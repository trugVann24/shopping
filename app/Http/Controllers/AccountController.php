<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        $accounts = User::all();
        return view('admin.account.index', compact('accounts'));
    }
}
