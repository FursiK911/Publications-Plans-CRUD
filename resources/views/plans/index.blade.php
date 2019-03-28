<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Таблица публикаций</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('plans') }}">Plan Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('plans') }}">View All Plans</a></li>
            <li><a href="{{ url('/plans/create') }}">Create a Plan</a>
        </ul>
    </nav>

    <h1>All the Plans</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Дисциплина</td>
            <td>Вид издания</td>
            <td>Название публикации</td>
            <td>Автор</td>
            <td>Формат бумаги</td>
            <td>Кл-во страниц</td>
            <td>Тираж</td>
            <td>Обложка</td>
            <td>Месяц выпуска</td>
            <td>Телефонный номер</td>
        </tr>
        </thead>
        <tbody>
        @foreach($plans as $key => $value)
            <tr>
                <td>{{ $value->name_of_discipline }}</td>
                <td>{{ $value->type_publication_name }}</td>
                <td>{{ $value->name_of_publication }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->format_name }}</td>
                <td>{{ $value->number_of_pages }}</td>
                <td>{{ $value->number_of_copies }}</td>
                <td>{{ $value->cover_type }}</td>
                <td>{{ $value->month_name }}</td>
                <td>{{ $value->phone_number }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-danger" href="{{ URL::to('plans/' . $value->id) }}">Show this Plan</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('plans/' . $value->id . '/edit') }}">Edit this Plan</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>