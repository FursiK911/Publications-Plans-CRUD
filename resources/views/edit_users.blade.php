@extends('layouts.layout')

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
            <form class="" action="{{ action('AdditionsToBaseController@store') }}" method="POST">

                {{ csrf_field() }}

                <div class="col-0 my-3">
                    <label for="table" class="sr-only">Таблица</label>
                    <input type="text" readonly class="form-control-plaintext" id="table" value="Cписок таблиц">
                </div>
                <div class="form-row">
                    <div class="col-10 my-3">
                        <input class="form-control" type="text" name="data" placeholder="Данные">
                    </div>
                    <div class="col mx-3 my-3">
                        <button type="submit" class="btn btn-dark mb-2">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
