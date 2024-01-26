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
                @if($favorite)
                    <img class='function_img' type='image' src="{{ asset('storage/icon/favorite_active.png') }}" alt='favorite'>
                <p class='function_number'>{{$favorite_count}}</p>
                @else
                    <img class='function_img' type='image' src="{{ asset('storage/icon/favorite_inactive.png') }}" alt='favorite'>
                <p class='function_number'>{{$favorite_count}}</p>
                @endif
            </div>
            <div class='comment'>
                <img class='function_img' type='image' src="{{ asset('storage/icon/comment.png') }}" alt='comment'>
                <p class='function_number'>{{ $comment_count }}</p>
            </div>
        </div>
        <div class='comment_history'>
            @foreach($comments as $comment)
                @if( $comment -> user_id == Auth::id())
                    <div class='owner'>
                        @if($comment->user->name)
                        <span >{{ $comment->user->name }}</span>
                        @else
                        <span>名称未登録</span>
                        @endif
                        <form method='post' action='/item/{{$item->id}}/comment/delete'>
                        @csrf
                        <input type='hidden' name='comment_id' value="{{ $comment->id }}">
                        <input type='hidden' name='item_id' value="{{ $comment->item_id }}">
                        @if($comment->user->name)
                        <input type='image' class='user_img' src="{{ asset($comment->user->image) }}" alt='user_img'>
                        @else
                        <input type='submit' class='user_img' value=''>
                        @endif
                        </form>
                    </div>
                    <p class='comment_content'>{{ $comment->content }}</p>
                @else
                    <img class='user_img' src="{{ asset($comment->user->image) }}" alt='user_img'>
                    <span>{{ $comment->user->name }}</span>
                    <p class='comment_content'>{{ $comment->content }}</p>
                @endif
            @endforeach
        </div>
        <div class=comment_area>
            <p class='sub_title'>商品へのコメント</p>
            <form method='post' action='/item/{{$item->id}}/comment'>
            @csrf
            <input name='content' class='comment_input' type=text>
            <input name='item_id' value='{{ $item -> id }}' type='hidden'>
            <div class='purchase_button'>
                <button class='button_text' type='submit'>コメントを送信する</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection
