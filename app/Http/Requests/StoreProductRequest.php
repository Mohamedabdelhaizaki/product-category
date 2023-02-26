<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'array',
            'name.*' => 'required|min:2|max:200',
            'description' => 'array',
            'description.*' => 'required|min:2|max:200',
            'category_id' => 'required|exists:categories,id',
            'productImage' => 'required|mimes:jpeg,png,jpg,webp,gif|max:5000'
        ];
    }
}
