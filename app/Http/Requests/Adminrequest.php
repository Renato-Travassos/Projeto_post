<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Adminrequest extends FormRequest
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
             
            'is_admin'=>'bail|required|integer',
             
            'name'=>'bail|required|min:3|max:50|string',
            'email'=>'bail|required|email',
             
        ];
    }
}
