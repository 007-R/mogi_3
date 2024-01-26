<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @yield('css')

    <script>
    $(function () {
        $('.Toggle').click(function () {
            $(this).toggleClass('active');
            $('.menu').toggleClass('open');
        });
    });
    </script>
</head>

<body>
    <header class="header">
    <nav>
    <div class='drawer'>
        <div class='logo_area'>
            <a href='/'><img class='logo' src="{{ asset('storage/icon/CoachTech.jpg') }}" alt='logo_image'></a>
        </div>
        <div class='search_box'>
            <form method='post' action='/search'>
            @csrf
            <input type='text' class='search' name='keyword' placeholder='何をお探しですか？'>
            </form>
        </div>
        <div class='Toggle'>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
        <div class='menu'>
            <ul class='menu_content'>
            @guest
                <li><a href='/login' class='header_text'>ログイン</a></li>
                <li><a href='/register' class='header_text'>会員登録</a></li>
            @endguest
            @auth
                <li><a href='/mypage' class='header_text'>マイページ</a></li>
                <li><form class="form" action="/logout" method="post">
                @csrf
                <button class="header_text">ログアウト</button></form></li>
            @endauth
                <li><a href='/sell' class='listing'>出品</a></li>
            </ul>
        </div>
    </nav>
    </header>
</body>
<main>
    @yield('content')
</main>


</html>