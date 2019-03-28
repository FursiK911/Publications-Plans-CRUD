<?php

namespace App\Http\Controllers;

use App\Cover;
use App\Discipline;
use App\User;
use App\PublicationPlan;
use App\MonthOfSubmission;
use App\PapersSize;
use App\TypeOfPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PublicationPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the plans with foreign key
        $plans = DB::table('publication_plans')
            ->join('disciplines', 'publication_plans.discipline_id', '=', 'disciplines.id')
            ->join('type_of_publication', 'publication_plans.type_publication_id', '=', 'type_of_publication.id')
            ->join('users', 'publication_plans.author_id', '=', 'users.id')
            ->join('papers_sizes', 'publication_plans.paper_size_id', '=', 'papers_sizes.id')
            ->join('covers', 'publication_plans.cover_id', '=', 'covers.id')
            ->join('month_of_submissions', 'publication_plans.month_of_submission_id', '=', 'month_of_submissions.id')

            ->select('disciplines.name_of_discipline', 'type_of_publication.type_publication_name', 'publication_plans.name_of_publication',
                'users.name', 'papers_sizes.format_name' , 'number_of_pages', 'number_of_copies','covers.cover_type',
                'month_of_submissions.month_name', 'phone_number')
            ->get();

        // load the view and pass the plans
        return view('plans.index')
            ->with('plans', $plans);
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

        // load the create form (app/views/plans/create.blade.php)
        return view('plans.create',[
            'papers_size' => $papers_size,
            'months' => $months,
            'cover' => $cover,
            'type_publication' => $type_publication
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
        $rules = array(
            'discipline_name' => 'required',
            'name_of_discipline' => 'required',
            'name' => 'required',
            'number_of_pages' => 'required|numeric',
            'number_of_copies' => 'required|numeric',
            'phone_number' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('plans/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {

            // store

            $user = new User();
            $user->name = $request->input('name');
            $user->save();

            $discipline = new Discipline();
            $discipline->name_of_discipline = $request->input('name_of_discipline');
            $discipline->save();

            $plan = new PublicationPlan();
            // redirect
            return redirect('/plans');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
