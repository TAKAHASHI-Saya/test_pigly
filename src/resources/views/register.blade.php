@extends('layouts.user-app')

@section('css')
@endsection

@section('content')
<div class="main__group">
    <h1 class="main__group-title">PiGLy</h1>
    <h2 class="main__group-subtitle">新規会員登録</h2>
    <p class="main__group-lead">STEP1 アカウント情報の登録</p>
    <form action="/register" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="text" name="name" value="{{old('name')}}" placeholder="名前を入力">
                </div>
                <div class="form__error">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__group-title">
                <span class="form__label">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="email" name="email" value="{{old('email')}}" placeholder="メールアドレスを入力">
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
                    <input type="password" name="password" placeholder="パスワードを入力">
                </div>
                <div class="form__error">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button type="submit" class="form__button-submit">次に進む</button>
        </div>
    </form>
    <div class="main__group-link">
        <a href="{{route('login')}}">ログインはこちら</a>
    </div>
</div>
@endsection