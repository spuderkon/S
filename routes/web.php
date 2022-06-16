<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AddInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Livewire\Carts;
use App\Http\Livewire\ProductLW;
use App\Http\Livewire\Tester;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/catalog', [Controller::class, 'catalog'])->name('catalog');
Route::get('/test', [Controller::class, 'acTest']);
Route::get('/product/{id}', [Controller::class, 'product'])->name('product');
Route::get('/scoped/{id}/{category}', [Controller::class, 'catCatalog']);
Route::get('/t', [Tester::class, 'render'])->name('tester');
Route::get('/brand/{id}', [Controller::class, 'brand'])->name('brand');


Route::middleware("auth:web")->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::post('/profile',[AuthController::class, 'changeProfileInfo'])->name('changeInfo_process');

    Route::get('/cart',[CartController::class, 'index'])->name('cart');

    Route::post('/product/{id}',[Controller::class, 'addToCart'])->name('addToCart_process');
});

Route::middleware("guest:web")->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');

    Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [AuthController::class, 'forgot'])->name('forgot_process');
});

/*Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('auth')->name('private');
    Route::view('/cart','cart')->middleware('auth')->name('cart');
    Route::get('/login', function () {
        if(Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');
    Route::get('/cart', function () {
        if(Auth::check()){
            return view('cart');
        }
        return redirect(route('user.login'));
    });
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');
    Route::post('/registration', [RegisterController::class, 'save']);
    Route::post('/private', [AddInfoController::class, 'add']);
    Route::post('/product/{id}', [CartController::class, 'update'])->name('add_in_cart');
    Route::resource('cart', CartController::class);
});*/


