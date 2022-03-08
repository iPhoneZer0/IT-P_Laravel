<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <title>TOP画面</title>
</head>
<body>

<p>こんにちは

<!--正規のログインをした場合-->
@if (Auth::check()){{ \Auth::user()->name}}さん</p>

<p><a href="./logout">ログアウト</a></p>

<!--不正なリンクの場合-->
@else ゲストさん</p>

<p><a href="./login">ログイン</a>  <a href="./register">新規登録</a></p>

@endif

</form>

</body>
</html>