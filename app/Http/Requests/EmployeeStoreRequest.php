<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class EmployeeStoreRequest extends FormRequest
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
        'name' => 'required|alpha|max:50',
        'email' => 'required|email|unique:employees,email',
        'phone' => 'required|numeric|digits:10',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female,other',
        'password' => 'required|string|min:8|confirmed',
        'country' => 'required|in:usa,india,nepal,canada',
        'salary' => 'required|numeric|between:0,999999.99',
        'age' => 'required|integer|min:18|max:99',
        'hobby' => 'required|array',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'zipcode' => 'nullable|numeric|digits:10',
        'description' => 'required|string|max:500',
        'remember_me' => 'nullable|boolean',
        ];
    }
    public function attributes():array
    {
        return[
            'name' => 'Employee Name',
            'email' => 'Email Address',
            'phone' =>'Phone Number',
            'date_of_birth' =>'Date of Birth',
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' =>':attribute is empty.',
            'name.string' => ':attribute must contain alphabetic value',
            'country.in' => 'select a country',
            'salary.between' => 'salary shouldnot be greater than 999999.99',
            'hobby.required' => 'select your hobby.',
           
        
        ];
    }
}
