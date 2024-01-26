@extends('layouts.sub_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/info_upload.css') }}">
@endsection

@section('content')
<div class='input_form'>
    <div class='title'>
        @if(isset($shop_name))
            <h1>{{ $shop_name->name }}への出品</h1>
        @else
            <h1>商品の出品</h1>
        @endif
    </div>
    <form class='login-form' method='post' action='/sell' enctype="multipart/form-data">
        @csrf
        <input type='hidden' name='user_id' value='{{Auth::id()}}'>

        <div class='image'>
            <h3>商品画像</h3>
            <div class='image_upload'>
                <label class='upload_button'>
                    <input type='file' name='image' accept='image/*' onchange="previewImage(this);">画像を選択する
                </label>
                <img id="preview" class='preview_image'
                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
            </div>
        </div>
        <div class='error_message'>
        @error('image')
        {{ $message }}
        @enderror
        </div>
        <h2 class='sub_title'>商品の説明</h2>
        <div class=''>
            <h3>カテゴリー１（ジャンル）</h3>
            <div class='select_area'>
                <select name='genre_category_id'>
                    @foreach($genre_categories as $g_category)
                        <option value='{{$g_category->id}}'>{{$g_category->name}}</option>
                    @endforeach
                </select>
            </div>
            <h3>カテゴリー２（対象）</h3>
            <div class='select_area'>
                <select name='sex_category_id'>
                    @foreach($sex_categories as $s_category)
                    <option value='{{$s_category->id}}'>{{$s_category->name}}</option>
                    @endforeach
                </select>
            </div>
            <h3>カラー</h3>
            <div class='select_area'>
                <select name='color_id'>
                    @foreach($colors as $color)
                    <option value='{{$color->id}}'>{{$color->name}}</option>
                    @endforeach
                </select>
            </div>
            <h3>商品の状態</h3>
            <div class='select_area'>
                <select name='state_id'>
                    @foreach($states as $state)
                    <option value='{{$state->id}}'>{{$state->name}}</option>
                    @endforeach
                </select>
            </div>
            <h3>ブランド</h3>
            <div class='select_area'>
                <select name='brand_id'>
                    @foreach($brands as $brand)
                    <option value='{{$brand->id}}'>{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <h3>出荷情報</h3>
            <div class='select_area'>
                <select name='shipping_id'>
                    @foreach($shippings as $shipping)
                    <option value='{{$shipping->id}}'>{{$shipping->description}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <h2 class='sub_title'>商品名と説明</h2>
            <h3>商品名</h3>
            <div class='input_area'>
                <input name='name'>
            </div>
            <div class='error_message'>
            @error('name')
            {{ $message }}
            @enderror
            </div>
            <h3>商品の説明</h3>
            <div class='input_area'>
                <input class='description' name='description'>
            </div>
            <div class='error_message'>
            @error('description')
            {{ $message }}
            @enderror
            </div>
            <h2 class='sub_title'>販売価格</h2>
            <h3>販売価格</h3>
            <div class='input_area'>
                <input name='price' type='number' placeholder='¥'>
            </div>
            <div class='error_message'>
            @error('price')
            {{ $message }}
            @enderror
            </div>
            @if(isset($shop_name))
            <input type='hidden' name='master_id' value='{{ $shop_name->id }}'>
            @endif
        <div class='button'>
            <button type='submit' class='action_button'>出品する</button>
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