<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageService;

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
        $item = $request->only(['name', 'brand_name', 'description', 'price']);
        $item['user_id'] = Auth::id();
        $imageFile = $request->image_url;
        $item['image_url'] = ImageService::upload($imageFile, 'items');

        //※カテゴリだけ$itemと別で保存処理必要
        $item['condition'] = 1;

        Item::create($item);

        return redirect('/');
    }
}
