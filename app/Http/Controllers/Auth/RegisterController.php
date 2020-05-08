<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

// ユーザ登録のためのコントローラー

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';   // ユーザ登録後のリダイレクト先を指定（トップページヘ）

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');   // ユーザ登録のコントローラー（RegisterController）へのアクセス権限を指定
    }                                   // すでにユーザ登録している人（ログイン出来ている人）は再度登録の必要が無いため
                                        // guestは「app/Http/Kernel.php」に定義されている（エイリアス）（ニックネームのようなもの）

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)   // ユーザ登録時のフォームデータのバリデーション（検証）を実施する関数を定義
    {
        return Validator::make($data, [                                 // Validatorはトレイト「RegistersUsers」の中のメソッドに定義　オーバーライドで使用
            'name' => 'required|string|max:255',                        // required（入力欄が空っぽでないか）　string（文字であるか）　max:255（文字数は255まで）
            'email' => 'required|string|email|max:255|unique:users',    // email（email形式か）　unique:users（usersテーブルにおいて重複が無いか）
            'password' => 'required|string|min:6|confirmed',            // min:6（6文字以上）　confirmed（password確認のための再入力欄と値が同じであるか）
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)              // ユーザ新規作成のためのメソッド
    {
        return User::create([                           
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),    // bcryptでpasswordのハッシュ化（暗号化）
        ]);
    }
}
