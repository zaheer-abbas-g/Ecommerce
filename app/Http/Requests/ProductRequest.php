<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $data= [
            'title' => 'required',
            'slug'  =>  'required|unique:products,slug',
            'price'  =>  'required|numeric',
            'sku'  =>  'required|unique:products,sku',
            'track_qty'  =>  'required|in:Yes,No',
            'category'  =>  'required|numeric',
            'is_featured'  =>  'required|in:Yes,No',
        ];

        if(!empty($data['track_qty']) && $data['track_qty']=="Yes" ){
            $data['qty'] = 'required|numeric';
        }
        return $data;
    }
}
