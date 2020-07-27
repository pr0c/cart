<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class CommentController extends Controller {
    public function add(Request $request) {
        $commentInfo = $request->all();
        $commentInfo['user_id'] = Auth::user()->id;

        $comment = Comment::create($commentInfo);

        return \response()->json([
            'status' => 1,
            'payload' => $comment
        ]);
    }

    public function getComment(Comment $comment) {
        $comment->refresh();
        $html = view('shop._partial.comment', compact('comment'))->render();

        return response()->json(compact('html'));
    }
}
