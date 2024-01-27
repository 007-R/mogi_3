@extends('layouts.sub_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/info_upload.css') }}">
@endsection

@section('content')

@if (Auth::guard('admins')->check())
    <div>管理者 {{ Auth::guard('admins')->user()->name }}でログイン中</div>
@endif

@if ( session('message'))
<div><p>{{ session('message') }}</p></div>
@endif

<div class='input_form'>
    <div class='title'>
        <h1>ユーザー一覧</h1>
    </div>
    <table>
        <tr><th>ユーザー名</th><th>削除ボタン</th><th>メッセージ</th><th>メール送信ボタン</th></tr>
        @foreach($users as $user)
            <tr><td>{{ $user -> name}}</td>
                <td>
                    <form class='delete' method='post' action='/admin/delete'>
                    @csrf
                    <input type='hidden' name='user_id' value='{{$user -> id}}'>
                    <button type='submit'>削除</button>
                    </form></td>
                <td>
                    <form class='mail_message' method='post' action='/admin/mail'>
                    @csrf
                    <input type='hidden' name='name' value='{{$user -> name}}'>
                    <input type='hidden' name='email' value='{{$user -> email}}'>
                    <input type='text' name='message'></td>
                    <td><button type='submit'>送信ボタン</button>
                    </form></td>
            </tr>
        @endforeach
    </table>


        <div>
            <form class='form' action='/logout' method='post'>
                @csrf
                <button class="logout_button" type='submit'><a>Logout</a></button>
            </form>
        </div>


</div>


@endsection