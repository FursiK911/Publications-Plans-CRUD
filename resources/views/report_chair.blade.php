@extends('layouts.layout')

@section('title_content')
    <h1 class="text-center my-3">Формирование отчётов по кафедрам</h1>
@endsection

@section('content')


    <div class="" align="center">
        <form action="{{ action('ReportController@ReportForChair') }}" method="GET" class="">

            {{ csrf_field() }}

            <div class="form-row">
                <div class="col-sm">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по году выпуска</label>
                    <div class="row-fluid">
                        @if($select_year != null)
                            <input class="form-control" type="text" name="select_year" placeholder="Год выпуска" value="{{ $select_year }}"}}>
                        @else
                            <input class="form-control" type="text" name="select_year" placeholder="Год выпуска"}}>
                        @endif
                    </div>
                </div>

                <div class="col-sm">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по кафедре</label>
                    <br>
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                            name="select_chair[]" data-width="100%" multiple="multiple">
                        <option disabled>Выберите метод сортировки</option>
                        @foreach($chairs as $key => $value)
                            @foreach($select_chair as $k => $v)
                                @if($value->id == $v)
                                    <option selected value="{{ $value->id }}">{{ $value->name_of_chair }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name_of_chair }}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-block btn-dark my-5">Отфильтровать</button>
        </form>


    <table class="table table-bordered table-hover my-5">
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="align-middle text-center">Кафедра</th>
    @foreach($years as $key => $value)
        @if($select_year != null)
            <th scope="col" class="align-middle text-center">{{ $value }}</th>
        @else
            <th scope="col" class="align-middle text-center">{{ $value->year_of_publication }}</th>
        @endif
    @endforeach
    </tr>
    </thead>
    <tbody>
        @foreach($collection as $key => $value)
        <tr>
            <td>{{ $key }}</td>
            @foreach($value as $k => $v)
                <td>{{ $v }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
@endsection
