<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        $imageFile = $request->image_url;
        if(!is_null($imageFile)){
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName. '.' . $extension;
            $item['image_url'] = $fileNameToStore;
            $resizedImage = Image::make($imageFile)->fit(800, 800)->encode();
            Storage::put('public/items/' . $fileNameToStore, $resizedImage );
        }

        //※カテゴリだけ$itemと別で保存処理必要
        $item['condition'] = 1;

        Item::create($item);

        return redirect('/');
    }
}
