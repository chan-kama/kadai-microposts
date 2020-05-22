<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Microposts</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">   {{-- id="nav-bar"のメニューにハンバーガーボタンを適用 --}}
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())         {{-- ユーザのログインを確認　ログインを確認出来たら以下のメニューを表示 --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>   {{-- Usersのリンクを設置 --}}
                    <li class="nav-item dropdown">         {{-- 以下からドロップダウンメニュー --}}
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>   {{-- Auth::user()でログイン中のユーザ情報を取得 --}}
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'My Profile', ['id' => Auth::id()]) !!}</li>
                                        {{-- users.showへのリンク設置　リンク先のURL末尾にid　idはAuth::id()でログイン中のユーザのidを取得 --}}
                            <li class="dropdown-item">{!! link_to_route('users.favorites', 'Favorites', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else         {{-- ログインが確認できない場合、以下のメニューを表示 --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>