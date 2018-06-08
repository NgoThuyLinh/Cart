<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ];
    }
    public function messages(){
        return[
            'name.required'=> 'Nhập giá trị',
            'name.min'=> 'Không đủ độ dài',
            'price.required'=> 'Nhập giá trị',
            'quantity.required'=> 'Nhập giá trị',
            'price.numeric'=> 'Không đúng định dạng',
            'quantity.numeric'=> 'Không đúng định dạng',
        ];
    }
}
