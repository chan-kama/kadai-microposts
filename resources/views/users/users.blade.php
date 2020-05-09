@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)     {{-- テーブル$usersからレコードを1件取り出して$userへ　全て取り出すまで繰り返し --}}
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">     {{-- Gravatarからのアバター画像を表示 --}}
                <div class="media-body">
                    <div>
                        {{ $user->name }}     {{-- レコード$userからユーザ名を取得して表示 --}}
                    </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                                    {{-- ユーザ詳細ページへのリンク　表示は'View profile'　URLに末尾にidを付与 --}}
                    </div>
                </div>
            </li>
        @endforeach    
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}     {{-- ページネーションのリンク表示 --}}
@endif