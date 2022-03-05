<?php

namespace App\Http\Requests\PaymentHistory;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentHistoryRequest extends FormRequest
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
                'store_code' => 'required|exists:stores,store_code',
                'date_expired' => 'required|max:255',
                'payment_status' => 'required|boolean',


            ];
        }
        else
        {
            return [
             
            ];
        }
       
    }
    public function messages()
    {
        return [
   
        ];
    }
   
}
