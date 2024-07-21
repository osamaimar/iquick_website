<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         =>'required|min:3|max:150',
            'description'  =>'required|min:3|max:10000000000',
            'image1'       =>"nullable|mimes:webp,jpg,jpeg,png|max:2024",
            'image2'       =>"nullable|mimes:webp,jpg,jpeg,png|max:2024",
            'image3'       =>"nullable|mimes:webp,jpg,jpeg,png|max:2024",
            'image4'       =>"nullable|mimes:webp,jpg,jpeg,png|max:2024",
        ];
    }
}
