<!-- app/views/nerds/create.blade.php -->

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
            <a class="navbar-brand" href="{{ url('plans') }}">Plan Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('plans') }}">View All Plans</a></li>
            <li><a href="{{ url('plans/create') }}">Create a Plan</a>
        </ul>
    </nav>

    <h1>Create a Plan</h1>

    <form action="{{ action('PublicationPlanController@store') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Дисциплина</label>
            <input type="text" name="name_of_discipline">
        </div>

        <div class="form-group">
            <label>Вид издания</label>
            <p><select size="1" name="type_publication_name">
                    <option disabled>Выберите вид издания</option>
                    @foreach($type_publication as $key => $value)
                        <option value="format_name">{{ $value->type_publication_name }}</option>
                    @endforeach
                </select></p>
        </div>

        <div class="form-group">
            <label>Название публикации</label>
            <input type="text" name="name_of_publication">
        </div>

        <div class="form-group">
            <label>Автор</label>
            <input type="text" name="name">
        </div>

        <div class="form-group">
            <label>Формат бумаги</label>
            <p><select size="1" name="format_name">
                    <option disabled>Выберите формат бумаги</option>
                    @foreach($papers_size as $key => $value)
                        <option value="format_name">{{ $value->format_name }}</option>
                    @endforeach
            </select></p>
        </div>

        <div class="form-group">
            <label>Кл-во страниц</label>
            <input type="text" name="number_of_pages">
        </div>

        <div class="form-group">
            <label>Тираж</label>
            <input type="text" name="number_of_copies">
        </div>

        <div class="form-group">
            <label>Обложка</label>
            <p><select size="1" name="cover_type">
                    <option disabled>Выберите обложку</option>
                    @foreach($cover as $key => $value)
                        <option value="format_name">{{ $value->cover_type }}</option>
                    @endforeach
            </select></p>
        </div>

        <div class="form-group">
            <label>Месяц выпуска</label>
            <p><select size="1" name="month_name">
                    <option disabled>Выберите месяц</option>
                    @foreach($months as $key => $value)
                        <option value="month_name">{{ $value->month_name }}</option>
                    @endforeach
            </select></p>
        </div>

        <div class="form-group">
            <label>Номер телефона</label>
            <input type="text" name="phone_number">
        </div>
        <button type="submit">Отправить</button>
    </form>

</div>
</body>
</html>