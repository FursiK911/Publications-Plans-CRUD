<!-- app/views/plans/create.blade.php -->
@extends('layouts.layout')

@section('head')
    @parent
    <title>Обновить издание</title>
@endsection

@section('title_content')
    <h1 class="text-center">Обновить издание</h1>
@endsection

@section('message')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="content mx-5">
            <form action="{{ action('PublicationPlanController@update', $plan->id) }}" enctype="multipart/form-data" method="POST">

                @method('PATCH')
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Кафедра</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="chair_id"
                                data-width="100%">
                            <option disabled>Выберите кафедру</option>
                            @foreach($chairs as $key => $value)
                                @if($value->id == $plan->chair_id)
                                    <option selected value="{{ $value->id }}">{{ $value->name_of_chair }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name_of_chair }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Дисциплина</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="discipline_id" data-width="100%">
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
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="type_publication_id" data-width="100%">
                            <option disabled>Выберите вид издания</option>
                            @foreach($type_publication as $key => $value)
                                @if($value->id == $plan->type_publication_id)
                                    <option selected
                                            value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->type_publication_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="namePublication">Название публикации</label>
                    <input class="form-control" id="namePublication" type="text" name="name_of_publication"
                           value="{{ $plan->name_of_publication }}">
                </div>

                <div class="form-group">
                    <label>Автор</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="author_id[]"
                                multiple="multiple" data-width="100%">
                            <option disabled>Выберите автора</option>
                            @for($i = 0; $i < count($selected_authors); $i++)
                                @foreach($selected_authors[$i] as $author)
                                    <option selected
                                            value="{{ $author->id }}">{{ $author->last_name }} {{ $author->name }} {{ $author->middle_name }}</option>
                                @endforeach
                            @endfor
                            @for($i = 0; $i < count($unselected_authors); $i++)
                                @foreach($unselected_authors[$i] as $author)
                                    <option
                                        value="{{ $author->id }}">{{ $author->last_name }} {{ $author->name }} {{ $author->middle_name }}</option>
                                @endforeach
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Формат бумаги</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="paper_size_id" data-width="100%">
                            <option disabled>Выберите формат бумаги</option>
                            @foreach($papers_size as $key => $value)
                                @if($value->id == $plan->paper_size_id)
                                    <option selected value="{{ $value->id }}">{{ $value->format_name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->format_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="numberPages">Кл-во страниц</label>
                    <input class="form-control" type="text" name="number_of_pages" type="text" name="number_of_pages"
                           value="{{ $plan->number_of_pages }}">
                </div>

                <div class="form-group">
                    <label for="numberCopies">Тираж</label>
                    <input class="form-control" type="text" name="number_of_copies" id="numberCopies"
                           value="{{ $plan->number_of_copies }}">
                </div>

                <div class="form-group">
                    <label>Обложка</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="cover_id"
                                data-width="100%">
                            <option disabled>Выберите обложку</option>
                            @foreach($cover as $key => $value)
                                @if($value->id == $plan->cover_id)
                                    <option selected value="{{ $value->id }}">{{ $value->cover_type }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->cover_type }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Месяц выпуска</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                name="month_of_submission_id" data-width="100%">
                            <option disabled>Выберите месяц</option>
                            @foreach($months as $key => $value)
                                @if($value->id == $plan->month_of_submission_id)
                                    <option selected value="{{ $value->id }}">{{ $value->month_name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->month_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Год выпуска</label>
                    <div class="row-fluid">
                        <input class="form-control" type="text" name="year_of_publication"
                               value="{{ $plan->year_of_publication }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="numberPhone">Номер телефона</label>
                    <input class="form-control" type="text" name="phone_number" id="numberPhone"
                           value="{{ $plan->phone_number }}">
                </div>

                <div class="form-group">
                    <label>Выпущено ли издание</label>
                    <div class="row-fluid">
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="is_release"
                                data-width="100%">
                            <option disabled>Выберите один из вариантов</option>
                            @if($plan->is_release == 1)
                                <option selected value="1">Да</option>
                                <option value="0">Нет</option>
                            @else
                                <option selected value="0">Нет</option>
                                <option value="1">Да</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Файл издания</label>
                    <div class="file-field">
                        <div class="btn btn-dark btn-sm float-left">
                            <span>Выберите файл методического издания</span>
                            <input type="file" name="doc_file" accept="application/msword,.docx">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-dark my-5">Обновить</button>
            </form>
        </div>
    </div>
@endsection

