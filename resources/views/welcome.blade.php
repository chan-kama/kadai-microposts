@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Microposts</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
                    {{-- ユーザ登録ページへのリンクを作成　クリックしたらルーティング名signup.getへ --}}
                    {{-- ボタンのタイトルはSign up now!　URLに代入したい値は無いので[]　クラス名を付与 --}}
        </div>
    </div>
@endsection