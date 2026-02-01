@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{asset('css/weight-goal.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="content__header">
        <h2 class="content__header--title">目標体重設定</h2>
    </div>
    <div class="form">
        <form action="{{route('goal-update')}}" method="post" class="form__group">
            @csrf
            @method('patch')
            <div class="form__group--item">
                <input type="number" name="target_weight" value="{{old('target_weight', $weightTarget->target_weight)}}">kg
                <div class="form__group--error">
                    @error('target_weight')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <a href="{{route('admin')}}" class="form__button--back">戻る</a>
                <button type="submit" class="form__button--update">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection