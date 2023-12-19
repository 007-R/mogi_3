@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item_detail.css') }}">
@endsection

@section('content')

<div class='item_info'>
    <div class='item_image'>
        <img class='item_img'  src='{{ asset("{$item->image}") }}' alt='ITEM_IMG'>
    </div>
    <div class='item_contents'>
        <h2>{{ $item->name }}</h2>
        <p>{{ $item->brand->name }}</p>
        <h3>¥ {{ $item->price }}(値段)</h3>
        <div class='function_area'>
            <div class='favorite'>
                @if(Auth::check())
                    @if($favorite)
                        <form method='post' action='/item/{{$item->id}}/unfavorite'>
                        @csrf
                        <input type='hidden' name='item_id' value='{{ $item->id }}'>
                        <input class='function_img' type='image' src="{{ asset('storage/icon/favorite_active.png') }}" alt='favorite'>
                    </form>
                    @else
                        <form method='post' action='/item/{{$item->id}}/favorite'>
                        @csrf
                        <input type='hidden' name='item_id' value='{{ $item->id }}'>
                        <input class='function_img' type='image' src="{{ asset('storage/icon/favorite_inactive.png') }}" alt='favorite'>
                    </form>
                    @endif
                @else
                    <img class='function_img' src="{{ asset('storage/icon/favorite_inactive.png') }}" alt='favorite'>
                @endif
                <p class='function_number'>{{$favorite_count}}</p>
            </div>
            <div class='comment'>
                @if(Auth::check())
                    <a href='/item/{{$item->id}}/comment' ><img src="{{ asset('storage/icon/comment.png') }}" alt='comment' class='function_img'></a>
                @else
                    <img src="{{ asset('storage/icon/comment.png') }}" alt='comment' class='function_img'>
                @endif
                <p class='function_number'>{{ $comment_count }}</p>
            </div>
        </div>
        <div class='purchase_button'>
            <form method='get' action='/purchase/{{ $item->id }}'>
                @csrf
                <button class='button_text' type='submit'>購入する</button>
            </form>
        </div>
        <h2>{{ $item->description }}</h2>
        <p>カラー：{{ $item->color->name }}</p>
        <p>{{ $item->state->name }}</p>
        <p>{{ $item->state->description }}</p>
        <h2>商品の情報</h2>
        <div class='c'>
            <p class='sub_title'>カテゴリー：</p>
            <p class='category'>{{ $item->genre_category->name }}</p>
            <p class='category'>{{ $item->sex_category->name }}</p>
        </div>
        <span class='sub_title'>商品の状態：</span>
        <span>{{ $item->state->name }}</span>
    </div>
</div>



@endsection
