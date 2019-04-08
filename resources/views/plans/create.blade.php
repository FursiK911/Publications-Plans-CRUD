<!-- app/views/plans/create.blade.php -->
@extends('plans.layouts.layout')

@section('head')
    @parent
    <title>Создать новый план</title>
@endsection

@section('title_content')
    <h1 class="text-center">Создать новый план</h1>
@endsection


@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('plans') }}">
            <img class="img_logo" src="img/logo.png" width="50" height="50" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <label class="btn btn-secondary">
                        <a class="nav-link" href="{{ url('plans') }}">Показать все планы</a>
                    </label>
                </li>
                <li class="nav-item">
                    <label class="btn btn-secondary active">
                        <a class="nav-link" href="{{ url('/plans/create') }}">Создать новый план</a>
                    </label>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 text-light border-light" type="submit">Search</button>
            </form>
        </div>
    </nav>
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
    <form action="{{ action('PublicationPlanController@store') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Дисциплина</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="discipline_id">
                    <option disabled>Выберите дисциплину</option>
                    @foreach($disciplines as $key => $value)
                        <option value="{{ $value->id }}" >{{ $value->name_of_discipline }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Вид издания</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type_publication_id">
                    <option disabled>Выберите вид издания</option>
                    @foreach($type_publication as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Название публикации</label>
            <input type="text" name="name_of_publication">
        </div>

        <div class="form-group">
            <label>Автор</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="author_id[]" multiple="multiple">
                    <option disabled>Выберите автора</option>
                    @foreach($users as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Формат бумаги</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="paper_size_id">
                        <option disabled>Выберите формат бумаги</option>
                        @foreach($papers_size as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->format_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Кл-во страниц</label>
                <input type="text" name="number_of_pages">
            </div>

            <div class="form-group">
                <label>Тираж</label>
                <input type="text" name="number_of_copies">
            </div>

            <div class="form-group">
                <label>Обложка</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cover_id">
                        <option disabled>Выберите обложку</option>
                        @foreach($cover as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->cover_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Месяц выпуска</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="month_of_submission_id">
                        <option disabled>Выберите месяц</option>
                        @foreach($months as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->month_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Номер телефона</label>
                <input type="text" name="phone_number">
            </div>
            <button type="submit" class="btn btn-dark">Создать</button>
    </form>
@endsection

    @section('script')
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/i18n/defaults-*.min.js"></script>
    @endsection


