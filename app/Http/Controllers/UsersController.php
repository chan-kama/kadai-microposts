<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;   // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);     // User::でユーザデータ取得　
                                            // orderBy('id', 'desc')でid参照で降順に並べ替え　paginate(10)で10ユーザごとにページネーション
        
        return view('users.index', [        // users.indexのviewファイルで表示
            'users' => $users,              // 上記処理の$usersのデータを渡す
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);    // Userモデルからshow($id)の$idに該当するレコードを取得
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->pagination(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        return view('users.show', $data);     // users.showファイルでview
    }
}
