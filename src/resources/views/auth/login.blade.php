@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/entrance.css') }}">
@endsection

@section('content')
<div class='input_form'>
    <div class='title'><h2>ログイン</h2></div>
    <form class='login-form' method='post' action='/login'>
        @csrf
        <div class='input_space'>
        <div class='email_input'>
            <p class='sub_title'>メールアドレス</p>
            <input name='email' type='email' placeholder='Email', value="{{old('email')}}">
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
        <div class='link'>
            <a href='/register'>会員登録はこちら
            </a>
        </div>
    </form>
</div>
@endsection