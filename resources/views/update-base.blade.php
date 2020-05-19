@extends('layouts.layout')

@section('head')
    @parent
    <link rel="stylesheet" href="css/index.css">
    <title>Обновить информацию в таблицу</title>
@endsection

@section('title_content')
    <h1 class="text-center my-3">Обновить информацию в таблицу</h1>
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
            <form class="" action="{{ action('AdditionsToBaseController@update') }}" method="POST">

                {{ csrf_field() }}

                <div class="form-row">
                    <div class="col-12 my-3">
                        <input class="hideForm form-control" type="text" name="id" value="{{$id}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 my-3">
                        <input class="hideForm form-control" type="text" name="select_data" value="{{$select_data}}" readonly>
                    </div>
                </div>
                @switch($select_data)
                    @case('discipline')
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="discipline" placeholder="Название дисциплины" value="{{$data[0]}}">
                        </div>
                    </div>
                    @break
                    @case('type_publication')
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="type_publication" placeholder="Название вида издания" value="{{$data[0]}}">
                        </div>
                    </div>
                    @break
                    @case('user')
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_email" placeholder="Email" value="{{ $data[0] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="password" name="user_password" placeholder="Пароль">
                            <small id="autorsHelp" class="form-text text-muted">Если вы не хотите обновлять пароль, оставьте поля с паролями пустыми</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="password" name="user_password_confirm" placeholder="Подтверждение пароля">
                        </div>
                    </div>
                    <div id="table_combobox_2">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type_user" data-width="100%">
                            <option disabled>Выдайте роль пользователю</option>

                            @if($data[4] == 'user')
                                <option selected value="user">Пользователь</option>
                            @else
                                <option value="user">Пользователь</option>
                            @endif

                            @if($data[4] == 'moderator')
                                <option selected value="moderator">Модератор</option>
                            @else
                                <option value="moderator">Модератор</option>
                            @endif

                            @if($data[4] == 'administrator')
                                <option selected value="administrator">Администратор</option>
                            @else
                                <option value="administrator">Администратор</option>
                            @endif
                        </select>
                        <small id="autorsHelp" class="form-text text-muted">Это поле отображает, какие права будут выданы пользователю</small>
                    </div>
                    <div id="table_combobox_3">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="user_author" data-width="100%">
                            <option disabled>Поставьте соответствие с автором</option>
                            @foreach($authors as $key => $value)
                                @if($select_author->author_id == $value->id)
                                    <option selected value="{{ $value->id }}">{{$value->last_name . ' ' . $value->name . ' ' . $value->middle_name}}</option>
                                @else
                                    <option value="{{ $value->id }}">{{$value->last_name . ' ' . $value->name . ' ' . $value->middle_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="autorsHelp" class="form-text text-muted">Данное поле ставит соответствие с автором. Пользователь без прав администратора или модератора может редактировать только свои методические издания</small>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="add_new_authors" name="add_new_authors">
                        <label class="form-check-label" for="exampleCheck1">Создать нового автора для этого пользователя</label>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_last_name" placeholder="Фамилия" value="{{ $data[1] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_name" placeholder="Имя" value="{{ $data[2] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="user_middle_name" placeholder="Отчество" value="{{ $data[3] }}">
                        </div>
                    </div>
                    @break
                    @case('author')
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="author_last_name" placeholder="Фамилия" value="{{ $data[0] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="author_name" placeholder="Имя" value="{{ $data[1] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="author_middle_name" placeholder="Отчество" value="{{ $data[2] }}">
                        </div>
                    </div>
                    @break
                    @case('chair')
                    <div class="form-row">
                        <div class="col-12 my-3">
                            <input class="form-control" type="text" name="chair" placeholder="Название кафедры" value="{{$data[0]}}">
                        </div>
                    </div>
                    @break
                @endswitch
                <button type="submit" class="btn btn-dark mb-2">Обновить</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/update-base.js') }}"></script>
@endsection
