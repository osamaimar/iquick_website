<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'description_cust'    =>'nullable|min:3|max:5000',
            'file'                =>"nullable|mimes:webp,jpg,png,jpeg,pdf,xlsx|max:2024",
        ];
    }
}
