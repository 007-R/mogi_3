@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items.css') }}">
@endsection

@section('content')
<div class='setting_menu'>
    <h2>支払い方法の変更</h2>
    <form method='get' action='/purchase/set/payment/{{$item_id}}'>
        @foreach($payments as $payment)
        <div>
            <input type='radio' name='payment_id' value='{{ $payment -> id }}'>
            <label>{{ $payment -> name }}</label>
        <div>
        @endforeach
        <input type='hidden' name='address_id' value="{{ $address_id}}">
    <button class='purchase_button' type='submit'>更新する</button>
    </form>
</div>

@endsection