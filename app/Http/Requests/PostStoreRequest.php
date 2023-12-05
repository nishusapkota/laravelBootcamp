<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'name'=>'required',
            'description'=>'required|max:30',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif'
        ];
    }

    public function attributes(): array
    {
        return[
            'name'=>'product name',
            'description'=>'product description',
            'image'=>'product image'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required'=>'the :attribute is empty',
            'description.required'=>'product description is required',
        ];
    }
}
