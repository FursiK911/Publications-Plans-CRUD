<?php
namespace App\Http\Controllers;
use App\Author;
use App\AuthorsPublications;
use App\Chair;
use App\Covers;
use App\Discipline;
use App\User;
use App\Publications;
use App\MonthOfSubmission;
use App\PapersSize;
use App\TypeOfPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Session;

class PublicationPlanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = 'SELECT publications.id, publications.chair_id, chairs.name_of_chair, publications.discipline_id, disciplines.name_of_discipline, publications.type_publication_id, type_of_publication.type_publication_name, publications.name_of_publication,
                    GROUP_CONCAT(authors.last_name,\' \', authors.name) as authors,
                    papers_sizes.format_name , number_of_pages, number_of_copies, covers.cover_type, publications.year_of_publication,
                    month_of_submissions.month_name, publications.phone_number, publications.is_release
                    FROM
                    publications
                    LEFT JOIN authors_publications
                    ON publications.id = authors_publications.plan_id
                    LEFT JOIN authors
                    ON authors.id = authors_publications.author_id
                    LEFT JOIN chairs
                    ON chairs.id = publications.chair_id
                    LEFT JOIN disciplines
                    ON disciplines.id = publications.discipline_id
                    LEFT JOIN type_of_publication
                    ON type_of_publication.id = publications.type_publication_id
                    LEFT JOIN papers_sizes
                    ON papers_sizes.id = publications.paper_size_id
                    LEFT JOIN covers
                    ON covers.id = publications.cover_id
                    LEFT JOIN month_of_submissions
                    ON month_of_submissions.id = publications.month_of_submission_id';


        $first_call = true; //был ли включен ранее фильтр, нужна для правильного формирования запроса


        $select_author = $request->input('select_author');
        $select_year = $request->input('select_year');
        $select_discipline = $request->input('select_discipline');
        $select_chair = $request->input('select_chair');
        $select_type = $request->input('select_type');
        $disciplines_table = Discipline::all();
        $autors_table = Author::all();
        $chairs_table = Chair::all();
        $types_table = TypeOfPublication::all();

        if ($select_author != null && $select_author != -1) //Если выбрали фильтр по автору
        {
            $tmp_query = 'SELECT authors_publications.plan_id FROM authors_publications WHERE authors_publications.author_id = '.$select_author; // одним запросом не выходит достать всех авторов, поэтому сначала ищем в каких публикациях они используются
            $selected_plans = DB::select($tmp_query, [1]);
            foreach ($selected_plans as $plan)
            {
                $tmp_query = '';
                if ($first_call == true)
                {
                    $first_call = false;
                    $tmp_query = $tmp_query . ' WHERE authors_publications.plan_id = ' . $plan->plan_id;
                }
                else
                {
                    $tmp_query = $tmp_query . ' OR authors_publications.plan_id = ' . $plan->plan_id;
                }
                $query = $query.$tmp_query;
            }

        }

        $query = $query.' GROUP BY publications.id';
        $plans = DB::select($query, [1]);

        if($select_discipline != null && $select_discipline != -1)  //Если выбрали фильтр по дисциплине
        {
            $tmp_collection = collect();
            foreach ($plans as $key => $value)
            {
                if ($value->discipline_id == $select_discipline)
                {
                    $tmp_collection->push($value);
                }
            }
            $plans = $tmp_collection;
        }

        if($select_year != null && $select_year != -1)  //Если выбрали фильтр по году
        {
            $tmp_collection = collect();
            foreach ($plans as $key => $value)
            {
                if ($value->year_of_publication == $select_year)
                {
                    $tmp_collection->push($value);
                }
            }
            $plans = $tmp_collection;
        }
        if($select_type != null && $select_type != -1)  //Если выбрали фильтр по типу издания
        {
            $tmp_collection = collect();
            foreach ($plans as $key => $value)
            {
                if ($value->type_publication_id == $select_type)
                {
                    $tmp_collection->push($value);
                }
            }
            $plans = $tmp_collection;
        }
        if($select_chair != null && $select_chair != -1)  //Если выбрали фильтр по кафедре
        {
            $tmp_collection = collect();
            foreach ($plans as $key => $value)
            {
                if ($value->chair_id == $select_chair)
                {
                    $tmp_collection->push($value);
                }
            }
            $plans = $tmp_collection;
        }


        /*if ($select_author != null && $select_author != -1)
        {
            $tmp_query = 'SELECT authors_publications.plan_id FROM authors_publications WHERE authors_publications.author_id = '.$select_author; // одним запросом не выходит достать всех авторов, поэтому сначала ищем в каких публикациях они используются
            $selected_plans = DB::select($tmp_query, [1]);
            $tmp_query = '';
            foreach ($selected_plans as $plan)
            {
                if ($first_call == true)
                {
                    $tmp_query = $tmp_query.' LEFT JOIN authors ON authors.id = authors_publications.author_id AND authors_publications.plan_id = '.$plan->plan_id;
                    $first_call = false;
                }
                else
                {
                    $tmp_query = $tmp_query.' OR authors_publications.plan_id = '.$plan->plan_id;
                }
            }
            $query = $query.$tmp_query;
        }
        else
        {
            $tmp_query = 'LEFT JOIN authors ON authors.id = authors_publications.author_id';
            $query = $query.$tmp_query;
        }*/

       /* if ($select_year != null) //Если выбрали фильтр по году выпуска
        {
            $tmp_query = '';
            if ($first_call == true)
            {
                $tmp_query = $tmp_query.' INNER JOIN authors ON publications.year_of_publication = '.$select_year;
                $first_call = false;
            }
            else
            {
                $tmp_query = $tmp_query.' AND publications.year_of_publication = '.$select_year;
            }
            $query = $query.$tmp_query;
        }*/

        /*if ($select_author == null || $select_author == -1 && $select_year == null)
        {
            $query = $query.' LEFT JOIN authors
                    ON authors.id = authors_publications.author_id';
        }//






        /*$disciplines_table = Discipline::all();
        $autors_table = Author::all();
        $select_author = $request->input('select_author');
        $authors_in_plans = DB::table('authors_publications')
            ->join('authors', 'authors_publications.author_id', '=', 'authors.id')
            ->join('publications', 'publications.id', '=', 'authors_publications.plan_id')
            ->select('authors.id', 'authors.name', 'authors.last_name', 'authors.middle_name', 'authors_publications.plan_id')
            ->get();

        if ($select_author != null && $select_author != -1)
        {
            // get all the plans with foreign key and filter author
            $plans = Db::table('users')
                ->join('authors_publications', 'authors.id', '=', 'authors_publications.author_id')
                ->join('publications', 'publications.id', '=', 'authors_publications.plan_id')
                ->where('author_id', '=', $request->input('select_author'))
                ->join('disciplines', 'publications.discipline_id', '=', 'disciplines.id')
                ->join('type_of_publication', 'publications.type_publication_id', '=', 'type_of_publication.id')
                ->join('papers_sizes', 'publications.paper_size_id', '=', 'papers_sizes.id')
                ->join('covers', 'publications.cover_id', '=', 'covers.id')
                ->join('month_of_submissions', 'publications.month_of_submission_id', '=', 'month_of_submissions.id')
                ->select('publications.id', 'authors_publications.author_id', 'publications.discipline_id', 'disciplines.name_of_discipline',
                    'type_of_publication.type_publication_name', 'publications.name_of_publication',
                    'papers_sizes.format_name' , 'number_of_pages', 'number_of_copies','covers.cover_type', 'publications.year_of_publication',
                    'month_of_submissions.month_name', 'phone_number')
                ->get();
        }

        else
        {
            // get all the plans with foreign key
            $plans = DB::table('publications')
                ->join('chairs', 'publications.chair_id', '=', 'chairs.id')
                ->join('disciplines', 'publications.discipline_id', '=', 'disciplines.id')
                ->join('type_of_publication', 'publications.type_publication_id', '=', 'type_of_publication.id')
                ->join('papers_sizes', 'publications.paper_size_id', '=', 'papers_sizes.id')
                ->join('covers', 'publications.cover_id', '=', 'covers.id')
                ->join('month_of_submissions', 'publications.month_of_submission_id', '=', 'month_of_submissions.id')
                ->select('chairs.name_of_chair', 'publications.id', 'publications.discipline_id', 'disciplines.name_of_discipline', 'type_of_publication.type_publication_name', 'publications.name_of_publication',
                    'papers_sizes.format_name' , 'number_of_pages', 'number_of_copies','covers.cover_type', 'publications.year_of_publication',
                    'month_of_submissions.month_name', 'publications.phone_number', 'publications.is_release')
                ->get();
        }*/

        // load the view and pass the plans
        return view('plans.index')->with([
            'plans' => $plans,
            'disciplines' => $disciplines_table,
            'autors' => $autors_table,
            'chairs' => $chairs_table,
            'types' => $types_table,
            'select_chair' => $select_chair,
            'select_type' => $select_type,
            'select_year' => $select_year,
            'select_author' => $select_author,
            'select_discipline' => $select_discipline,
        ]);

    }
    public function create()
    {
        $papers_size = PapersSize::all();
        $chairs = Chair::all();
        $months = MonthOfSubmission::all();
        $cover = Covers::all();
        $type_publication = TypeOfPublication::all();
        $disciplines = Discipline::all();
        $authors = Author::all();
        // load the create form (app/views/plans/create.blade.php)
        return view('plans.create',[
            'chairs' => $chairs,
            'papers_size' => $papers_size,
            'months' => $months,
            'cover' => $cover,
            'type_publication' => $type_publication,
            'disciplines' => $disciplines,
            'authors' => $authors
        ]);
    }

    public function store(Request $request)
    {
        // validate
        $request->validate([
            'chair_id' => 'required|numeric',
            'discipline_id' => 'required|numeric',
            'type_publication_id' => 'required|numeric',
            'name_of_publication' => 'required',
            'author_id' => "required|array|min:1",
            'paper_size_id' => 'required|numeric',
            'number_of_pages' => 'required|numeric',
            'number_of_copies' => 'required|numeric',
            'cover_id' => 'required',
            'month_of_submission_id' => 'required|numeric',
            'year_of_publication' => 'required|numeric',
            'is_release' => 'required|numeric',
        ]);

        // store
        $plan = new Publications();
        $plan->chair_id = $request->input('chair_id');
        $plan->discipline_id = $request->input('discipline_id');
        $plan->type_publication_id = $request->input('type_publication_id');
        $plan->name_of_publication = $request->input('name_of_publication');
        $plan->paper_size_id = $request->input('paper_size_id');
        $plan->number_of_pages = $request->input('number_of_pages');
        $plan->number_of_copies = $request->input('number_of_copies');
        $plan->cover_id = $request->input('cover_id');
        $plan->month_of_submission_id = $request->input('month_of_submission_id');
        $plan->year_of_publication = $request->input('year_of_publication');
        $plan->phone_number = $request->input('phone_number');
        $plan->is_release = $request->input('is_release');
        $plan->save();
        $newid = Publications::latest()->first()->id;
        $array_authors = $request->input('author_id.*');
        if(count($array_authors) > 0) {
            for ($i=0; $i<count($array_authors); $i++) {
                $plan_author = new AuthorsPublications();
                $plan_author->plan_id = $newid;
                $plan_author->author_id = $array_authors[$i];
                $plan_author->save();
            }
        }
        // redirect
        Session::flash('message', 'Новое издание создано!');
        return redirect('/plans');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // get the plan
        $plan = Publications::find($id); //selected plan
        $chairs = Chair::all();
        $papers_size = PapersSize::all();
        $months = MonthOfSubmission::all();
        $cover = Covers::all();
        $type_publication = TypeOfPublication::all();
        $disciplines = Discipline::all();
        $authors = Author::all();
        $plan_authors = DB::table('authors_publications')->where('plan_id', '=', $id)->get();
        $selected_authors = collect();
        $unselected_authors = collect();
        for ($i = 0; $i < count($authors); $i++)
        {
            for ($j = 0; $j < count($plan_authors); $j++)
            {
                if($authors[$i]->id == $plan_authors[$j]->author_id)
                {
                    $selected_authors->push($authors->slice($i,1));
                }
            }
        }
        for ($i = 0; $i < count($authors); $i++)
        {
            for ($j = 0, $selected = false; $j < count($plan_authors); $j++)
            {
                if($authors[$i]->id == $plan_authors[$j]->author_id)
                {
                    $selected = true;
                }
            }
            if($selected == false)
            {
                $unselected_authors->push($authors->slice($i,1));
            }
        }
        return view('plans.edit',[
            'plan' => $plan,
            'chairs' => $chairs,
            'papers_size' => $papers_size,
            'months' => $months,
            'cover' => $cover,
            'type_publication' => $type_publication,
            'disciplines' => $disciplines,
            'authors' => $authors,
            'plan_authors' => $plan_authors,
            'selected_authors' => $selected_authors,
            'unselected_authors' => $unselected_authors,
        ]);
    }

    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $request->validate([
            'chair_id' => 'required|numeric',
            'discipline_id' => 'required|numeric',
            'type_publication_id' => 'required|numeric',
            'name_of_publication' => 'required',
            'author_id' => "required|array|min:1",
            'paper_size_id' => 'required|numeric',
            'number_of_pages' => 'required|numeric',
            'number_of_copies' => 'required|numeric',
            'cover_id' => 'required',
            'month_of_submission_id' => 'required|numeric',
            'year_of_publication' => 'required|numeric',
            'is_release' => 'required|numeric',
        ]);
        // store
        DB::table('authors_publications')->where('plan_id', '=', $id)->delete();
        $array_authors = $request->input('author_id.*');
        if(count($array_authors) > 0) {
            for ($i=0; $i<count($array_authors); $i++) {
                $plan_author = new AuthorsPublications();
                $plan_author->plan_id = $id;
                $plan_author->author_id = $array_authors[$i];
                $plan_author->save();
            }
        }
        $plan = Publications::find($id);
        $plan->chair_id = $request->input('chair_id');
        $plan->discipline_id = $request->input('discipline_id');
        $plan->type_publication_id = $request->input('type_publication_id');
        $plan->name_of_publication = $request->input('name_of_publication');
        $plan->paper_size_id = $request->input('paper_size_id');
        $plan->number_of_pages = $request->input('number_of_pages');
        $plan->number_of_copies = $request->input('number_of_copies');
        $plan->cover_id = $request->input('cover_id');
        $plan->month_of_submission_id = $request->input('month_of_submission_id');
        $plan->year_of_publication = $request->input('year_of_publication');
        $plan->phone_number = $request->input('phone_number');
        $plan->is_release = $request->input('is_release');
        $plan->save();
        // redirect
        Session::flash('message', 'Издание было изменено!');
        return redirect('/plans');
    }

    public function destroy($id)
    {
        // delete foreign key
        $deletedRows = AuthorsPublications::where('plan_id', '=', $id)->delete();
        // delete
        $plan = Publications::find($id);
        $plan->delete();
        // redirect
        Session::flash('message', 'Издание было удалено!');
        return redirect('/plans');
    }
}
