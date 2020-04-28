<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [

            'name' => 'required',
            'email' => 'required',
            'address' =>'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name error is found',
            'email.required'  => 'Email error found',
            'address.required'  => 'Address error found',
        ];
    }
}




