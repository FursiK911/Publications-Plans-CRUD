@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <title>Удалить информацию из таблицы</title>
@endsection

@section('title_content')
    <h1 class="text-center my-3">Удалить информацию из таблицы</h1>
@endsection

@section('message')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

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
        <div class="content mx-5 my-5">
            <form class="" action="{{ action('AdditionsToBaseController@destroy') }}" method="POST">

                {{ csrf_field() }}

                <label for="table_combobox" class="sr-only">Cписок таблиц</label>
                <select id="table_combobox" class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_table" data-width="100%">
                    <option disabled>Выберите таблицу</option>
                    <option value="chair">Кафедра</option>
                    <option value="discipline">Дисциплина</option>
                    <option value="type_publication">Вид издания</option>
                    <option value="author">Автор</option>
                    <option value="user">Пользователь</option>
                </select>
                <div id="additional_block">
                    <select id="table_combobox_2" class="selectpicker" data-show-subtext="true" data-live-search="true" name="id" data-width="100%">
                    </select>
                </div>
                <div class="col my-5">
                    <button type="submit" class="btn btn-block btn-dark">Далее</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/update_table.js') }}"></script>
@endsection
