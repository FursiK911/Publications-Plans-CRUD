<!-- app/views/plans/create.blade.php -->
@extends('layouts.layout')

@section('head')
    @parent
    <title>Новое издание</title>
    <link rel="stylesheet" href="css/create.css">
@endsection

@section('title_content')
    <h1 class="text-center">Новое издание</h1>
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
        <form action="{{ action('PublicationPlanController@store') }}" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <label class="">Дисциплина</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="discipline_id" data-width="100%">
                        <option disabled>Выберите дисциплину</option>
                        @foreach($disciplines as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name_of_discipline }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Вид издания</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type_publication_id" data-width="100%">
                        <option disabled>Выберите вид издания</option>
                        @foreach($type_publication as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="namePublication">Название публикации</label>
                <input class="form-control" id="namePublication" type="text" name="name_of_publication" placeholder="Название публикации">
            </div>

            <div class="form-group">
                <label>Автор</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="author_id[]" multiple="multiple" data-width="100%">
                        <option disabled>Выберите автора</option>
                        @foreach($users as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    <small id="autorsHelp" class="form-text text-muted">Вы можете выбрать несколько авторов.</small>
                </div>
            </div>

                <div class="form-group">
                    <label>Формат бумаги</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="paper_size_id" data-width="100%">
                            <option disabled>Выберите формат бумаги</option>
                            @foreach($papers_size as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->format_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="numberPages">Кл-во страниц</label>
                    <input class="form-control" type="text" name="number_of_pages" id="numberPages" placeholder="Количество страниц">
                </div>

                <div class="form-group">
                    <label for="numberCopies">Тираж</label>
                    <input class="form-control" type="text" name="number_of_copies" id="numberCopies" placeholder="Тираж">
                </div>

                <div class="form-group">
                    <label>Обложка</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cover_id" data-width="100%">
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
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="month_of_submission_id" data-width="100%">
                            <option disabled>Выберите месяц</option>
                            @foreach($months as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->month_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            <div class="form-group">
                <label>Год выпуска</label>
                <div class="row-fluid">
                    <input class="form-control" type="text" name="year_of_publication" placeholder="Год выпуска">
                </div>
            </div>

                <div class="form-group">
                    <label for="numberPhone">Номер телефона</label>
                    <input class="form-control" type="text" name="phone_number" id="numberPhone" placeholder="Номер телефона">
                </div>
                <button type="submit" class="btn btn-block btn-dark my-5">Создать</button>
        </form>
        </div>
    </div>
@endsection



