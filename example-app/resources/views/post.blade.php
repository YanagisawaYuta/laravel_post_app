<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板アプリ|掲示板</title>
</head>
<body>
    <span>こんにちは {{$user->name}}さん</span>
    <span><a href="/">トップへ戻る</a></span>
    <h1>{{$theme->name}}</h1>

    <section>
        <h2>コメント</h2>
        <div>
            @foreach ($comments as $comment)
            <span style="font-size: 12px">{{$loop->iteration}}. {{$comment->name}}</span>
            <div style="font-weight: bold">{{$comment->comment}}</div>
            @endforeach
        </ul>
    </section>

    <section>
        <h2>投稿</h2>
        <form action="/comment/add" method="POST">
            @csrf
            <input type="text" name="comment" >
            <input type="hidden" name="theme_id" value="{{$theme->id}}">
            <input type="submit" value="追加">
        </form>
    </section>
</body>
</html>
