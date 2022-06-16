<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\User;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Carts extends Component
{
    public $quantities = [];

    public $totalprice = 0;

    public $prices = [];

    protected $rules = [
        'quantities.*' => ['required'],
    ];

    public function update(Cart $cart, $price)
    {
        $this->validate();
        $id = $cart->Cart_id;
        if($this->quantities[$id] <= 0)
        {
            $cart->delete();
        }
        $cart->update(['Product_amount' => intval($this->quantities[$id]),'Total' => intval($this->quantities[$id]) * $price]);
    }

    /*public function delete($Carts)
    {
        foreach ($Carts as $cart) {
            $cart->delete();
        }
    }*/

    public function render()
    {
        $User = Auth::user();
        $UserCarts = Cart::where('User_id', $User->user_id)->get();

        foreach ($UserCarts as $userCart) {
            $this->quantities[$userCart->Cart_id] = $userCart->Product_amount;
            $this->prices[$userCart->Cart_id] = $userCart->Total;
            $this->totalprice += $userCart->Total;
        }



        return view('livewire.carts', ['UserCarts' => $UserCarts]);
    }



}
