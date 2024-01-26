@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class='user_info'>
    <div class='user_image'>
        <img class='user_image' src='{{ asset("{$user_info->image}") }}'  >
    </div>
    <div class='user_name'>
        <h2>{{ $user_info -> name }}</h2>
    </div>
    <div class='modify_profile'>
        <a class='upload_button' href='/mypage/profile'>プロフィール編集する</a>
    </div>
</div>

<ul class="tab-area">
    <p class="tab active">出品した商品</p>
    <p class="tab">購入した商品</p>
    <p class="tab">ショップ</p>
</ul>
<hr>

<div class="panel-area">
    <div class="panel active">
        <div class='gallery'>
            @foreach($sell_items as $item)
            <div class='item_image'>
                <a href='/item/{{ $item->id }}'><img class='item_img' src='{{ asset("{$item->image}") }}'
                        alt='ITEM_IMG'></a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="panel">
        <div class='gallery'>
            @foreach($purchase_items as $p_item)
            <div class='item_image'>
                <a href='/item/{{ $p_item->id }}'><img class='item_img' src='{{ asset("{$p_item->item->image}") }} 'alt='ITEM_IMG'></a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="panel">
        <h2>開設中ショップ一覧</h2>
        <table class='shop_info'>
            <tr><th>ショップ名</th><th>出品</th></tr>
            @foreach($masters as $master)
            <tr><td>{{ $master -> name}}</td>
            <td><a href='/sell/{{ $master -> id }}'>URL</a></td></tr>
            @endforeach
        </table>
        <h2>ショップの新規開設</h2>
        <form method='post' action='/mypage/shop'>
            @csrf
            <p>ショップ名：<input type='text' name='name'></p>
            <p>パスワード：<input type='text' name='password'></p>
            <input type='hidden' name='user_id' value='{{ Auth::id() }}'>
            <button type='submit'>新規開設</button>
        </form>
        <h2>ショップ代表者のログイン</h2>
        <a href='/master/login'>click here!</a>
        <h2>スタッフを務めるショップ</h2>
                <table class='shop_info'>
                    <tr><th>ショップ名</th><th>出品</th><th>商品一覧</th></tr>
                    @foreach($staff as $member)
                    <tr><td>{{ $member -> master -> name}}</td><td><a href='/sell/{{ $member -> master -> id }}'>URL</a></td><td><a href='/shop/{{ $member -> master -> id }}'>URL</a></td></tr>
                    @endforeach
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function () {
        $('.tab').on('click', function () {
            $('.tab, .panel').removeClass('active');
            $(this).addClass('active');
            var index = $('.tab').index(this);
            $('.panel').eq(index).addClass('active');
        });
    });
</script>

@endsection