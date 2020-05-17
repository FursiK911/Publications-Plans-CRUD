@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <title>Таблица публикаций</title>
@endsection

@section('title_content')
    <h1 class="text-center my-3">Список учебных и справочных изданий</h1>
@endsection

@section('message')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
@endsection

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="" align="center">
        <form action="{{ action('PublicationPlanController@index') }}" method="GET" class="">

            {{ csrf_field() }}

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по кафедре</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_chair" data-width="100%">
                            <option disabled>Выберите метод сортировки</option>
                            <option value="-1">Любая кафедра</option>
                            @foreach($chairs as $key => $value)
                                @if($value->id == $select_chair)
                                    <option selected value="{{ $value->id }}">{{ $value->name_of_chair }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name_of_chair }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по дисциплине</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_discipline" data-width="100%">
                            <option disabled>Выберите метод сортировки</option>
                            <option value="-1">Любая дисциплина</option>
                            @foreach($disciplines as $key => $value)
                                @if($value->id == $select_discipline)
                                    <option selected value="{{ $value->id }}">{{ $value->name_of_discipline }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name_of_discipline }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по статусу наличия</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_author" id="inlineFormCustomSelect" data-width="100%">
                            <option disabled>Выберите авторов</option>
                            <option selected value="-1">Любой статус</option>
                            <option value="0">Не выпущена</option>
                            <option value="1">Выпущена</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по году выпуска</label>
                        <div class="row-fluid">
                            @if($select_year != null)
                                <input class="form-control" type="text" name="select_year" placeholder="Год выпуска"
                                       value="{{ $select_year }}" }}>
                            @else
                                <input class="form-control" type="text" name="select_year" placeholder="Год выпуска" }}>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по виду издания</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="select_type"
                                data-width="100%">
                            <option disabled>Выберите метод сортировки</option>
                            <option value="-1">Любой вид издания</option>
                            @foreach($types as $key => $value)
                                @if($value->id == $select_type)
                                    <option selected
                                            value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по авторам</label>
                        <br>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="select_author" id="inlineFormCustomSelect" data-width="100%">
                            <option disabled>Выберите авторов</option>
                            <option selected value="-1">Любой автор</option>
                            @foreach($autors as $key => $value)
                                @if($value->id == $select_author)
                                    <option selected
                                            value="{{ $value->id }}">{{ $value->last_name }} {{ $value->name }} {{ $value->middle_name }}</option>
                                @else
                                    <option
                                        value="{{ $value->id }}">{{ $value->last_name }} {{ $value->name }} {{ $value->middle_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-dark my-5">Отфильтровать</button>
        </form>


        <table class="table table-bordered table-hover my-5">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="align-middle text-center">Кафедра</th>
                <th scope="col" class="align-middle text-center">Дисциплина</th>
                <th scope="col" class="align-middle text-center">Вид издания</th>
                <th scope="col" class="align-middle text-center">Название публикации</th>
                <th scope="col" class="align-middle text-center">Автор</th>
                <th scope="col" class="align-middle text-center">Формат бумаги</th>
                <th scope="col" class="align-middle text-center">Кл-во страниц</th>
                <th scope="col" class="align-middle text-center">Тираж</th>
                <th scope="col" class="align-middle text-center">Обложка</th>
                <th scope="col" class="align-middle text-center">Месяц выпуска</th>
                <th scope="col" class="align-middle text-center">Год выпуска</th>
                <th scope="col" class="align-middle text-center">Телефонный номер</th>
                <th scope="col" class="align-middle text-center">Уже выпущена</th>
                <th scope="col" class="align-middle text-center">Кнопки управления</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plans as $key => $value)
                <tr>
                    <td>{{ $value->name_of_chair }}</td>
                    <td>{{ $value->name_of_discipline }}</td>
                    <td>{{ $value->type_publication_name }}</td>
                    <td>{{ $value->name_of_publication }}</td>
                    <td>{{ $value->authors }}</td>
                    <td>{{ $value->format_name }}</td>
                    <td>{{ $value->number_of_pages }}</td>
                    <td>{{ $value->number_of_copies }}</td>
                    <td>{{ $value->cover_type }}</td>
                    <td>{{ $value->month_name }}</td>
                    <td>{{ $value->year_of_publication }}</td>
                    <td>{{ $value->phone_number }}</td>
                    <td>
                        @if ($value->is_release == 1)
                            Да
                        @else
                            Нет
                        @endif
                    </td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        @role('administrator|moderator')
                            <!-- edit this plans (uses the edit method found at GET /plans/{id}/edit -->
                            <a class="btn btn-block btn-outline-secondary"
                               href="/plans/{{ $value->id }}/edit">Редактировать</a>

                            <!-- delete the plans (uses the destroy method DESTROY /plans/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->
                            <form action="{{ action('PublicationPlanController@destroy', $value->id) }}" method="POST">

                                @method('DELETE')
                                {{ csrf_field() }}

                                <button class="btn btn-block btn-outline-secondary" type="submit">Удалить</button>
                            </form>
                        @endrole
                        @if($value->filePath != 'none')
                            <a class="btn btn-block btn-outline-secondary" href="{{$value->filePath}}">Открыть файл в браузере</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

