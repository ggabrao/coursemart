<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'description' => 'required|string|max:20',
            'stock' => 'required|numeric|integer|min:1',
            'price' => 'required|numeric|decimal:2|min:0',
        ];
    }
}
