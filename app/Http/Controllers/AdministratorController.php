<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


use App\Models\Government;
use App\Models\InformationSystem;
use App\Models\Passport;
use App\Models\ISType;
use App\Models\User;
use App\Models\Role;


use DateTime;

class AdministratorController extends Controller
{
    /* Auth constructor */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->government_id == 108) {

            $governments = Government::get();
            $users_count = User::count();
            $passports_count = Passport::count();
            $uchet_count = InformationSystem::where('status', 0)->where('send', 1)->count();

            $users = User::orderBy('created_at', 'desc')->paginate(50);
            return View::make('administrator.index', [
                'users' => $users,

                'users_count' => $users_count,
                'passports_count' => $passports_count,
                'uchet_count' => $uchet_count,
                'governments' => $governments
            ]);
        } else {
            echo "Доступ запрещен";
        }
        
        
        
    }


    public function search(Request $request)
    {
        $search_text = strip_tags($request->q);

        if (Auth::user()->government_id == 108) {

            $governments = Government::get();
            $users_count = User::count();
            $passports_count = Passport::count();
            $uchet_count = InformationSystem::where('status', 0)->where('send', 1)->count();

            $users = User::where('surname', 'LIKE', '%'.$search_text.'%')->
            orWhere('name', 'LIKE', '%'.$search_text.'%')->
            orWhere('middlename', 'LIKE', '%'.$search_text.'%')->
            orWhere('email', 'LIKE', '%'.$search_text.'%')->
            orWhere('ip_address', 'LIKE', '%'.$search_text.'%')->
            orderBy('created_at', 'desc')->paginate(50);

            return View::make('administrator.index', [
                'users' => $users,

                'users_count' => $users_count,
                'passports_count' => $passports_count,
                'uchet_count' => $uchet_count,
                'governments' => $governments,
                'search_text' => $search_text
            ]);
        } else {
            echo "Доступ запрещен";
        }
        
        
        
    }


    public function passport()
    {
        if (Auth::user()->government_id == 108) {

            $users_count = User::count();
            $passports_count = Passport::count();
            $uchet_count = InformationSystem::where('status', 0)->where('send', 1)->count();

            $passports = Passport::orderBy('id', 'desc')->paginate(50);
            return View::make('administrator.passport', [
                'passports' => $passports,

                'users_count' => $users_count,
                'passports_count' => $passports_count,
                'uchet_count' => $uchet_count,
            ]);
        } else {
            echo "Доступ запрещен";
        }
        
    }


    public function uchet()
    {
        if (Auth::user()->government_id == 108) {

            $users_count = User::count();
            $passports_count = Passport::count();
            $uchet_count = InformationSystem::where('status', 0)->where('send', 1)->count();


            $infosyses = InformationSystem::where('send', 1)->orderBy('id', 'desc')->paginate(50);
            return View::make('administrator.uchet', [
                'infosyses' => $infosyses,

                'users_count' => $users_count,
                'passports_count' => $passports_count,
                'uchet_count' => $uchet_count,
            ]);
        } else {
            echo "Доступ запрещен";
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if (Auth::user()->government_id == 108) {
            
            $users_count = User::count();
            $passports_count = Passport::count();
            $uchet_count = InformationSystem::where('status', 0)->where('send', 1)->count();
            $governments = Government::get();

            $user_data = User::where('id', $id)->first();
            $roles = Role::all();

            return View::make('administrator.user_edit', [

                'user_data' => $user_data,
                'governments' => $governments,
                'roles' => $roles,

                'users_count' => $users_count,
                'passports_count' => $passports_count,
                'uchet_count' => $uchet_count,

            ]);
            
        } else {
            echo "Доступ запрещен";
        }
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
        if ($request->user()->roles()->where('name', 'ROLE_ADMIN_USER')->exists()) {

            if ( $request->has('update_account') ) {

                if ($request->activity == "on") { $activity = 1; } else { $activity = 0; }

                $updateUser = User::find($id);
                $updateUser->update([
                    'government_id' => $request->go_select,
                    'surname' => $request->surname,
                    'name' => $request->name,
                    'middlename' => $request->middlename,
                    'email' => $request->email,
                    'activity' => $activity
                ]);

                if ( $request->new_password <> null ) {
                    $updateUser->update([
                        'password' => Hash::make($request->new_password)
                    ]); 
                }
                
                return Redirect::back()->with(['successMsg' => 'Учетные данные пользователя пользователя были успешно изменены!']);
            }


        
            if ( $request->has('update_infosys') ) {

                $updateInfoSys = InformationSystem::find($id);
                $updateInfoSys->update([
                    'name_kz' => stripslashes(trim($request->name_kz)),
                    'name_ru' => stripslashes(trim($request->name_ru)),
                    'name_en' => stripslashes(trim($request->name_en)),
                    'abbreviation' => stripslashes(trim($request->abbreviation)),
                    'cgo_mio' => stripslashes(trim($request->cgo_mio)),
                    'comment' => stripslashes(trim($request->comment)),
                    'goverment_id' => $request->go_select,
                    'type_is' => $request->type_select,
                    'status' => $request->status_select
                ]);

                // Если заявка отклонена
                if ( $request->status_select == 2 ) {
                    $updateInfoSys->update([
                        'draft' => 1,
                        'send' => 0
                    ]);
                } else {
                    $updateInfoSys->update([
                        'draft' => 0,
                        'send' => 1
                    ]);
                }
                


                $users_count = User::count();
                $passports_count = Passport::count();
                $uchet_count = InformationSystem::where('status', 0)->where('send', 1)->count();

                $infosys = InformationSystem::where('id', $id)->first();
                $governments = Government::get();
                $types = ISType::get();
                
                return View::make('administrator.uchet_edit', [
                    'infosys' => $infosys,
                    'governments' => $governments,
                    'types' => $types,


                    'users_count' => $users_count,
                    'passports_count' => $passports_count,
                    'uchet_count' => $uchet_count,
                ])->with('successMsg', 'Обновление данных учета сведений прошло успешно' );
            }

            // if ($request->has('update_roles')) {
            //     $user = User::findOrFail($id);
            //     $user->roles()->sync($request->roles); // Обновление ролей пользователя на основе отправленных данных формы
            //     return Redirect::back()->with(['successMsg' => 'Роли пользователя успешно обновлены']);
            // }
            if ($request->has('update_roles')) {
                $user = User::findOrFail($id);
                
                // Очищаем все текущие роли пользователя
                $user->roles()->detach();
                
                // Добавляем новые роли
                foreach ($request->roles as $role) {
                    $user->roles()->attach($role, ['model_type' => 'App\Models\User']);
                }
            
                return Redirect::back()->with(['successMsg' => 'Роли пользователя успешно обновлены']);
            }
            
            
            
        
        } else {
            echo "Доступ запрещен";
        }
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


    public function uchet_edit($id)
    {
        if (Auth::user()->government_id == 108) {

            $users_count = User::count();
            $passports_count = Passport::count();
            $uchet_count = InformationSystem::where('status', 0)->where('send', 1)->count();


            $infosys = InformationSystem::where('id', $id)->first();
            $governments = Government::get();
            $types = ISType::get();

            return View::make('administrator.uchet_edit', [
                'infosys' => $infosys,
                'governments' => $governments,
                'types' => $types,


                'users_count' => $users_count,
                'passports_count' => $passports_count,
                'uchet_count' => $uchet_count,
            ]);
        } else {
            echo "Доступ запрещен";
        }
    }
}
