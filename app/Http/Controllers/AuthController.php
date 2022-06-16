<?php

namespace App\Http\Controllers;

use App\Jobs\ForgotUserEmailJob;
use App\Mail\ForgotPassword;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth("web")->attempt($data)) {
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }

    public function showProfile()
    {
        $User = Auth::user();
        $ProductsAmount = self::getProductsAmount();
        return view("auth.profile", ['User' => $User,'ProductsAmount' => $ProductsAmount]);
    }

    public function forgot(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string", "exists:user"],
        ]);

        $user = User::where(["email" => $data["email"]])->first();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->save();

        Mail::to($user)->send(new ForgotPassword($password));

        return redirect(route("home"));
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:User,email"],
            "password" => ["required", "confirmed"]
        ]);

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($user) {
            //event(new Registered($user));

            auth("web")->login($user);
        }

        return redirect(route("home"));
    }

    public function changeProfileInfo(Request $request)
    {
        $User = Auth::user();
       $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "string"],
            "phone" => ["required"],
            "password" => ["required"],
        ]);
        $User->update([
            "name" => $data["name"],
            "email" => $data["email"],
            "phone" => $data["phone"],
            "password" => bcrypt($data["password"])
        ]);
        return redirect(route('profile'));
    }

    public function getProductsAmount()
    {
        if(Auth::check())
        {
            $User = Auth::user();
            $Products = DB::table("Product")->get();
            $Carts = Cart::where('User_id',$User->user_id)->get();
            $ProductsAmount = 0;
            foreach($Carts as $cart)
            {
                $ProductsAmount += $cart->Product_amount;
            }
            return $ProductsAmount;
        }
        else
        {
            return 0;
        }
    }
}