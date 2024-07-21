<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleFile extends FormRequest
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
            'order_id'         =>'required|',
            'name_attach'      =>'required|min:3|max:150',
            'attachment_file'     =>"nullable|array",
            'attachment_file*'     =>"nullable|mimes:webp,jpg,png,jpeg,pdf|max:4024",
        ];
    }
}
