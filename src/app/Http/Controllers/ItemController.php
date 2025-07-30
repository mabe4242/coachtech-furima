<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageService;
use App\Http\Requests\ExhibitionRequest;
use App\Services\CheckFormService;

class ItemController extends Controller
{
    public function index(){
        $items = Item::with('user')->get();
        return view('index', compact('items'));
    }

    public function create(){
        $categories = Category::all();
        return view('items/create', compact('categories'));
    }

    public function store(ExhibitionRequest $request){
        $itemData = $request->only(['name', 'brand_name', 'condition', 'description', 'price']);
        $itemData['user_id'] = Auth::id();
        $imageFile = $request->image_url;
        $imagePath = ImageService::upload($imageFile, 'items');
        if ($imagePath !== null){
            $itemData['image_url'] = $imagePath;
        }
        $item = Item::create($itemData);

        // カテゴリIDの配列を取得（name="categories[]" で送信されたもの）
        $categoryIds = $request->input('categories', []);
        // 中間テーブルに登録
        $item->categories()->attach($categoryIds);

        return redirect('/');
    }

    public function show(int $item_id){
        $item = Item::with(['categories', 'comments.user'])->findOrFail($item_id);
        $item['tax_price'] = CheckFormService::calcTaxPrice((int)$item->price);
        $item['item_condition'] = CheckFormService::checkCondition((int)$item->condition);
        
        return view('items.show', compact('item'));
    }
}
