<!-- app/views/plans/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Таблица публикаций</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('plans') }}">Планы</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('plans') }}">Показать все планы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/plans/create') }}">Создать новый план</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


    <div class="sorting_box">
        <h1>Список планов</h1>
        <form>

            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Метод сортировки</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option disabled>Выберите метод сортировки</option>
                        <option>По дате создания</option>
                        <option>По дате обновления</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>



    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Дисциплина</th>
                <th scope="col">Вид издания</th>
                <th scope="col">Название публикации</th>
                <th scope="col">Автор</th>
                <th scope="col">Формат бумаги</th>
                <th scope="col">Кл-во страниц</th>
                <th scope="col">Тираж</th>
                <th scope="col">Обложка</th>
                <th scope="col">Месяц выпуска</th>
                <th scope="col">Телефонный номер</th>
                <th scope="col">Кнопки управления</th>
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
                    <a class="btn btn-small btn-info" href="/plans/{{ $value->id }}/edit">Редактировать</a>

                    <!-- delete the plans (uses the destroy method DESTROY /plans/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    <form action="{{ action('PublicationPlanController@destroy', $value->id) }}" method="POST">

                        @method('DELETE')
                        {{ csrf_field() }}

                        <button class="btn btn-block btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>




<!-- Scripts for select -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</html>