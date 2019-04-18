<?php
namespace App\Http\Controllers;
use App\Cover;
use App\Discipline;
use App\User;
use App\Publications;
use App\MonthOfSubmission;
use App\PapersSize;
use App\TypeOfPublication;
use App\Users_Publications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Session;
class AdditionsToBaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view("add-to-base");
    }

    public function store(Request $request)
    {
        //what table we need
        $select_table = $request->input('table');
        switch ($select_table) {
            case 'discipline':
                $discipline = new Discipline();
                $discipline->name_of_discipline = $request->input('data');
                $discipline->save();
                break;
            case 'type_publication':
                $type = new TypeOfPublication();
                $type->type_of_publication = $request->input('data');
                $type->save();
                break;
            case 'name':
                $user = new User();
                $user->name = $request->input('data');
                $user->save();
                break;
            default:
                Session::flash('message', 'Что-то пошло не так. Данные не сохранены!');
                return redirect('/add-to-base');
                break;
        }
        // redirect
        Session::flash('message', 'Новые данные добавлены!');
        return redirect('/add-to-base');
    }

    public function remove()
    {
        return view("select-table-for-remove-from-base");
    }

    public function select_table_remove(Request $request)
    {
        $select_table = $request->input('table');
        $collection = array();
        switch ($select_table) {
            case 'discipline':
                $table = Discipline::all();
                $number_table = 1;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->name_of_discipline;
                }
                break;
            case 'type_publication':
                $table = TypeOfPublication::all();
                $number_table = 2;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->type_publication_name;
                }
                break;
            case 'name':
                $table = User::all();
                $number_table = 3;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->name;
                }
                break;
            default:
                Session::flash('message', 'Что-то пошло не так. Таблицы не существует!');
                return redirect('/select-table-for-remove-from-base');
                break;
        }
        return view("remove-from-base")->with([
            'values' => $collection,
            'select_table' => $number_table,
        ]);
    }

    public function destroy(Request $request)
    {
        $elements = $request->input('elements.*');
        if (count($elements) > 0) {
            for ($i = 0; $i < count($elements); $i++) {
                $element = substr($elements[$i], 0, 1);
                switch ($element) {
                    case 1:
                        $id = substr($elements[$i], 1);
                        $plans = Publications::all()->where('discipline_id', '=', $id);
                        foreach ($plans as $key => $value) {
                            $deletedRows = Users_Publications::where('plan_id', '=', $value->id)->delete();
                            $value->delete();
                        }
                        $discipline = Discipline::find($id);
                        $name_element = $discipline->name_of_discipline;
                        $discipline->delete();
                        break;
                    case 2:
                        $id = substr($elements[$i], 1);
                        $plans = Publications::all()->where('type_publication_id', '=', $id);
                        foreach ($plans as $key => $value) {
                            $deletedRows = Users_Publications::where('plan_id', '=', $value->id)->delete();
                            $value->delete();
                        }
                        $type = TypeOfPublication::find($id);
                        $name_element = $type->type_publication_name;
                        $type->delete();
                        break;
                    case 3:
                        $id = substr($elements[$i], 1);
                        $user_publications = Users_Publications::all()->where('user_id', '=', $id);
                        $deletedRows = Users_Publications::where('user_id', '=', $id)->delete();
                        foreach ($user_publications as $key => $value) {
                            $count_publication = Users_Publications::all()->where('plan_id', '=', $value->plan_id)->count();
                            if ($count_publication == 0) {
                                $deletedRows = Publications::where('id', '=', $value->plan_id)->delete();
                            }
                        }
                        $autor = User::find($id);
                        $name_element = $autor->name;
                        $autor->delete();
                        break;
                }
            }
            Session::flash('message', 'Данные об ' . $name_element . ' и все связанные с ним(-и) данные были удалены!');
            return redirect('/select-table-for-remove-from-base');
        }
    }

    public function change()
    {
        return view("select-table-for-update-base");
    }

    public function select_table_for_update(Request $request)
    {
        $select_table = $request->input('table');
        $collection = array();
        switch ($select_table) {
            case 'discipline':
                $table = Discipline::all();
                $number_table = 1;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->name_of_discipline;
                }
                break;
            case 'type_publication':
                $table = TypeOfPublication::all();
                $number_table = 2;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->type_publication_name;
                }
                break;
            case 'name':
                $table = User::all();
                $number_table = 3;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->name;
                }
                break;
            default:
                Session::flash('message', 'Что-то пошло не так. Таблицы не существует!');
                return redirect('/select-table-for-update-base');
                break;
        }
        return view("update-base")->with([
            'values' => $collection,
            'select_table' => $number_table,
        ]);
    }

    public function update(Request $request)
    {
        $id_table = substr($request->input('element'), 0, 1);
        $data = $request->input('data');
        $id = substr($request->input('element'), 1);
        switch ($id_table) {
            case 1:
                $discipline = Discipline::find($id);
                $old_name = $discipline->name_of_discipline;
                $discipline->name_of_discipline = $data;
                $new_name = $discipline->name_of_discipline;
                $discipline->save();
                break;
            case 2:
                $type = TypeOfPublication::find($id);
                $old_name = $type->type_publication_name;
                $type->type_publication_name = $data;
                $new_name = $type->type_publication_name;
                $type->save();
                break;
            case 3:
                $autor = User::find($id);
                $old_name = $autor->name;
                $autor->name = $data;
                $new_name = $autor->name;
                $autor->save();
                break;
        }
        Session::flash('message', $old_name . ' изменён на ' . $new_name);
        return redirect('/select-table-for-update-base');
    }
}