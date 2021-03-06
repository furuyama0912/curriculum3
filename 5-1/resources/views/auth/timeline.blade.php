<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SNSを作ってみよう！</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body style="height:100%; background-color: #E6ECF0;">
        <div style="background-color:white;height:50px;font-size:20px;text-align:center;line-height:50px;margin-bottom:10px;">
        Mutter　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　{{$auths->name}}▼
        </div>
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
            <form action="/timeline" method="post">
            {{ csrf_field() }}
                <div style="background-color: #E8F4FA; text-align: center;">
                    <input type="text" name="tweet" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="今どうしてる？">
                    <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">ツイート</button>
                </div>
                @if($errors->first('body')) <!-- 追加 -->
                    <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('body')}}</p>
                @endif
            </form>

            <div class="tweet-wrapper"> <!-- この辺追加 -->
                @foreach($snss as $sns)
                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                    <div>{{$sns['body']}}</div>
                    <div>作成者:　{{$sns['name']}}</div>
                    <div>作成日:　{{$sns['created_at']}}</div>
                    @if($auths->id === $sns['user_id'])
                    <form method="post"  method="post" action="/timeline/{{$sns['id']}}" >
                    {{ csrf_field() }}
                    <input type="submit" value="削除" class="btn btn-danger btn-sm" ;>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>