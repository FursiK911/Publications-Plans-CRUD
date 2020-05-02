@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <title>Добавить информацию в таблицу</title>
@endsection

@section('title_content')
    <h1 class="text-center my-3">Добавить информацию в таблицу</h1>
@endsection

@section('message')
    <!-- will be used to show any messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="content mx-5">
            <form class="" action="{{ action('AdditionsToBaseController@store') }}" method="POST">

                {{ csrf_field() }}

                <div class="col-0 my-3">
                    <label for="table" class="sr-only">Таблица</label>
                    <input type="text" readonly class="form-control-plaintext" id="table" value="Cписок таблиц">
                </div>
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="table" data-width="100%">
                    <option disabled>Выберите таблицу</option>
                    <option value="chair">Кафедра</option>
                    <option value="discipline">Дисциплина</option>
                    <option value="type_publication">Вид издания</option>
                    <option value="name">Автор</option>
                </select>
                <div class="form-row">
                    <div class="col-10 my-3">
                        <input class="form-control" type="text" name="data" placeholder="Данные">
                    </div>
                    <div class="col mx-3 my-3">
                        <button type="submit" class="btn btn-dark mb-2">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
