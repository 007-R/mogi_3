@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<div class='info'>
    <div class='basic_info'>
        <div class='item_info'>
            <div class='item_image'>
                <img class='item_img'  src='{{ asset("{$item->image}") }}' alt='ITEM_IMG'>
            </div>
            <div class='item_contents'>
                <h2>{{ $item->name }}</h2>
                <h3>¥{{ $item->price }}</h3>
            </div>
        </div>

        <div class='payment_info'>
            <div><h3>支払い方法</h3></div>
            <form method='get' action='/purchase/setting/payment/{{$item->id}}'>
                @csrf
                <input type='hidden' name='payment_id' value='{{ $payment->id }}'>
                <input type='hidden' name='address_id' value='{{ $address->id }}'>
                <button class='purchase_button' type='submit'>変更する</button>
            </form>
        </div>
        <div>
            @if(($payment))
            <p>{{$payment->name}}</p>
            @endif
        </div>
        <div class='shipping_info'>
            <div><h3>配送先</h3></div>
            <form method='get' action='/purchase/setting/address/{{$item->id}}'>
                @csrf
                <input type='hidden' name='payment_id' value='{{ $payment->id }}'>
                <input type='hidden' name='address_id' value='{{ $address->id }}'>
                <button class='purchase_button' type='submit'>変更する</button>
            </form>
            <input type='hidden' name='address_id' value="{{$address -> id}}">
        </div>
        <div>
            @if(($address))
            <p>{{$address->postcode}} {{$address->address}} {{$address->building}} </p>
            @endif
        </div>
    </div>
    <div class='side_info'>
        <table class='confirmation_table'>
            <tr><td>商品代金</td><td>¥{{ $item->price }}</td></tr>
            <tr><td>支払い金額</td><td>¥{{ $item->price }}</td></tr>
            <tr><td>支払い方法</td><td></td></tr>
        </table>
        <form method='post' action='/purchase/order/{{$item->id}}'>
            @csrf
            <input type='hidden' name='item_id' value='{{$item -> id}}'>
            <input type='hidden' name='user_id' value='{{ Auth::check() }}'>
            <input type='hidden' name='address_id' value='{{ $address->id }}'>
            <input type='hidden' name='payment_id' value='{{ $payment -> id }}'>

            <button class='purchase_button' type='submit'>購入する</button>
        </form>
    </div>
</div>

<p>{{request() -> address_id }}</p>
<p>{{request() -> payment_id }}</p>
@endsection
