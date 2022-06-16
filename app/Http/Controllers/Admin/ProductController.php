<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Manufacturer;
use App\Models\AgeAudience;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = DB::table("Product")->paginate(8);
        return view('admin.products.index',[
            'Products' => $Products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::get();
        $Brands = Brand::get();
        $Manufacturers = Manufacturer::get();
        $AgeAudiences = AgeAudience::get();
        $Materials = Material::get();
        return view('admin.products.create',['Categories'=>$Categories,'Brands' => $Brands,
            'Manufacturers' => $Manufacturers, 'AgeAudiences' => $AgeAudiences, 'Materials' => $Materials]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        Product::create($request->validated());
        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $Categories = Category::get();
        $Brands = Brand::get();
        $Manufacturers = Manufacturer::get();
        $AgeAudiences = AgeAudience::get();
        $Materials = Material::get();
        return view('admin.products.create',['Product' => $product,'Categories'=>$Categories,'Brands' => $Brands,
                                             'Manufacturers' => $Manufacturers, 'AgeAudiences' => $AgeAudiences, 'Materials' => $Materials]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request,Product $product)
    {

        $data = $request->validated();
        if($request->hasFile('Images'))
        {
            $files = $request->file('Images');
            $i = 1;
            foreach ($files as $file) {
                $ext = $file->extension();
                $file->storeAs($data['VenCode'],$i.'.jpg',['disk' =>'public']);
                $i++;
            }
        }


        $product->update($data);

        
        return redirect(route("admin.products.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route("admin.products.index"));
    }
}
