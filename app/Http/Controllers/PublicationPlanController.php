<?php

namespace App\Http\Controllers;

use App\Cover;
use App\Discipline;
use App\User;
use App\PublicationPlan;
use App\MonthOfSubmission;
use App\PapersSize;
use App\TypeOfPublication;
use App\Users_Publications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Session;


class PublicationPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $disciplines_table = Discipline::all();
        $autors_table = User::all();


        $users_in_plans = DB::table('users_publications')
            ->join('users', 'users_publications.user_id', '=', 'users.id')
            ->join('publication_plans', 'publication_plans.id', '=', 'users_publications.plan_id')
            ->select('users.id', 'users.name', 'users_publications.plan_id')
            ->get();


        // get all the plans with foreign key
        $plans = DB::table('publication_plans')
            ->join('disciplines', 'publication_plans.discipline_id', '=', 'disciplines.id')
            ->join('type_of_publication', 'publication_plans.type_publication_id', '=', 'type_of_publication.id')
            ->join('papers_sizes', 'publication_plans.paper_size_id', '=', 'papers_sizes.id')
            ->join('covers', 'publication_plans.cover_id', '=', 'covers.id')
            ->join('month_of_submissions', 'publication_plans.month_of_submission_id', '=', 'month_of_submissions.id')
            ->select('publication_plans.id', 'publication_plans.discipline_id', 'disciplines.name_of_discipline', 'type_of_publication.type_publication_name', 'publication_plans.name_of_publication',
                'papers_sizes.format_name' , 'number_of_pages', 'number_of_copies','covers.cover_type', 'publication_plans.year_of_publication',
                'month_of_submissions.month_name', 'phone_number')
            ->get();



        // load the view and pass the plans
        return view('plans.index')->with([
            'plans' => $plans,
            'users' => $users_in_plans,
            'disciplines' => $disciplines_table,
            'autors' => $autors_table,
            'select_year' => $request->input('select_year'),
            'select_discipline' => $request->input('select_discipline'),
            'select_author' => $request->input('select_author'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $papers_size = PapersSize::all();
        $months = MonthOfSubmission::all();
        $cover = Cover::all();
        $type_publication = TypeOfPublication::all();
        $disciplines = Discipline::all();
        $users = User::all();

        // load the create form (app/views/plans/create.blade.php)
        return view('plans.create',[
            'papers_size' => $papers_size,
            'months' => $months,
            'cover' => $cover,
            'type_publication' => $type_publication,
            'disciplines' => $disciplines,
            'users' => $users
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $request->validate([
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
        ]);

        // store
        $plan = new PublicationPlan();
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
        $plan->save();

        $newid = PublicationPlan::latest()->first()->id;

        $array_users = $request->input('author_id.*');
        if(count($array_users) > 0) {
            for ($i=0; $i<count($array_users); $i++) {
                $plan_user = new Users_Publications();
                $plan_user->plan_id = $newid;
                $plan_user->user_id = $array_users[$i];
                $plan_user->save();
            }
        }

        // redirect
        Session::flash('message', 'Новый план создан!');
        return redirect('/plans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the plan
        $plan = PublicationPlan::find($id); //selected plan

        $papers_size = PapersSize::all();
        $months = MonthOfSubmission::all();
        $cover = Cover::all();
        $type_publication = TypeOfPublication::all();
        $disciplines = Discipline::all();
        $users = User::all();
        $plan_users = DB::table('users_publications')->where('plan_id', '=', $id)->get();

        $selected_users = collect();
        $unselected_users = collect();

        for ($i = 0; $i < count($users); $i++)
        {
            for ($j = 0; $j < count($plan_users); $j++)
            {
                if($users[$i]->id == $plan_users[$j]->user_id)
                {
                    $selected_users->push($users->slice($i,1));
                }
            }
        }

        for ($i = 0; $i < count($users); $i++)
        {
            for ($j = 0, $selected = false; $j < count($plan_users); $j++)
            {
                if($users[$i]->id == $plan_users[$j]->user_id)
                {
                    $selected = true;
                }
            }
            if($selected == false)
            {
                $unselected_users->push($users->slice($i,1));
            }
        }

        return view('plans.edit',[
            'plan' => $plan,
            'papers_size' => $papers_size,
            'months' => $months,
            'cover' => $cover,
            'type_publication' => $type_publication,
            'disciplines' => $disciplines,
            'users' => $users,
            'plan_users' => $plan_users,
            'selected_users' => $selected_users,
            'unselected_users' => $unselected_users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $request->validate([
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
        ]);

        // store
        DB::table('users_publications')->where('plan_id', '=', $id)->delete();
        $array_users = $request->input('author_id.*');
        if(count($array_users) > 0) {
            for ($i=0; $i<count($array_users); $i++) {
                $plan_user = new Users_Publications();
                $plan_user->plan_id = $id;
                $plan_user->user_id = $array_users[$i];
                $plan_user->save();
            }
        }

        $plan = PublicationPlan::find($id);
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
        $plan->save();

        // redirect
        Session::flash('message', 'План был изменен!');
        return redirect('/plans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete foreign key
        $deletedRows = Users_Publications::where('plan_id', '=', $id)->delete();


        // delete
        $plan = PublicationPlan::find($id);
        $plan->delete();

        // redirect
        Session::flash('message', 'План был удален!');
        return redirect('/plans');
    }
}
