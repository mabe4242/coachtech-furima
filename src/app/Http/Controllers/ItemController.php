<?php

namespace App\Http\Controllers;

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
}
