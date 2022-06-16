<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\T_Public\images\products;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Brand;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $Products = [];

    public function index()
    {
        $Products = DB::table("Product")->paginate(8);
        $ProductsAmount = self::getProductsAmount();
        return view('index', ['Products' => $Products, 'ProductsAmount' => $ProductsAmount]);
    }

    public function catalog()
    {
        $parentCategories = Category::where('parent_id', null)->get();
        $Products = DB::table("Product")->paginate(15);
        $Categories = DB::table("Category")->get();
        $ProductsAmount = self::getProductsAmount();
        return view('catalog', ['parentCategories' => $parentCategories, 'Products' => $Products, 'Categories' => $Categories, 'ProductsAmount' => $ProductsAmount]);
    }

    public function registration()
    {
        return view("login");
    }

    public function brand($id)
    {
        $Products = Product::where(['Brand_id' => $id])->get();
        $Brands = Brand::get();
        $ProductsAmount = self::getProductsAmount();
        return view('brand', ['Products' => $Products, 'Brands' => $Brands,'ProductsAmount' => $ProductsAmount]);
    }

    public function product($id)
    {
        $Product = Product::where("VenCode", $id)->first();
        $Manufacturer = $Product->manufacturer;
        $Brand = $Product->brand;
        $AgeAudience = $Product->ageaudience;
        $Material = $Product->material;
        $Category = $Product->category;
        $Products = DB::table("Product")->get();
        $ProductsAmount = self::getProductsAmount();
        return view('product')->with(['Product' => $Product, 'Manufacturer' => $Manufacturer,
            'Brand' => $Brand, 'AgeAudience' => $AgeAudience,
            'Material' => $Material, 'Category' => $Category,
            'Products' => $Products, 'ProductsAmount' => $ProductsAmount]);
    }

    public function acTest()
    {

        $parentCategories = Category::where('parent_id', null)->get();
        $Category = Category::where(['Category_id' => 10])->first();
        $Products = $this->getProducts($Category);

        return view('test', ['parentCategories' => $parentCategories, 'Products' => $Products]);
    }

    public function catCatalog($id, $name)
    {
        $ProductsAmount = self::getProductsAmount();
        $parentCategories = Category::where('parent_id', null)->get();
        $i = 0;
        $pr = [];
        $Category = Category::where("Name", $name)->first();
        $this->getProducts($Category);
        $collection = new Product();

        return view('scoped', ['parentCategories' => $parentCategories, 'Products' => $this->Products, 'ProductsAmount' => $ProductsAmount]);
    }

    //Functions
    public function getFileCount($direct)
    {
        $dir = opendir('/sites/stud01.server.webmx.ru/shop/public/images/products/' . $direct);
        $count = 0;
        while ($file = readdir($dir)) {
            if ($file == '.' || $file == '..' || is_dir($direct . $file)) {
                continue;
            }
            $count++;
        }
        return $count;
    }

    public function addToCart(Request $request, $vencode)
    {
        $User = Auth::user();
        $Product = Product::where('VenCode', $vencode)->first();
        $data = $request->validate([
            "User_id" => 'required',
            "Product_id" => 'required',
            "Product_amount" => 'required',
            "Total" => 'required',
        ]);
        $NecCart = Cart::where(['Product_id' => $Product->Product_id, 'User_id' => $data['User_id']])->first();
        if (is_null($NecCart)) {
            Cart::create([
                "User_id" => $data["User_id"],
                "Product_id" => $data["Product_id"],
                "Product_amount" => $data["Product_amount"],
                "Total" => $data["Total"],
            ]);
        } else {
            $NecCart->update(['Product_amount' => $NecCart->Product_amount + 1]);
        }
        return redirect(route('product', $vencode));
    }

    public function getProductsAmount()
    {
        if (Auth::check()) {
            $User = Auth::user();
            $Products = DB::table("Product")->get();
            $Carts = Cart::where('User_id', $User->user_id)->get();
            $ProductsAmount = 0;
            foreach ($Carts as $cart) {
                $ProductsAmount += $cart->Product_amount;
            }
            return $ProductsAmount;
        } else {
            return 0;
        }
    }


    public function getProducts($category)
    {
        $ChildCategories = Category::where("Parent_id", $category->Category_id)->get();
        if (is_null($ChildCategories) || count($ChildCategories) == 0) {
            $products = Product::where("Category_id", $category->Category_id)->get()->toArray();
            $this->Products = array_merge($this->Products, $products);
            return;
        }
        foreach ($ChildCategories as $childCategory) {
            $this->getProducts($childCategory);
        }

    }
}
