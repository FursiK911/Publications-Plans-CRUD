@extends('layouts.layout')

@section('content')


    <div class="" align="center">
        <form action="{{ action('ReportController@ReportForYear') }}" method="GET" class="">

            {{ csrf_field() }}

            <div class="form-row">
                <div class="col-3 mx-5">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по году выпуска</label>
                    <div class="row-fluid">
                        @if($select_year != null)
                            <input class="form-control" type="text" name="select_year" placeholder="Год выпуска" value="{{ $select_year }}"}}>
                        @else
                            <input class="form-control" type="text" name="select_year" placeholder="Год выпуска"}}>
                        @endif
                    </div>
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
    @if($select_year == null)
        @foreach($chairs as $chairs_key => $chairs_value)
            <tr>
                <td>{{ $chairs_value->name_of_chair }}</td>
                @foreach($collection->get($chairs_value->name_of_chair) as $k => $v)
                    <td>{{ $v }}</td>
                @endforeach
            </tr>
        @endforeach
    @else
        @foreach($chairs as $chairs_key => $chairs_value)
        <tr>
            <td>{{ $chairs_value->name_of_chair }}</td>
            @foreach($collection->get($chairs_value->name_of_chair) as $k => $v)
                <td>{{ $v }}</td>
            @endforeach
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>
    </div>
@endsection
