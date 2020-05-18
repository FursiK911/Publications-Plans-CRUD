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
                <small id="autorsHelp" class="form-text text-muted">Выберите таблицу, далее введите заполните данные и нажмите "Добавить"</small>
                <div class="form-row">
                    <div class="col-12 my-3">
                        <input id="field_1" class="form-control" type="text" name="field_1">
                        <input id="field_2" class="form-control" type="text" name="field_2">
                        <input id="field_3" class="form-control" type="text" name="field_3">
                        <div id="table_combobox_2">
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type_user" data-width="100%">
                                <option disabled>Выдайте роль пользователю</option>
                                <option value="user">Пользователь</option>
                                <option value="moderator">Модератор</option>
                                <option value="administrator">Администратор</option>
                            </select>
                            <small id="autorsHelp" class="form-text text-muted">Данное поле отображает, какие права будут даны новому пользователю</small>
                        </div>
                        <div id="table_combobox_3">
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="user_author" data-width="100%">
                                <option disabled>Поставьте соответствие с автором</option>
                                @foreach($authors as $key => $value)
                                    <option value="{{ $value->id }}">{{$value->last_name . ' ' . $value->name . ' ' . $value->middle_name}}</option>
                                @endforeach
                            </select>
                            <small id="autorsHelp" class="form-text text-muted">Данное поле ставит соответствие с автором. Пользователь без прав администратора или модератора может редактировать только свои методические издания</small>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="add_new_authors" name="add_new_authors">
                            <label class="form-check-label" for="exampleCheck1">Создать нового автора для этого пользователя</label>
                        </div>
                        <input id="field_4" class="form-control" type="text" name="field_4">
                        <input id="field_5" class="form-control" type="text" name="field_5">
                        <input id="field_6" class="form-control" type="text" name="field_6">
                    </div>
                </div>
                <div class="col my-5">
                    <button type="submit" class="btn btn-block btn-dark">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/select_value_in_combobox.js') }}"></script>
@endsection
