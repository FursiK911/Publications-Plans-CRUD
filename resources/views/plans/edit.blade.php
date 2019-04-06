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

    <h1>Update Plan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ action('PublicationPlanController@update', $plan->id) }}" method="POST">

        @method('PATCH')
        {{ csrf_field() }}

        <div class="form-group">
            <label>Дисциплина</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="discipline_id">
                    <option disabled>Выберите дисциплину</option>
                    @foreach($disciplines as $key => $value)
                        @if($value->id == $plan->discipline_id)
                            <option selected value="{{ $value->id }}">{{ $value->name_of_discipline }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->name_of_discipline }}</option>
                        @endif
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
                        @if($value->id == $plan->type_publication_id)
                            <option selected value="{{ $value->id }}" >{{ $value->type_publication_name }}</option>
                        @else
                            <option value="{{ $value->id }}" >{{ $value->type_publication_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Название публикации</label>
            <input type="text" name="name_of_publication" value="{{ $plan->name_of_publication }}">
        </div>

        <div class="form-group">
            <label>Автор</label>
            <div class="row-fluid">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="author_id[]" multiple="multiple">
                    <option disabled>Выберите автора</option>
                    @foreach($users as $key => $value)
                        @foreach($plan_users as $user)
                            @if($value->id == $user->user_id)
                                <option selected value="{{ $value->id }}" >{{ $value->name }}</option>
                            @else
                                <option value="{{ $value->id }}" >{{ $value->name }}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Формат бумаги</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="paper_size_id">
                        <option disabled>Выберите формат бумаги</option>
                        @foreach($papers_size as $key => $value)
                            @if($value->id == $plan->paper_size_id)
                                <option selected value="{{ $value->id }}" >{{ $value->format_name }}</option>
                            @else
                                <option value="{{ $value->id }}" >{{ $value->format_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Кл-во страниц</label>
                <input type="text" name="number_of_pages" value="{{ $plan->number_of_pages }}">
            </div>

            <div class="form-group">
                <label>Тираж</label>
                <input type="text" name="number_of_copies" value="{{ $plan->number_of_copies }}">
            </div>

            <div class="form-group">
                <label>Обложка</label>
                <div class="row-fluid">
                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cover_id">
                        <option disabled>Выберите обложку</option>
                        @foreach($cover as $key => $value)
                            @if($value->id == $plan->cover_id)
                                <option selected value="{{ $value->id }}" >{{ $value->cover_type }}</option>
                            @else
                                <option value="{{ $value->id }}" >{{ $value->cover_type }}</option>
                            @endif
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
                            @if($value->id == $plan->month_of_submission_id)
                                <option selected value="{{ $value->id }}" >{{ $value->month_name }}</option>
                            @else
                                <option value="{{ $value->id }}" >{{ $value->month_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Номер телефона</label>
                <input type="text" name="phone_number" value="{{ $plan->phone_number }}">
            </div>
            <button type="submit">Обновить</button>
    </form>

</div>
</body>

<!-- Scripts for select -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</html>

