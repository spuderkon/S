<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Order_id' => 'required|numeric',
            'User_id' => 'required|numeric',
            'Product_id' => 'required|numeric',
            'Product_amount' => 'required|numeric',
            'Price' => 'required',
            'Order_date' => 'required',
            'Status_id' => 'required|numeric',
            'Delivery_method_id' => 'required|numeric'
        ];
    }
}
