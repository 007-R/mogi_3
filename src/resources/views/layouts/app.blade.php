<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class='logo'>
            <p>COACHTECH</p>
        </div>
        <div class='search_box'>
            <form>
            @csrf
            <input type='text' class='search' placeholder='何をお探しですか？'>
        </div>
        @guest
            <div class='login_box'>
                <a href='/login' class='header_text'>ログイン</a>
            </div>
            <div class='register_box'>
                <a href='/register' class='header_text'>会員登録</a>
            </div>
        @endguest
        @auth
            <div class='mypage_box'>
                <a href='/mypage' class='header_text'>マイページ</a>
            </div>
            <div class='logout_box'>
                <a href='/mypage' class='header_text'>マイページ</a>
            </div>
        @endauth
        <div class='listing_box'>
            <a href='listing' class='listing'>出品</a>
        </div>
    </header>
</body>
<main>
    @yield('content')
</main>

</html>