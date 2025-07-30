<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){
        $items = Item::with('user')->get();
        return view('index', compact('items'));
    }

    public function create(){
        return view('items/create');
    }

    public function store(Request $request){
        //いったん画像、カテゴリ、condition以外の保存処理
        $item = $request->only(['name', 'brand_name', 'description', 
        'price']);
        $item['user_id'] = Auth::id();

        //空のデータにはここでダミーの値を代入する
        $item['image_url'] = 'test.png';
        //※カテゴリだけ$itemと別で保存処理必要
        $item['condition'] = 1;

        Item::create($item);

        return redirect('/');
    }
}
