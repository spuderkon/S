<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductLW extends Component
{

    public $User;

    public $rules = [
        'User_id' => ['required'],
        'Product_id' => ['required'],
        'Product_amount' => ['required'],
        'Total' => ['required'],
    ];

    public function render($id)
    {
        $Product = Product::where("VenCode", $id)->first();
        $Manufacturer = $Product->manufacturer;
        $Brand = $Product->brand;
        $AgeAudience = $Product->ageaudience;
        $Material = $Product->material;
        $Category = $Product->category;
        $Products = DB::table("Product")->get();
        return view('livewire.product-l-w')->with(['Product' => $Product, 'Manufacturer' => $Manufacturer,
            'Brand' => $Brand, 'AgeAudience' => $AgeAudience,
            'Material' => $Material, 'Category' => $Category,
            'Products' => $Products]);;
    }
    public function increase($id)
    {

    }

    public function decrease($id)
    {

    }

    public function addToCart($id)
    {

    }

    public function update($id)
    {

    }
}
