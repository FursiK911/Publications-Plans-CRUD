<?php
namespace App\Http\Controllers;
use App\Author;
use App\Chair;
use App\Cover;
use App\Discipline;
use App\User;
use App\Publications;
use App\MonthOfSubmission;
use App\PapersSize;
use App\TypeOfPublication;
use App\Users_Publications;
use App\UsersPublications;
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
                // validate
                $request->validate([
                    'field_1' => 'required',
                ]);
                $discipline = new Discipline();
                $discipline->name_of_discipline = $request->input('field_1');
                $discipline->save();
                Session::flash('message', 'Дисциплина успешно создана!');
                break;
            case 'type_publication':
                // validate
                $request->validate([
                    'field_1' => 'required',
                ]);
                $type = new TypeOfPublication();
                $type->type_of_publication = $request->input('field_1');
                $type->save();
                Session::flash('message', 'Новый вид публикаций успешно создан!');
                break;
            case 'user':
                // validate
                $request->validate([
                    'field_1' => 'required',
                    'field_2' => 'required',
                    'field_3' => 'required',
                    'field_4' => 'required',
                    'field_5' => 'required',
                    'field_6' => 'required',
                ]);
                if($request->input('field_2') != $request->input('field_3')) //check confirm password
                {
                    Session::flash('error', 'Пароль и подтверждение пароля не совпадают!');
                    return redirect('/add-to-base');
                }
                $user = new User();
                $user->email = $request->input('field_1');
                $user->password = bcrypt($request->input('field_2'));
                $user->last_name = $request->input('field_4');
                $user->name = $request->input('field_5');
                $user->middle_name = $request->input('field_6');
                $user->save();
                Session::flash('message', 'Пользователь успешно создан!');
                break;
            case 'author':
                // validate
                $request->validate([
                    'field_1' => 'required',
                    'field_2' => 'required',
                    'field_3' => 'required',
                ]);

                $author = new Author();
                $author->last_name = $request->input('field_1');
                $author->name = $request->input('field_2');
                $author->middle_name = $request->input('field_3');
                $author->save();
                Session::flash('message', 'Автор успешно создан!');
                break;
            case 'chair':// validate
                $request->validate([
                    'field_1' => 'required',
                ]);
                $chair = new Chair();
                $chair->name_of_chair = $request->input('field_1');
                $chair->save();
                Session::flash('message', 'Кафедра успешно создана!');
                break;
            default:
                Session::flash('message', 'Что-то пошло не так. Данные не сохранены!');
                return redirect('/add-to-base');
                break;
        }
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
            case 'chair':
                $table = Chair::all();
                $number_table = 4;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->name_of_chair;
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
                            $deletedRows = UsersPublications::where('plan_id', '=', $value->id)->delete();
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
                            $deletedRows = UsersPublications::where('plan_id', '=', $value->id)->delete();
                            $value->delete();
                        }
                        $type = TypeOfPublication::find($id);
                        $name_element = $type->type_publication_name;
                        $type->delete();
                        break;
                    case 3:
                        $id = substr($elements[$i], 1);
                        $user_publications = UsersPublications::all()->where('user_id', '=', $id);
                        $deletedRows = UsersPublications::where('user_id', '=', $id)->delete();
                        foreach ($user_publications as $key => $value) {
                            $count_publication = UsersPublications::all()->where('plan_id', '=', $value->plan_id)->count();
                            if ($count_publication == 0) {
                                $deletedRows = Publications::where('id', '=', $value->plan_id)->delete();
                            }
                        }
                        $autor = User::find($id);
                        $name_element = $autor->name;
                        $autor->delete();
                        break;
                    case 4:
                        $id = substr($elements[$i], 1);
                        $plans = Publications::all()->where('chair_id', '=', $id);
                        foreach ($plans as $key => $value) {
                            $deletedRows = UsersPublications::where('plan_id', '=', $value->id)->delete();
                            $value->delete();
                        }
                        $chair = Chair::find($id);
                        $name_element = $chair->name_of_discipline;
                        $chair->delete();
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
            case 'chair':
                $table = Chair::all();
                $number_table = 4;
                foreach ($table as $value) {
                    $collection[$value->id] = $value->name_of_chair;
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
        // validate
        $request->validate([
            'data' => 'required',
        ]);
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
            case 4:
                $chair = Chair::find($id);
                $old_name = $chair->name_of_chair;
                $chair->name_of_chair = $data;
                $new_name = $chair->name_of_chair;
                $chair->save();
                break;
        }
        Session::flash('message', $old_name . ' изменён на ' . $new_name);
        return redirect('/select-table-for-update-base');
    }
}
