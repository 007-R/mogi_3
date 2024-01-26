@extends('layouts.sub_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/entrance.css') }}">
@endsection

@section('content')
<div class='input_form'>
    <div class='title'><h2>店舗代表者ログイン</h2></div>
    <form class='login-form' method='post' action='/master/login'>
        @csrf
        <div class='input_space'>
        <div class='email_input'>
            <p class='sub_title'>店舗名</p>
            <input name='name' placeholder='shop name'>
        </div>
        </div>
        <div class="form__error">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div class='input_space'>
        <div class='password_input'>
            <p class='sub_title'>パスワード</p>
            <input name='password' type='password' placeholder='Password'>
        </div>
        </div>
        <div class="form__error">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div class='button'>
            <button type='submit' class='action_button'>ログインする</button>
        </div>
    </form>
</div>
@endsection