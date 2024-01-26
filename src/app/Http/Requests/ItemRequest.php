<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'image'=> ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'price'=> ['required', 'numeric', 'min:1', 'max:1000000']
        ];
    }
    public function messages()
    {
        return [
            'image.required' => '画像を添付してください',
            'name.required' => '商品名入力してください',
            'description.required' => '商品説明を入力してください',
            'price.required' => '商品価格を入力してください',
            'price.numeric' => '数値を入力してください',
            'price.min' => '1円以上の数値を入力してください',
            'price.max' => '1,000,000円以下の数値を入力してください',

        ];
    }
}
