@extends('select-table-for-remove-from-base')

@section('content')
    <div class="container">
        <div class="content mx-5 my-5">
            <form class="" action="{{ action('AdditionsToBaseController@destroy') }}" method="POST">

                {{ csrf_field() }}

                <div class="col-0 my-3">
                    <label for="table" class="sr-only">Таблица</label>
                    <input type="text" readonly class="form-control-plaintext" id="table" value="Cписок таблиц">
                </div>
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" multiple="multiple" name="elements[]" data-width="100%">
                    <option disabled>Выберите данные</option>
                    @foreach($values as $key => $value)
                        <option value="{{ $select_table.$key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <div class="col my-5">
                    <button type="submit" class="btn btn-block btn-dark">Удалить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
