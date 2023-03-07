<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreStoryRequest extends FormRequest
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
            'story_heading_en' => 'required',
            'story_heading_ar' => 'required',
            // 'story_description_en' => 'required',
            // 'story_description_ar' => 'required',
            'happy_partner'=>'required',
            'successful_projects'=>'required',
            'total_investments'=>'required',
            'year_of_exp'=>'required',

        ];
    }
}
