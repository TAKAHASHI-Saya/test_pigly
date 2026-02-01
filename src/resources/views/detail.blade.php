@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="content__header">
        <h2 class="content__header--title">Weight Log</h2>
    </div>
    <div class="form">
        <form action="{{route('update', ['weightLogId' => $weightLog->id])}}" method="post" class="form__group">
            @csrf
            @method('patch')
            <div class="form__group--item">
                <p>日付</p>
                <input type="date" name="date" value="{{old('date', $weightLog->date)}}">
            </div>
            <div class="form__group--error">
                @error('date')
                {{$message}}
                @enderror
            </div>
            <div class="form__group--item">
                <p>体重</p>
                <input type="number" name="weight" value="{{old('weight', $weightLog->weight)}}">kg
            </div>
            <div class="form__group--error">
                @error('weight')
                {{$message}}
                @enderror
            </div>
            <div class="form__group--item">
                <p>摂取カロリー</p>
                <input type="number" name="calories" value="{{old('calories', $weightLog->calories)}}">
            </div>
            <div class="form__group--error">
                @error('calories')
                {{$message}}
                @enderror
            </div>
            <div class="form__group--item">
                <p>運動時間</p>
                <input type="text" name="exercise_time" value="{{old('exercise_time', $weightLog->exercise_time)}}">
            </div>
            <div class="form__group--error">
                @error('exercise_time')
                {{$message}}
                @enderror
            </div>
            <div class="form__group--item">
                <p>運動内容</p>
                <textarea name="exercise_content">{{old('exercise_content', $weightLog->exercise_content)}}
                </textarea>
            </div>
            <div class="form__group--error">
                @error('exercise_content')
                {{$message}}
                @enderror
            </div>
            <div class="form__button">
                <div class="form__button--group">
                    <a href="{{route('admin')}}" class="form__button--back">戻る</a>
                    <button type="submit" class="form__button--update">更新</button>
                </div>
            </div>
        </form>
        <form action="{{route('destroy', ['weightLogId' => $weightLog->id])}}" method="post" class="form__delete">
            @csrf
            @method('delete')
            <button type="submit" class="form__delete--button">
                <i class="fas fa-trash trash"></i>
            </button>
        </form>
    </div>
</div>
@endsection