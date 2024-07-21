<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'name'=>"required|min:3|max:150",
            'header_logo'=>"nullable|mimes:webp,jpg,jpeg,png|max:2024",
            'footer_logo'=>"nullable|mimes:webp,jpg,jpeg,png|max:2024",
            'icon'=>"nullable|mimes:webp,jpg,jpeg,png|max:2024",
            'small_description'=>"required|min:3|max:10000000000",
            'about_us'=>"required|min:3|max:10000000000",
            'phone'=>"required|max:25",
            'email'=>"required|email",
            'address'=>"required|min:3|max:50",
            'facebook'=>"nullable|url",
            'twitter'=>"nullable|url",
            'insta'=>"nullable|url",
            'youtube'=>"nullable|url",
            'Linkedin'=>"nullable|url",
            'live_chat'=>"nullable|url",
            'mail_password'=>"required|min:3|max:25",
            'mail_from_address'=>"required|email",
        ];
    }
}
