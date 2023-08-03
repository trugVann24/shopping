<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Danh mục nhỏ không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'name.unique' => 'Danh mục nhỏ bị trùng',
        ];
    }
}
