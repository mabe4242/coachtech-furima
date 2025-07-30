<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $item_id){
        Comment::create([
            'user_id' => Auth::id(),
            'item_id' => $item_id,
            'comment' => $request->comment
        ]);

        return redirect()->back();
    }
}
