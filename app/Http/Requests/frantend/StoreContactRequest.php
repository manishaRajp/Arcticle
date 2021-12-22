<?php

namespace App\Http\Requests\frantend;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'name' => 'name'
        ];
    }
    public function rules()
    {
        return [
              'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'massege' => 'required',
        ];
    }
       public function messages()
       {
           return [
           'name' => 'Please enter name',
           ];
       }
}
