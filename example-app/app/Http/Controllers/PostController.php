<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\PostTheme;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post($id) {

        // テーマ情報取得
        $theme = PostTheme::select([
            'id',
            'name'
        ])->find($id);

        // テーマIDを元にコメント取得
        $comments = PostComment::select([
            'comment',
            'name'
        ])->where('theme_id',$id)
            ->leftJoin('users', 'post_comment.user_id', 'users.id')
            ->get();

        // ユーザー取得
        $user = Auth::user();

        return view('post', ['theme' => $theme, 'comments' => $comments, 'user' => $user]);
    }

    public function add(Request $request) {

        $validated = $request->validate([
            'theme_id' => 'required',
            'comment' => 'required|string'
        ]);

        // ユーザー取得
        $user = Auth::user();
        $validated['user_id'] = $user->id;

        $validated = collect($validated);

        // コメント登録
        PostComment::create([
            'user_id' => $validated->get('user_id'),
            'theme_id' => $validated->get('theme_id'),
            'comment' => $validated->get('comment')
        ]);

        return back();
    }
}
