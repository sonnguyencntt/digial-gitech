<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name_category' => 'required|max:255',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_category.required' => 'thông tin danh mục còn trống ',
            'image.required' => 'thông tin hình ảnh còn trống',
        ];
    }
   
}
