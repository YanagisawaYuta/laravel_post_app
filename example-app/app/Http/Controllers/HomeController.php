<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostTheme;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * トップ表示
     *
     * @return void
     */
    public function Home() {

        // ユーザー取得
        $user = Auth::user();

        // 掲示板一覧取得
        $posts = PostTheme::select([
            'id',
            'name'
        ])->where('deleted', 0)->get();

        return view('home', ['posts' => $posts, 'user' => $user]);
    }
}
