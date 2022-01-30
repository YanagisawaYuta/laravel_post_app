<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板アプリ|TOP</title>
</head>
<body>
    <span>こんにちは {{$user->name}}さん</span>
    <span>
        <a class="dropdown-item" href="/logout"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('ログアウトする') }}
        </a>
    </span>

    <h1>掲示板トップ</h1>
    <section>
        <h2>掲示板作成</h2>
        <form action="/theme/add" method="POST">
            @csrf
            <input type="text" name="name" >
            <input type="submit" value="作成">
        </form>
    </section>
    <section>
        <h2>掲示板一覧</h2>
        <ul>
            @foreach ($posts as $post)
            <li><a href="/post/{{$post->id}}">{{$post->name}}</a></li>
            @endforeach
        </ul>
    </section>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</body>
</html>
