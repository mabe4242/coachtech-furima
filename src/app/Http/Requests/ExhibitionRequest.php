<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => ['required'],
            'description' => ['required', 'max:255'],
            'image_url' => ['required', 'file', 'mimes:jpeg,png'],
            'categories' => ['required', 'array'],
            'categories.*' => ['integer', 'exists:categories,id'],
            'condition' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages(){
        return [
            'name.required' => '商品名を入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '商品の説明を255文字以下で入力してください',
            'image_url.required' => '商品画像を選択してください',
            'image_url.file' => '画像ファイルをアップロードしてください',
            'image_url.mimes' => '画像はjpegまたはpng形式でアップロードしてください',
            'categories.required' => 'カテゴリーを選択してください',
            'condition.required' => '商品の状態を選択してください',
            'price.required' => '販売価格を入力してください',
            'price.numeric' => '販売価格を数値で入力してください',
            'price.min' => '販売価格を0円以上で入力してください',
        ];
    }
}
