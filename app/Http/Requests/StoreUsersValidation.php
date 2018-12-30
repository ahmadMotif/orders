<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersValidation extends FormRequest
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
            'name' => 'required|min:3|max:225',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'jobs' => 'required'
        ];
        return $rules;
    }
    public function messages ()
    {
        return [
            'name.required' => 'This Field Is Required, plase Fill In!',
            'name.min' => 'Name Must Be Longer Then 2 Charctors',
            'email.required' => 'This Field Is Required, plase Fill In!',
            'email.email' => 'Plase Fill Validate Email',
            'password.required' => 'This Field Is Required, plase Fill In!',
        ];
    }
}
