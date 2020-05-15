@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/add-to-base.css">
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
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
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
                <select id="table_combobox" class="selectpicker" data-show-subtext="true" data-live-search="true" name="table" data-width="100%">
                    <option disabled>Выберите таблицу</option>
                    <option value="chair">Кафедра</option>
                    <option value="discipline">Дисциплина</option>
                    <option value="type_publication">Вид издания</option>
                    <option value="author">Автор</option>
                    <option value="user">Пользователь</option>
                </select>
                <div class="form-row">
                    <div class="col-12 my-3">
                        <input id="field_1" class="form-control" type="text" name="field_1">
                        <input id="field_2" class="form-control" type="text" name="field_2">
                        <input id="field_3" class="form-control" type="text" name="field_3">
                        <input id="field_4" class="form-control" type="text" name="field_4">
                        <input id="field_5" class="form-control" type="text" name="field_5">
                        <input id="field_6" class="form-control" type="text" name="field_6">
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mb-2">Добавить</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/select_value_in_combobox.js') }}"></script>
@endsection
