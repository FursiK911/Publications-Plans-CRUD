<!-- app/views/plans/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ action('PublicationPlanController@store') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Дисциплина</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="discipline_id">
                    <option disabled>Выберите дисциплину</option>
                    @foreach($disciplines as $key => $value)
                        <option value="{{ $value->id }}" >{{ $value->name_of_discipline }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Вид издания</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="type_publication_id">
                    <option disabled>Выберите вид издания</option>
                    @foreach($type_publication as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Название публикации</label>
            <input type="text" name="name_of_publication">
        </div>

        <div class="form-group">
            <label>Автор</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="author_id[]" multiple="multiple">
                    <option disabled>Выберите автора</option>
                    @foreach($users as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
        </div>

        <div class="form-group">
            <label>Формат бумаги</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="paper_size_id">
                    <option disabled>Выберите формат бумаги</option>
                    @foreach($papers_size as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->format_name }}</option>
                    @endforeach
                </select>
            </div>
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
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cover_id">
                    <option disabled>Выберите обложку</option>
                    @foreach($cover as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->cover_type }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Месяц выпуска</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="month_of_submission_id">
                    <option disabled>Выберите месяц</option>
                    @foreach($months as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->month_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Номер телефона</label>
            <input type="text" name="phone_number">
        </div>
        <a class="btn btn-small btn-danger" type="submit">Создать</a>
        <button type="submit">Создать</button>
    </form>

</div>
</body>

<!-- Scripts for select -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</html>

