@extends('layouts.user-app')

@section('css')
@endsection

@section('content')
<div class="main__group">
    <h1 class="main__group-title">PiGLy</h1>
    <h2 class="main__group-subtitle">ログイン</h2>
    <form action="/login" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="email" name="email" value="" placeholder="メールアドレスを入力">
                </div>
                <div class="form__error">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__group-title">
                <span class="form__label">パスワード</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="password" name="password" value="" placeholder="パスワードを入力">
                </div>
                <div class="form__error">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button type="submit" class="form__button-submit">ログイン</button>
        </div>
    </form>
    <div class="main__group-link">
        <a href="{{route('register')}}">アカウント作成はこちら</a>
    </div>
</div>
@endsection