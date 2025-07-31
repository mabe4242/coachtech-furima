<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
{
    private const DESCRIPTION_MAX = 255;

    private const PRICE_MIN = 0;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required', 'max:'.self::DESCRIPTION_MAX],
            'image_url' => ['required', 'file', 'mimes:jpeg,png'],
            'categories' => ['required', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
            'condition' => ['required'],
            'price' => ['required', 'numeric', 'min:'.self::PRICE_MIN],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '商品の説明を'.self::DESCRIPTION_MAX.'文字以下で入力してください',
            'image_url.required' => '商品画像を選択してください',
            'image_url.file' => '画像ファイルをアップロードしてください',
            'image_url.mimes' => '画像はjpegまたはpng形式でアップロードしてください',
            'categories.required' => 'カテゴリーを選択してください',
            'condition.required' => '商品の状態を選択してください',
            'price.required' => '販売価格を入力してください',
            'price.numeric' => '販売価格を数値で入力してください',
            'price.min' => '販売価格を'.self::PRICE_MIN.'円以上で入力してください',
        ];
    }
}
