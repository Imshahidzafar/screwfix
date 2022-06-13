<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCompanyRequest extends FormRequest
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
            
            'name' => 'required|min:3|max:20',  
            'phone' => 'required|numeric',
             'address' => 'required|',
              'country' => 'required',  
            'state' => 'required',
             'city' => 'required', 
             'crnumber' => 'required',
             'crregistration' => 'required',
             'crexpiry' => 'required|date|after_or_equal:crregistration',
             'vname' => 'required',
             'vregistration' => 'required',
             'vexpiry' => 'required|date|after_or_equal:vregistration',
        ];
    }
}
