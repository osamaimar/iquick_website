<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceCommentRequest extends FormRequest
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
            'order_id'           =>"required",
            'comments'           =>"nullable",
            'filed_name'         =>"nullable|mimes:webp,jpg,png,jpeg,pdf,xlsx|max:2024",
        ];
    }
}
