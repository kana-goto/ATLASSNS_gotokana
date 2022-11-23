<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="images/atlas.png" class = "atlas"></a></h1>
            <div id="memu">
                <div class="menu-trigger">
                    <p class="auth"><?php $user = Auth::user(); ?>{{ $user->username }}  さん  <i class="fa fa-angle-down"></i>  <img src="/storage/{{ $user->images }}"></p>
                <div>
                <div class="nav-wrapper">
                  <ul>
                    <li ><a href="/top">HOME</a></li>
                    <li class="link"><a href="/profile">プロフィール編集</a></li>
                    <li ><a href="/logout">ログアウト</a></li>
                  </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="name"><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                <div class="contents">
                <p class="item">フォロー数</p>
                <p class="item">{{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <p class="btn-list"><a class="btn btn-primary" href="/followList" role="button">フォローリスト</a></p>
                <div class="contents">
                <p class="item">フォロワー数</p>
                <p class="item">{{ Auth::user()->followUsers()->get()->count() }}名</p>
                </div>
                <p class="btn-list"><a class="btn btn-primary" href="/followerList" role="button">フォロワーリスト</a></p>
            </div>
            <p class="btn-search"><a class="btn btn-primary" href="/search" role="button">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
