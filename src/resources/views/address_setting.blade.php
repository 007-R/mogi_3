@extends('layouts.sub_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/info_upload.css') }}">
@endsection

@section('content')
<div class='input_form'>
    <div class='title'>
        <h1>住所の変更</h1>
    </div>
    <form class='login-form' method='get' action='/purchase/set/address/{{$item_id}}'>
        @csrf
        <input type='hidden' name='user_id' value='{{Auth::id()}}'>
            <h3>郵便番号</h3>
            <div class='input_area'>
                <input name='postcode' value='ダミー'>
            </div>
            <h3>住所</h3>
            <div class='input_area'>
                <input name='address' value='ダミー'>
            </div>
            <h3>建物名</h3>
            <div class='input_area'>
                <input name='building' type='text' value='マンション' placeholder='マンション'>
            </div>
        <div class='button'>
            <button type='submit' class='action_button'>更新する</button>
        </div>
    </form>
</div>


@endsection