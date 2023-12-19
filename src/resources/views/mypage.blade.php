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
        @if(Auth::check())
        <div class='gallery'>
            @foreach($purchase_items as $p_item)
            <div class='item_image'>
                <a href='/item/{{ $p_item->id }}'><img class='item_img' src='{{ asset("{$p_item->item->image}") }} 'alt='ITEM_IMG'></a>
            </div>
            @endforeach
        </div>
        @else
        @endif
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