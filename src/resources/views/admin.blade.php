@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<div class="main">
    <div class="heading">
        <div class="heading__content">
            <span class="heading__content-title">目標体重</span>
            <span class="heading__content-item">
                {{$targetWeight}}
            </span>
            <span class="heading__content-subitem">kg</span>
        </div>
        <div class="heading__content">
            <span class="heading__content-title">目標まで</span>
            <span class="heading__content-item">
                {{$difference}}
            </span>
            <span class="heading__content-subitem">kg</span>
        </div>
        <div class="heading__content">
            <span class="heading__content-title">最新体重</span>
            <span class="heading__content-item">
                {{$currentWeight}}
            </span>
            <span class="heading__content-subitem">kg</span>
        </div>
    </div>
    <div class="content">
        <div class="content__control">
            <div class="search__group">
                <form action="/weight_logs/search" method="get" class="search-form">
                    <input type="date" name="start_date" value="{{$startDate ?? ''}}" class="search-form__input">
                    <span class="search-form__item">〜</span>
                    <input type="date" name="end_date" value="{{$endDate ?? ''}}" class="search-form__input">
                    <button type="submit" class="search-form__button">検索</button>
                </form>
            </div>
            <div class="control-link">
                <a href="#weight-modal" class="control-link__button">データ追加</a>
            </div>
        </div>
        <div class="content__table">
            <table class="table__inner">
                <tr class="table__row">
                    <th class="table__header">
                        <span class="table__header--span">日付</span>
                    </th>
                    <th class="table__header">
                        <span class="table__header--span">体重</span>
                    </th>
                    <th class="table__header">
                        <span class="table__header--span">食事摂取カロリー</span>
                    </th>
                    <th class="table__header">
                        <span class="table__header--span">運動時間</span>
                    </th>
                    <th class="table__header"></th>
                </tr>
                @foreach($weightLogs as $weightLog)
                <tr class="table__row">
                    <td class="table__item">
                        {{$weightLog['date']}}
                    </td>
                    <td class="table__item">
                        {{$weightLog['weight']}}kg
                    </td>
                    <td class="table__item">
                        {{$weightLog['calories']}}kcal
                    </td>
                    <td class="table__item">
                        {{$weightLog['exercise_time']}}
                    </td>
                    <td class="table__item">
                        <a href="{{route('detail', ['weightLogId' => $weightLog->id])}}" class="modal-button">
                            <i class="fas fa-pencil-alt pencil"></i>
                        </a>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
        <div class="content__pagination">
            {{$weightLogs->links()}}
        </div>

        <!-- データ追加用モーダル -->
        <div class="modal" id="weight-modal">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal__inner">
                <div class="modal__content">
                    <h2 class="modal__header">Weight Logを追加</h2>
                    <form action="/weight_logs/create" method="post" class="modal-form">
                        @csrf
                        <div class="modal-form__group">
                            <div class="label-group">
                                <label>日付</label>
                                <span>必須</span>
                            </div>
                            <input type="date" name="date" value="{{old('date')}}">
                            <div class="modal-form__error">
                                @error('date')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="modal-form__group">
                            <div class="label-group">
                                <label>体重</label>
                                <span>必須</span>
                            </div>
                            <input type="number" step="0.1" name="weight" placeholder="50.0" value="{{old('weight')}}">kg
                            <div class="modal-form__error">
                                @error('weight')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="modal-form__group">
                            <div class="label-group">
                                <label>摂取カロリー</label>
                                <span>必須</span>
                            </div>
                            <input type="number" name="calories" placeholder="1200" value="{{old('calories')}}">kcal
                            <div class="modal-form__error">
                                @error('calories')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="modal-form__group">
                            <div class="label-group">
                                <label>運動時間</label>
                                <span>必須</span>
                            </div>
                            <input type="text" name="exercise_time" placeholder="00:00" value="{{old('exercise_time')}}">
                            <div class="modal-form__error">
                                @error('exercise_time')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="modal-form__group">
                            <div class="label-group">
                                <label>運動内容</label>
                            </div>
                            <textarea name="exercise_content" placeholder="運動内容を追加" value="{{old('exercise_content')}}"></textarea>
                            <div class="modal-form__error">
                                @error('exercise_content')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="modal-form__button">
                            <a href="{{route('admin')}}" class="modal-form__button--back">戻る</a>
                            <button type="submit" class="modal-form__button--register">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if($errors->any())
<script>
    window.location.hash = 'weight-modal';
</script>
@endif
@endsection