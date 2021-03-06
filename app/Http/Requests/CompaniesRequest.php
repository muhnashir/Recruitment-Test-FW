<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
        $name ='';
        $email='';
        $logoPath='';
        $urlWebsite='';
        if(Request::isMethod('post')){
            $name ='required';
            $email='required|email';
            $logoPath='required|dimensions:min_width=100,min_height=200|max:2000|image|mimes:png';
            $urlWebsite='required'; 
        }else{
            $name ='';
            $email='email';
            $logoPath='dimensions:min_width=100,min_height=200|max:2000|image|mimes:png';
            $urlWebsite=''; 
        }
        return [
            'name' => $name,
            'email' => $email,
            'logoPath' => $logoPath,
            'urlWebsite' => $urlWebsite
        ];
    }
}
