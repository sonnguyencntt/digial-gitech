<?php

namespace App\Http\Requests\Category;

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
        $type_menu = \getNameSubdomain();
        if($type_menu == "admin.")
        {
            return [
                'link_url' => 'required|max:255',
                'store_code' => 'required|exists:stores,store_code',
                'name' => 'required|max:255',
            ];
        }
        else
        {
            return [
                'name' => 'required|max:255',
                // 'image_url' => 'required',
                // 'details' => 'required|max:255',
                // 'advantage' => 'required|max:255',
                // 'link_url' => 'required|max:255',
            ];
        }
       
    }
    public function messages()
    {
        return [
            'name.required' => 'Thông tin danh mục còn trống ',
            // 'image_url.required' => 'Thông tin hình ảnh còn trống',
            // 'details.required' => 'Thông tin chi tiết còn trống',
            // 'advantage.required' => 'Thông tin ưu điểm còn trống',
            // 'link_url.required' => 'Thông tin đường đẫn còn trống',
        ];
    }
   
}
