@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/info_upload.css') }}">
@endsection

@section('content')
@if(session('message'))
<p class='message'>{{ session('message') }}</p>
@endif
<div class='input_form'>
    <div class='title'>
        <h1>プロフィール設定</h1>
    </div>
    <form class='login-form' method='post' action='/mypage/profile' enctype="multipart/form-data">
        @csrf
        <input type='hidden' name='user_id' value='{{Auth::id()}}'>

        <div class='profile_image'>
            <div class='image_area'>
                <img id="preview" class='profile_circle'
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
            </div>
            <div class='button_area'>
                <label class='upload_button'>
                    <input type='file' name='image' accept='image/*' onchange="previewImage(this);">画像を選択する
                </label>
            </div>
        </div>
            <h3>ユーザー名</h3>
            <div class='input_area'>
                <input name='user_name' value="{{ $user_info->name }}">
            </div>
            <h3>郵便番号</h3>
            <div class='input_area'>
                @if($user_info->address_id )
                <input name='postcode' value="{{ $user_info->address->postcode }}">
                @else
                <input name='postcode'>
                @endif
            </div>
            @error('postcode')
            <span class='error_message'>{{ $message }}</span>
            @enderror
            <h3>住所</h3>
            <div class='input_area'>
                @if($user_info->address_id )
                <input name='address' value="{{ $user_info->address->address }}">
                @else
                <input name='address' type='text'>
                @endif
            </div>
            @error('address')
            <span class='error_message'>{{ $message }}</span>
            @enderror
            <h3>建物名</h3>
            <div class='input_area'>
                @if($user_info->address_id )
                <input name='building' type='text' value="{{ $user_info->address->building }}">
                @else
                <input name='building' type='text'>
                @endif
            </div>

        <div class='button'>
            <button type='submit' class='action_button'>更新する</button>
        </div>
    </form>
</div>


<script>
    function previewImage(obj) {
        var fileReader = new FileReader();
        fileReader.onload = (function () {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
</script>
@endsection