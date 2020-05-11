<?php

namespace App\Http\Controllers;

use App\Chair;
use App\Publications;
use App\TypeOfPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ReportForChair(Request $request)
    {
        //Формируем отчет какая кафедра, сколько изданий в год сделала
        $first_call = true;
        $selected_year = $request->input('select_year');
        $selected_chair = $request->input('select_chair.*');
        $query = "SELECT id, name_of_chair FROM Chairs";
        $chairs = DB::select($query, [1]);;
        $collection = collect();
        if ($selected_year != null) //Если пользователь ввел определенные год(а)
        {
            $first_call = false;
            $years = explode(',', $selected_year);
            foreach ($chairs as $chair)
            {
                $counts = collect();
                foreach ($years as $year)
                {
                    $count = DB::table('publications')
                        ->where('chair_id', '=', $chair->id)
                        ->where('publications.year_of_publication', '=', $year)
                        ->count();
                    $counts->push($count);
                }
                $collection->put($chair->name_of_chair, $counts);

            }

        }
        if ($selected_chair != null && $selected_chair[0] != -1) //Если пользователь ввел определенные кафедры
        {
            if ($first_call == true) {
                $first_call = false;
                $years = Publications::groupBy('year_of_publication')
                    ->select("year_of_publication")
                    ->get();

                foreach ($chairs as $chair) {
                    $counts = collect();
                    foreach ($years as $year) {
                        $count = DB::table('publications')
                            ->where('chair_id', '=', $chair->id)
                            ->where('publications.year_of_publication', '=', $year->year_of_publication)
                            ->count();
                        $counts->push($count);
                    }
                    $collection->put($chair->name_of_chair, $counts);
                }
            }

            $tmp_collection = collect();
            foreach ($selected_chair as $key => $value)
            {
                foreach ($chairs as $k => $v)
                {
                    if ($value == $v->id)
                    {
                        foreach ($collection as $c_key => $c_value)
                        {
                            if($v->name_of_chair == $c_key)
                            {
                                $tmp_collection->put($c_key, $c_value);
                                break;
                            }
                        }
                    }
                }
            }
            $collection = $tmp_collection;
        }
        if ($selected_chair == null || $selected_chair[0] == -1 && $selected_year == null) //Если пользователь ничего не вводил
        {
            $years = Publications::groupBy('year_of_publication')
                ->select("year_of_publication")
                ->get();

            foreach ($chairs as $chair)
            {
                $counts = collect();
                foreach ($years as $year)
                {
                    $count = DB::table('publications')
                        ->where('chair_id', '=', $chair->id)
                        ->where('publications.year_of_publication', '=', $year->year_of_publication)
                        ->count();
                    $counts->push($count);
                }
                $collection->put($chair->name_of_chair, $counts);
            }
        }
        return view('report_chair')->with([
            'collection' => $collection,
            'select_year' => $selected_year,
            'select_chair' => $selected_chair, //TODO: сделать select и unselect chair
            'chairs' => $chairs,
            'years' => $years,
        ]);
    }

    public function ReportForTypePublication(Request $request)
    {
        //Формируем отчет сколько и какие издания в год сделала
        $selected_year = $request->input('select_year');
        $types = TypeOfPublication::all();
        $collection = collect();
        if ($selected_year != null) //Если выбрали определенный год(а)
        {
            $years = explode(',', $selected_year);
            foreach ($types as $type)
            {
                $counts = collect();
                foreach ($years as $year)
                {
                    $count = DB::table('publications')
                        ->where('type_publication_id', '=', $type->id)
                        ->where('publications.year_of_publication', '=', $year)
                        ->count();
                    $counts->push($count);
                }
                $collection->put($type->type_publication_name, $counts);
            }
        }
        else //Если не выбрали год(а) то выводим за все года что есть
        {
            $years = Publications::groupBy('year_of_publication')
                ->select("year_of_publication")
                ->get();

            foreach ($types as $type)
            {
                $counts = collect();
                foreach ($years as $year)
                {
                    $count = DB::table('publications')
                        ->where('type_publication_id', '=', $type->id)
                        ->where('publications.year_of_publication', '=', $year->year_of_publication)
                        ->count();
                    $counts->push($count);
                }
                $collection->put($type->type_publication_name, $counts);
            }
        }


        return view('report_type_publication')->with([
            'collection' => $collection,
            'select_year' => $selected_year,
            'types' => $types,
            'years' => $years,
        ]);
    }
}
