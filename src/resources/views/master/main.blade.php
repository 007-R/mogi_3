@extends('layouts.sub_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/info_upload.css') }}">
@endsection

@section('content')

@if (Auth::guard('masters')->check())
    <div>店舗 {{ Auth::guard('masters')->user()->name }}でログイン中</div>
@endif

@if ( session('message'))
<div><p>{{ session('message') }}</p></div>
@endif

<div class='input_form'>
    <div class='title'>
        <h1>店舗スタッフ</h1>
    </div>
    <table>
        <tr><th>ユーザー名</th><th>削除ボタン</th></tr>
        @foreach($staff as $member)
            <tr><td>{{ $member['user']['name'] }}</td>
                <td>
                    <form class='delete' method='post' action='/master/delete'>
                    @csrf
                    <input type='hidden' name='user_id' value='{{$member -> user_id}}'>
                    <input type='hidden' name='master_id' value='{{Auth::id()}}'>
                    <button type='submit'>削除</button>
                    </form></td>
            </tr>
        @endforeach
    </table>
    <div class='title'>
        <h1>招待可能ユーザー</h1>
    </div>
    <table>
        <tr>
            <th>ユーザー名</th>
            <th>招待ボタン</th>
        </tr>
        @foreach($potential_staff as $user)
        <tr>
            <td>{{ $user['name'] }}</td>
            <td>
                <form class='delete' method='post' action='/master/add'>
                    @csrf
                    <input type='hidden' name='user_id' value='{{$user -> id}}'>
                    <input type='hidden' name='master_id' value='{{ Auth::id() }}'>
                    <button type='submit'>招待</button>
                </form>
            </td>
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