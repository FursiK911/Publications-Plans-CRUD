<?php
namespace App\Http\Controllers;
use App\Author;
use App\AuthorsPublications;
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
                    'type_user' => 'required',
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
                switch ($request->input('type_user'))
                {
                    case 'administrator':
                        $user->assignRole('administrator');
                        break;
                    case 'moderator':
                        $user->assignRole('moderator');
                        break;
                    case 'user':
                        $user->assignRole('user');
                        break;
                }
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

    public function update_table_combobox(Request $request)
    {
        $select_table = $request->select_table;
        $values = null;
        switch ($select_table) {
            case 'discipline':
                $values = Discipline::all();
                $all_tmp_values = collect();
                $tmp_values = collect();

                foreach ($values as $key => $value)
                {
                    $tmp_values->put('key', $value->id);
                    $tmp_values->put('value', $value->name_of_discipline);
                    $all_tmp_values->push($tmp_values);
                    $tmp_values = collect();
                }
                $values = $all_tmp_values;
                break;
            case 'type_publication':
                $values = TypeOfPublication::all();
                $all_tmp_values = collect();
                $tmp_values = collect();

                foreach ($values as $key => $value)
                {
                    $tmp_values->put('key', $value->id);
                    $tmp_values->put('value', $value->type_publication_name);
                    $all_tmp_values->push($tmp_values);
                    $tmp_values = collect();
                }
                $values = $all_tmp_values;
                break;
            case 'user':
                $values = User::all();
                $all_tmp_values = collect();
                $tmp_values = collect();

                foreach ($values as $key => $value)
                {
                    $tmp_values->put('key', $value->id);
                    $tmp_values->put('value', $value->last_name.' '.$value->name.' '.$value->middle_name);
                    $all_tmp_values->push($tmp_values);
                    $tmp_values = collect();
                }
                $values = $all_tmp_values;
                break;
            case 'author':
                $values = Author::all();
                $all_tmp_values = collect();
                $tmp_values = collect();

                foreach ($values as $key => $value)
                {
                    $tmp_values->put('key', $value->id);
                    $tmp_values->put('value', $value->last_name.' '.$value->name.' '.$value->middle_name);
                    $all_tmp_values->push($tmp_values);
                    $tmp_values = collect();
                }
                $values = $all_tmp_values;
                break;
            case 'chair':
                $values = Chair::all();
                $all_tmp_values = collect();
                $tmp_values = collect();

                foreach ($values as $key => $value)
                {
                    $tmp_values->put('key', $value->id);
                    $tmp_values->put('value', $value->name_of_chair);
                    $all_tmp_values->push($tmp_values);
                    $tmp_values = collect();
                }
                $values = $all_tmp_values;
                break;
        }
        return $values;
    }

    public function change()
    {
        return view("select-table-for-update-base");
    }

    public function select_data_for_update(Request $request)
    {
        $select_data = $request->select_data;
        $data = collect();
        switch ($select_data) {
            case 'discipline':
                $discipline = Discipline::find($request->data);
                $data->push($discipline->name_of_discipline);
                break;
            case 'type_publication':
                $type_publication = TypeOfPublication::find($request->data);
                $data->push($type_publication->type_publication_name);
                break;
            case 'user':
                $user = User::find($request->data);
                $data->push($user->email);
                $data->push($user->last_name);
                $data->push($user->name);
                $data->push($user->middle_name);

                //т.к. присутствует несколько ролей, нужно перебрать от высшего к низшему
                $roles = $user->getRoleNames(); // Returns a collection
                $role_found = false;
                foreach ($roles as $id => $name_role)
                {
                    if($name_role == 'administrator')
                    {
                        $data->push($name_role);
                        $role_found = true;
                        break;
                    }
                }
                if($role_found == false)
                {
                    foreach ($roles as $id => $name_role)
                    {
                        if($name_role == 'moderator')
                        {
                            $data->push($name_role);
                            $role_found = true;
                            break;
                        }
                    }
                }
                if($role_found == false) {
                    foreach ($roles as $id => $name_role) {
                        if ($name_role == 'user') {
                            $data->push($name_role);
                            $role_found = true;
                            break;
                        }
                    }
                }
                break;
            case 'author':
                $author = Author::find($request->data);
                $data->push($author->last_name);
                $data->push($author->name);
                $data->push($author->middle_name);
                break;
            case 'chair':
                $chair = Chair::find($request->data);
                $data->push($chair->name_of_chair);
                break;
        }
        return view("update-base")->with([
            'select_data' => $select_data,
            'data' => $data,
            'id' => $request->data,
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        switch ($request->input('select_data')) {
            case 'discipline':
                $request->validate([
                    'discipline' => 'required',
                ]);
                $discipline = Discipline::find($id);
                $old_name = $discipline->name_of_discipline;
                $discipline->name_of_discipline = $request->input('discipline');
                $new_name = $discipline->name_of_discipline;
                $discipline->save();
                break;
            case 'type_publication':
                $request->validate([
                    'type_publication' => 'required',
                ]);
                $type = TypeOfPublication::find($id);
                $old_name = $type->type_publication_name;
                $type->type_publication_name = $request->input('type_publication');
                $new_name = $type->type_publication_name;
                $type->save();
                break;
            case 'user':
                $request->validate([
                    'user_email' => 'required',
                    'type_user' => 'required',
                    'user_last_name' => 'required',
                    'user_name' => 'required',
                    'user_middle_name' => 'required',
                ]);
                $password = $request->input('user_password');
                $password_confirm = $request->input('user_password_confirm');
                if($password != $password_confirm)
                {
                    Session::flash('error', 'Пароль и подтверждение пароля не совпадают!');
                    return redirect('/update-base');
                }
                $user = User::find($id);
                $old_name = $user->name;
                $user->email = $request->input('user_email');
                if($password != '' || $password != null)
                {
                    $user->password = bcrypt($request->input('user_password'));
                }
                $user->last_name = $request->input('user_last_name');
                $user->name = $request->input('user_name');
                $user->middle_name = $request->input('user_middle_name');
                $new_name = $user->name;
                DB::table('model_has_roles')->where('model_id', '=', $id)->delete();
                $user->assignRole($request->input('type_user'));
                $user->save();
                break;
            case 'author':
                $request->validate([
                    'author_last_name' => 'required',
                    'author_name' => 'required',
                    'author_middle_name' => 'required',
                ]);
                $autor = Author::find($id);
                $old_name = $autor->name;
                $autor->last_name = $request->input('author_last_name');
                $autor->name = $request->input('author_name');
                $autor->middle_name = $request->input('author_middle_name');
                $new_name = $autor->name;
                $autor->save();
                break;
            case 'chair':
                $request->validate([
                    'chair' => 'required',
                ]);
                $chair = Chair::find($id);
                $old_name = $chair->name_of_chair;
                $chair->name_of_chair = $request->input('chair');
                $new_name = $chair->name_of_chair;
                $chair->save();
                break;
        }
        //Session::flash('message', $old_name . ' изменён на ' . $new_name);
        Session::flash('message', 'Изменения сохранены!');
        return redirect('/select-table-for-update-base');
    }

    public function remove()
    {
        return view("select-table-for-remove-from-base");
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $id = $request->input('id');
        switch ($request->input('select_table')) {
            case 'discipline':
                $discipline = Discipline::find($id);
                $plans = Publications::all()->where('discipline_id', '=', $id);
                foreach ($plans as $key => $value) {
                    $deletedRows = AuthorsPublications::where('plan_id', '=', $value->id)->delete();
                    $value->delete();
                    $filePath = glob(public_path() . '/docx/Document_id_' . $value->id . '.docx');
                    if ($filePath != null) {
                        unlink($filePath[0]);
                    }
                }
                $discipline->delete();
                break;
            case 'type_publication':
                $plans = Publications::all()->where('type_publication_id', '=', $id);
                foreach ($plans as $key => $value) {
                    $deletedRows = AuthorsPublications::where('plan_id', '=', $value->id)->delete();
                    $value->delete();
                    $filePath = glob(public_path() . '/docx/Document_id_' . $value->id . '.docx');
                    if ($filePath != null) {
                        unlink($filePath[0]);
                    }
                }
                $type = TypeOfPublication::find($id);
                $name_element = $type->type_publication_name;
                $type->delete();
                break;
            case 'user':
                $user = User::find($id);
                $user->delete();
                DB::table('model_has_roles')->where('model_id', '=', $id)->delete();
                break;
            case 'author':
                $user_publications = AuthorsPublications::all()->where('author_id', '=', $id);
                $deletedRows = AuthorsPublications::where('author_id', '=', $id)->delete();
                foreach ($user_publications as $key => $value) {
                    $count_publication = AuthorsPublications::all()->where('plan_id', '=', $value->plan_id)->count();
                    if ($count_publication == 0) {
                        $deletedRows = Publications::where('id', '=', $value->plan_id)->delete();
                        $filePath = glob(public_path() . '/docx/Document_id_' . $value->plan_id . '.docx');
                        if ($filePath != null) {
                            unlink($filePath[0]);
                        }
                    }
                }
                $autor = Author::find($id);
                $name_element = $autor->name;
                $autor->delete();
                break;
            case 'chair':
                $plans = Publications::all()->where('chair_id', '=', $id);
                foreach ($plans as $key => $value) {
                    $deletedRows = AuthorsPublications::where('plan_id', '=', $value->id)->delete();
                    $value->delete();
                    $filePath = glob(public_path() . '/docx/Document_id_' . $value->id . '.docx');
                    if ($filePath != null) {
                        unlink($filePath[0]);
                    }
                }

                $chair = Chair::find($id);
                $chair->delete();
                break;
        }
        Session::flash('message', 'Данные удалены!');
        return redirect('/select-table-for-remove-from-base');
    }
        /*$elements = $request->input('elements.*');
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

        }*/
    }
