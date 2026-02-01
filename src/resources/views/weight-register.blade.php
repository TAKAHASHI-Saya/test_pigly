@extends('layouts.user-app')

@section('css')
@endsection

@section('content')
<div class="main__group">
    <h1 class="main__group-title">PiGLy</h1>
    <h2 class="main__group-subtitle">新規会員登録</h2>
    <p class="main__group-lead">STEP2 体重データの入力</p>
    <form action="/register/step2" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">現在の体重</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="number" step="0.1" name="weight" value="{{old('weight')}}" placeholder="現在の体重を入力">
                    <span>kg</span>
                </div>
                <div class="form__error">
                    @error('weight')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__group-title">
                <span class="form__label">目標の体重</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="number" step="0.1" name="target_weight" value="{{old('target_weight')}}" placeholder="目標の体重を入力">
                    <span>kg</span>
                </div>
                <div class="form__error">
                    @error('target_weight')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button type="submit" class="form__button-submit">アカウント作成</button>
        </div>
    </form>
</div>
@endsection