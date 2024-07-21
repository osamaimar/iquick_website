<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCalendarRequest extends FormRequest
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
            "title"=>"required|min:3|max:150",
            "description"=>"nullable|min:3|max:1000000000",
            'profile_id'=>"required|",
            'status'=>"required|",
            'client_id'=>"required|",
        ];
    }
}
