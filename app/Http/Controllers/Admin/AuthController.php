<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class AuthController extends Controller
{
    public function index()
    {
    	return view('admin.auth.login');
    }

    public function login(Request $request)
    {
    	$data = $request->validate([
    		'login' => 'required',
    		'password' => 'required'
    	]);

    	if(auth("admin")->attempt($data))
    	{
    		$Products = Product::get();
    		return redirect(route('admin.products.index'))->with(['Products' => $Products]);
    	}
    	return redirect(route('admin.login'))->withErrors(['login' => 'Пользователь не найден, либо данные введены неправильно']);
    }

    public function logout()
    {
    	auth('admin')->logout();

    	return redirect('/');
    }
}
