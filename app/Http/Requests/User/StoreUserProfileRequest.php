<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreUserProfileRequest extends FormRequest
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
            'username' => 'nullable|min:3|max:150',
            'date_of_Birth'=>'nullable|min:3|max:150',
            'gender'=>'nullable|',
            'profile_image'=>'nullable|mimes:webp,jpg,png,jpeg,pdf,xlsx|max:2024',
            'country'=>'nullable|max:150',
            'city'=>'nullable|min:3|max:150',
            'post_number'=>'nullable|max:150',
            'address'=>'nullable|min:3|max:150',
            'phone'=>'nullable|min:3|max:150',
        ];

    }
}
