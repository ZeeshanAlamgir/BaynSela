<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreGoalSectionRequest extends FormRequest
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
            'heading_en' => 'required',
            'heading_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image_en' => 'mimes:jpeg,jpg,png|required',
            'image_ar' => 'mimes:jpeg,jpg,png|required',

        ];
    }
}
