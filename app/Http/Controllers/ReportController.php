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
        $selected_year = $request->input('select_year');
        $chairs = Chair::all();
        $collection = collect();
        if ($selected_year != null) //Если пользователь ввел определенные год(а)
        {
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
        else //Если пользователь не вводил года, то выводим все
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
