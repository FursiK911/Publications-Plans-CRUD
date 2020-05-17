@extends('layouts.layout')

@section('head')
    @parent
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {
            var years = {!! $years !!};
            //console.log(years);
            var years_index = 0; //для индексации в коллеции
            years.forEach(function (year, i, arr) {
                //console.log(year.year_of_publication);

                // Create the data table.
                var array_chart = new google.visualization.DataTable();
                array_chart.addColumn('string', 'Topping');
                array_chart.addColumn('number', 'Slices');


                var collection = {!! $collection !!};
                var chairs = @json($chairs);
                console.log('Список кафедр: ' + chairs);
                console.log(collection);
                chairs.forEach(function (item, i, arr) {
                    array_chart.addRows([
                        [item.name_of_chair, collection[item.name_of_chair][years_index]],
                    ]);
                    console.log('Кафедра: ' + item.name_of_chair + ' Кл-во за ' + year.year_of_publication + ' = ' + collection[item.name_of_chair][0]);
                    //console.log(item.name_of_chair);
                })
                years_index++;
                //console.log(collection);
                //console.log(collection['Информатики и вычислительной техники'][0]);

                var options = {
                    title: 'Диаграмма кафедр за ' + year.year_of_publication
                };

                var id = 'piechart_' + year.year_of_publication;
                var chart = new google.visualization.PieChart(document.getElementById(id));

                chart.draw(array_chart, options);
            })
        }
    </script>
@endsection

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
                            <input class="form-control" type="text" name="select_year" placeholder="Год выпуска"
                                   value="{{ $select_year }}" }}>
                        @else
                            <input class="form-control" type="text" name="select_year" placeholder="Год выпуска" }}>
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
                            <option value="{{ $value->id }}">{{ $value->name_of_chair }}</option>
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

    @foreach($years as $key => $value)
        <div id="piechart_{{$value->year_of_publication}}" style="width: 900px; height: 500px;"></div>
    @endforeach

@endsection
