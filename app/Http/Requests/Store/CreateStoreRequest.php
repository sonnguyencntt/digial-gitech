<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
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
            'store_code' => 'required|max:255|unique:stores',
            'name' => 'required|max:255',
            'address' => 'required|max:255',

        ];
    }

    public function messages()
    {
        return [
            'store_code.required' => 'Mã không được còn trống ',
            'name.required' => 'Tên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',

            'store_code.unique' => 'Đã tồn tại mà cửa hàng, xin vui lòng chọn mã khác',

            


        ];
    }
}
