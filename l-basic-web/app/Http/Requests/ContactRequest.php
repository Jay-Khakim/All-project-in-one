<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' =>'required|email',
            'subject' => 'required|max:80',
            'message' => 'required|min:10'
        ];
    }

    public function messages(){  //You can customize the error messages with messages() function        
        return [
            'name.required' => 'Fill the name field'
        ];
    }
}
