@extends('plans.layouts.layout')

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
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
@endsection

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('plans') }}">
            <img class="img_logo" src="{{ asset('storage/img/logo.png') }}" width="50" height="50" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <label class="btn btn-secondary">
                        <a class="nav-link" href="{{ url('plans') }}">Просмотреть все издания</a>
                    </label>
                </li>
                <li class="nav-item">
                    <label class="btn btn-secondary">
                        <a class="nav-link" href="{{ url('/plans/create') }}">Новое издание</a>
                    </label>
                </li>
                <li class="nav-item dropdown">
                    <label class="btn btn-secondary active" href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a class="nav-link dropdown-toggle">Взаимодействия с базой</a>
                    </label>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add-to-base">Добавить в базу</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
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
                    <option value="discipline">Дисциплина</option>
                    <option value="type_publication">Вид издания</option>
                    <option value="name">Автор</option>
                </select>
                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="form-control" type="text" name="data" placeholder="Данные">
                    </div>
                    <div class="col mx-5 my-3">
                        <button type="submit" class="btn btn-dark mb-2">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection