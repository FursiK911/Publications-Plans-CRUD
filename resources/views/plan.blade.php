<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li>
            <li><a href="{{ URL::to('nerds/create') }}">Create a Nerd</a>
        </ul>
    </nav>

    <h1>All the Nerds</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>№</td>
            <td>Дисциплина</td>
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
                <td>{{ $value->id }}</td>
                <td>{{ $value->name_of_discipline }}</td>
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
                    <a class="btn btn-small btn-danger" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>