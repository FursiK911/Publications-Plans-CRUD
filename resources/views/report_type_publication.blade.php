@extends('layouts.layout')

@section('head')
    @parent
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {
            var years = @json($years);
            var selected_types = @json($select_types);
            console.log(selected_types);
            //console.log(years);
            var years_index = 0; //для индексации в коллеции
            years.forEach(function (year, i, arr) {
                //console.log(year.year_of_publication);

                // Create the data table.
                var array_chart = new google.visualization.DataTable();
                array_chart.addColumn('string', 'Topping');
                array_chart.addColumn('number', 'Slices');


                var collection = {!! $collection !!};
                var types = @json($types);
                console.log(types);
                //console.log('Список кафедр: ' + chairs);
                //console.log(collection);
                types.forEach(function (item, i, arr) {
                    if(selected_types != null)
                    {
                        selected_types.forEach(function (s_type, i, arr) {
                            console.log('selected_chair' + s_type + ' item.id' + item.id);
                            if (s_type == item.id) {
                                array_chart.addRows([
                                    [item.type_publication_name, collection[item.type_publication_name][years_index]],
                                ]);
                                console.log('Кафедра: ' + item.type_publication_name + ' Кл-во за ' + year + ' = ' + collection[item.type_publication_name][0]);
                            }
                        })
                    }
                    else
                    {
                        array_chart.addRows([
                            [item.type_publication_name, collection[item.type_publication_name][years_index]],
                        ]);
                        console.log('Кафедра: ' + item.type_publication_name + ' Кл-во за ' + year + ' = ' + collection[item.type_publication_name][0]);
                    }
                    //console.log(item.name_of_chair);
                })
                years_index++;

                var options = {
                    title: 'Диаграмма видов изданий за ' + year
                };

                var id = 'piechart_' + year;
                var chart = new google.visualization.PieChart(document.getElementById(id));

                chart.draw(array_chart, options);
            })
        }
    </script>
@endsection

@section('title_content')
    <h1 class="text-center my-3">Формирование отчётов по видам изданий</h1>
@endsection

@section('content')

    <div class="" align="center">
        <form action="{{ action('ReportController@ReportForTypePublication') }}" method="GET" class="">

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
                            <small id="autorsHelp" class="form-text text-muted">Вы можете выбрать несколько лет, перечислив их через запятую (2018,2019,2020...)</small>
                    </div>
                </div>
                <div class="col-sm">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Отфильтровать по виду издания</label>
                    <br>
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                            name="select_type[]" data-width="100%" multiple="multiple">
                        <option disabled>Выберите метод сортировки</option>
                        @foreach($types as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
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
                    <th scope="col" class="align-middle text-center">{{ $value }}</th>
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

    <div class=".container-fluid">
        <div class="row">
            @foreach($years as $key => $value)
                <div class="col-6">
                    <div id="piechart_{{$value}}" style="width: 1000px; height: 800px;"></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
