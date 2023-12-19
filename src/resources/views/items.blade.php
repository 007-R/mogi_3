@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<ul class="tab-area">
    <p class="tab active">おすすめ</p>
    <p class="tab">マイリスト</p>
</ul>
<hr>

<div class="panel-area">
    <div class="panel active">
        <div class='gallery'>
            @foreach($items as $item)
            <div class='item_image'>
                <a href='/item/{{ $item->id }}'><img class='item_img'  src='{{ asset("{$item->image}") }}' alt='ITEM_IMG'></a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="panel">
        @if(Auth::check())
            <div class='gallery'>
                @foreach($favorite_items as $f_item)
                <div class='item_image'>
                    <a href='/item/{{ $f_item->id }}'><img class='item_img' src='{{ asset("{$f_item->image}") }}' alt='ITEM_IMG'></a>
                </div>
                @endforeach
            </div>
            @else
            <p>not login yet!</p>
        @endif
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function() {
    $('.tab').on('click', function() {
    $('.tab, .panel').removeClass('active');
    $(this).addClass('active');
    var index = $('.tab').index(this);
    $('.panel').eq(index).addClass('active');});
});
</script>

@endsection

