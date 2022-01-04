<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được còn trống ',
            'image.required' => 'Hình ảnh không được để trống',
            'image.mimes' => 'Hình ảnh không đúng định dạng',
            'image.max' => 'Hình ảnh không vượt quá 10000KB',


        ];
    }
}
