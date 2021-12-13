<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string',
            'major' => 'required|string',
            'email' => 'required|email|unique:students,email,'.$this->id.',id',
            'phone_number' => 'required|string'
        ];
        return $rules;
    }
    /**
     * Get the error messages if the request do not match the rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name should be string.',
            'major.required' => 'Name is required.',
            'major.string' => 'Name should be string.',
            'email.required' => 'Email is required.',
            'email.unique' => 'Email already exist.',
            'email.email' => 'Email format is wrong.',
        ];
    }
}
