<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostTheme;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $validated = collect($validated);

        // ユーザー取得
        $user = Auth::user();

        $postTheme = PostTheme::create([
            'name' => $validated->get('name'),
            'user_id' => $user->id
        ]);

        $path = "/post/". $postTheme->id;

        return redirect($path);
    }
}
