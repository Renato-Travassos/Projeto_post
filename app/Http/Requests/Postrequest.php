<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Postrequest extends FormRequest
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
            'comentário'=>'bail|nullable|string',
            'nota'=>'bail|required|integer',
             
            'nome'=>'bail|required|min:3|max:50|string',
            'tipos'=>'bail|required|array',
            'descrição'=>'bail|nullable|string',
        ];
    }
}
