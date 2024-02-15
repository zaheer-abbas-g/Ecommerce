<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        return [
            'name'=> "required|unique:categories,name",
        //    'name' => ['required', Rule::unique('categories')->ignore($this->user)],
            'slug' => 'required',
            'status' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'A category is required', 
            'name.unique'=>   'The category has already been taken',
        ];
    }
}
