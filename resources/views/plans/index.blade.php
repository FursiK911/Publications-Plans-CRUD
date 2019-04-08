@extends('plans.layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <title>Таблица публикаций</title>
@endsection

@section('title_content')
    <h1 class="text-center">Список планов</h1>
@endsection

@section('message')
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
@endsection

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="sorting_box" align="center">
        <form action="{{ action('PublicationPlanController@index') }}" method="GET" class="form-row">

            {{ csrf_field() }}

            <div class="form-row align-items-center">
                <div class="col-0 my-1">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Метод сортировки</label>
                    <select class="custom-select mr-sm-2 mb-2" id="inlineFormCustomSelect" name="type_sort">
                        <option disabled>Выберите метод сортировки</option>
                        <option value="1">По дате создания (сначала новые)</option>
                        <option value="2">По дате создания (сначала старые)</option>
                        <option value="3">По дате обновления (сначала новые)</option>
                        <option value="4">По дате обновления (сначала старые)</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-dark">Сортировать</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="align-middle text-center">Дисциплина</th>
            <th scope="col" class="align-middle text-center">Вид издания</th>
            <th scope="col" class="align-middle text-center">Название публикации</th>
            <th scope="col" class="align-middle text-center">Автор</th>
            <th scope="col" class="align-middle text-center">Формат бумаги</th>
            <th scope="col" class="align-middle text-center">Кл-во страниц</th>
            <th scope="col" class="align-middle text-center">Тираж</th>
            <th scope="col" class="align-middle text-center">Обложка</th>
            <th scope="col" class="align-middle text-center">Месяц выпуска</th>
            <th scope="col" class="align-middle text-center">Телефонный номер</th>
            <th scope="col" class="align-middle text-center">Кнопки управления</th>
        </tr>
        </thead>
        <tbody>
        @foreach($plans as $key => $value)
            <tr>
                <td>{{ $value->name_of_discipline }}</td>
                <td>{{ $value->type_publication_name }}</td>
                <td>{{ $value->name_of_publication }}</td>
                <td>
                    @foreach($users as $k => $val)
                        @if($val->plan_id == $value->id)
                            {{ $val->name }} <br>
                        @endif
                    @endforeach
                </td>
                <td>{{ $value->format_name }}</td>
                <td>{{ $value->number_of_pages }}</td>
                <td>{{ $value->number_of_copies }}</td>
                <td>{{ $value->cover_type }}</td>
                <td>{{ $value->month_name }}</td>
                <td>{{ $value->phone_number }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- edit this plans (uses the edit method found at GET /plans/{id}/edit -->
                    <a class="btn btn-block btn-outline-secondary" href="/plans/{{ $value->id }}/edit">Редактировать</a>

                    <!-- delete the plans (uses the destroy method DESTROY /plans/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    <form action="{{ action('PublicationPlanController@destroy', $value->id) }}" method="POST">

                        @method('DELETE')
                        {{ csrf_field() }}

                        <button class="btn btn-block btn-outline-secondary" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

