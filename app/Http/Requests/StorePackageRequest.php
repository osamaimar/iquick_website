<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'name'                =>'required|min:3|max:150',
            'slug'                =>'nullable|',
            'small_description'   =>'required|min:3|max:1000000000',
            'description'         =>'required|min:3|max:10000000000',
            'price'               =>'required|regex:/^(\d+(,\d{1,2})?)?$/',
            'image'               =>"nullable|image|mimes:webp,jpg,jpeg,png|max:300",
            'image_single'        =>"nullable|image|mimes:webp,jpg,jpeg,png|max:300",
            'service_id'          =>"required|array",
            'service_id.*'        =>"nullable",
            'num_service'         =>"required|array",
            'num_service.*'       =>"nullable|",
            'img'                 =>"nullable|image|mimes:webp,jpg,jpeg,png|max:2048",
        ];
    }
}
