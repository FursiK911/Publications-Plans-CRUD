@extends('select-table-for-update-base')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <title>Обновить информацию в таблицу</title>
@endsection

@section('title_content')
    <h1 class="text-center my-3">Обновить информацию в таблицу</h1>
@endsection


@section('content')
    <div class="container">
        <div class="content mx-5 my-5">
            <form class="" action="{{ action('AdditionsToBaseController@update') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="form-control" type="text" name="id" value="ID = {{$id}}"disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="form-control" type="text" name="select_data" value="Table = {{$select_data}}"disabled>
                    </div>
                </div>
                @switch($select_data)
                    @case('discipline')
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Название дисциплины" value="{{$data[0]}}">
                        </div>
                    </div>
                    @break
                    @case('type_publication')
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Название вида издания" value="{{$data[0]}}">
                        </div>
                    </div>
                    @break
                    @case('user')
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Email" value="{{ $data[0] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="password" name="data" placeholder="Пароль">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="password" name="data" placeholder="Подтверждение пароля">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Фамилия" value="{{ $data[1] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Имя" value="{{ $data[2] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Отчество" value="{{ $data[3] }}">
                        </div>
                    </div>
                    @break
                    @case('author')
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Фамилия" value="{{ $data[0] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Имя" value="{{ $data[1] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Отчество" value="{{ $data[2] }}">
                        </div>
                    </div>
                    @break
                    @case('chair')
                    <div class="form-row">
                        <div class="col-6 my-3">
                            <input class="form-control" type="text" name="data" placeholder="Название кафедры" value="{{$data[0]}}">
                        </div>
                    </div>
                    @break
                @endswitch
                <button type="submit" class="btn btn-dark mb-2">Обновить</button>
            </form>
        </div>
    </div>
@endsection
