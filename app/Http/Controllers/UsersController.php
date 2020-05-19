<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Micropost;

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
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);     // users.showファイルでview
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
}
