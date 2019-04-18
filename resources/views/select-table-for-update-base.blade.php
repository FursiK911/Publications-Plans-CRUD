@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <title>Обновить информацию в таблице</title>
@endsection

@section('title_content')
    <h1 class="text-center my-3">Обновить информацию в таблице</h1>
@endsection

@section('message')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="content mx-5 my-5">
            <form class="" action="{{ action('AdditionsToBaseController@select_table_for_update') }}" method="POST">

                {{ csrf_field() }}

                <div class="col-0 my-3">
                    <label for="table" class="sr-only">Таблица</label>
                    <input type="text" readonly class="form-control-plaintext" id="table" value="Cписок таблиц">
                </div>
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="table" data-width="100%">
                    <option disabled>Выберите таблицу</option>
                    <option value="discipline">Дисциплина</option>
                    <option value="type_publication">Вид издания</option>
                    <option value="name">Автор</option>
                </select>
                <div class="col my-5">
                    <button type="submit" class="btn btn-block btn-dark">Далее</button>
                </div>
            </form>
        </div>
    </div>
@endsection