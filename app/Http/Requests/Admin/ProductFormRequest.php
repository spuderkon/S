<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Name' => 'required|unique:Product,Name',
            'Category_id' => 'required|numeric',
            'Manufacturer_id' => 'required|numeric',
            'Brand_id' => 'required|numeric',
            'Price' => 'required',
            'Age_audience_id' => 'required|numeric',
            'Weight' => 'nullable',
            'Size' => 'nullable',
            'Material_id' => 'required|numeric',
            'Packing_size' => 'nullable',
            'Details_amount' => 'nullable',
            'Description' => 'required',
            'VenCode' => 'required',

        ];
    }
}
