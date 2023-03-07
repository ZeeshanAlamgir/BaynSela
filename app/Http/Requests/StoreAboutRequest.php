<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAboutRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'about_heading_en'=>'required',
            'about_heading_ar'=>'required',
            'about_description_en'=>'required',
            'about_description_ar'=>'required',
            'review_heading_en'=>'required',
            'review_heading_ar'=>'required',
            'review_description_en'=>'required',
            'review_description_ar'=>'required',
            'profile_name_en'=>'required',
            'profile_name_ar'=>'required',
            'profile_designation_en'=>'required',
            'profile_designation_ar'=>'required',
            'image' => 'mimes:jpeg,jpg,png|required',
        ];
    }
}
