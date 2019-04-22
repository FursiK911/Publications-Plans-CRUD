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

                <div class="col-0 my-3">
                    <label for="table" class="sr-only">Таблица</label>
                    <input type="text" readonly class="form-control-plaintext" id="table" value="Cписок таблиц">
                </div>
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="element" data-width="100%">
                    <option disabled>Выберите данные</option>
                    @foreach($values as $key => $value)
                        <option value="{{ $select_table.$key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <div class="form-row">
                    <div class="col-6 my-3">
                        <input class="form-control" type="text" name="data" placeholder="Новые данные">
                    </div>
                    <div class="col mx-5 my-3">
                        <button type="submit" class="btn btn-dark mb-2">Обновить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
