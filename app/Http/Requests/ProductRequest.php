<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'sub_category_id' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Sản phẩm không được để trống',
            'sub_category_id.required' => 'Danh mục nhỏ không được để trống',
            'name.unique' => 'Sản phẩm bị trùng',
            'description.unique' => 'Phần mô tả không được để trống',
        ];
    }
}
