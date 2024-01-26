@extends('layouts.sub_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<h2>{{ $shop_name['name'] }}の商品一覧<h2>
<div class="panel-area">
    <div class="panel active">
        <div class='gallery'>
            @foreach($items as $item)
            <div class='item_image'>
                <a href='/item/{{ $item->id }}/comment'><img class='item_img'  src='{{ asset("{$item->image}") }}' alt='ITEM_IMG'></a>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection

