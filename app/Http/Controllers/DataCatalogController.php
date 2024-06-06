<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

use App\Models\Government;
use App\Models\InformationSystem;
use App\Models\Passport;
use App\Models\User;
use DateTime;

class DataCatalogController extends Controller
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
        $passports = Passport::where('accepted_go', 1)->orderBy('accepted_go_at', 'desc')->get();
        return View::make('datacatalog.index_inbox', [
            'passports' => $passports
        ]);
    }

    public function agreement()
    {
        $governments = Government::all();
        $passports = Passport::where('goverment_id', Auth::user()->government_id)->where('send', '1')->where('approve_users', 'LIKE', '%"' .Auth::user()->id .'"%')->orderBy('id', 'desc')->get();
        
        return View::make('datacatalog.index_agreement', [
            'governments' => $governments,
            'passports' => $passports
        ]);
    }

    public function signing()
    {
        
        if (Auth::user()->government_id == 108) {

            $passports = Passport::where('accepted', 1)->orderBy('accepted_at', 'desc')->get();
            return View::make('datacatalog.index_signing', [
                'passports' => $passports
            ]);

        } else {
            // Не существующий паспорт (чтобы в blade закинуть пустые значения)
            $passports = Passport::where('id', 100000000000)->get();
            return View::make('datacatalog.index_signing', [
                'passports' => $passports
            ]);
        }
        
    }

    public function outbox()
    {
        $passports = Passport::where('user_id', Auth::user()->id)->where('send', '1')->orderBy('id', 'desc')->get();
        return View::make('datacatalog.index_outbox', [
            'passports' => $passports
        ]);
    }

    public function draft()
    {
        $passports = Passport::where('draft', '1')->orderBy('id', 'desc')->paginate(10);
        return View::make('datacatalog.index_draft', [
            'passports' => $passports
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governments = Government::where('id', Auth::user()->government_id)->get();
        $approve_users = User::where('government_id', Auth::user()->government_id)->where('activity', 1)->where('id', '<>', Auth::user()->id)->get();
        return View::make('datacatalog.index_create', [
            'governments' => $governments,
            'approve_users' => $approve_users
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
        $governments = Government::all();
        $approve_users = User::where('government_id', Auth::user()->government_id)->where('activity', 1)->where('id', '<>', Auth::user()->id)->get();

        if ( $request->has('save_send') ) {

            if ( empty($request->approve_users) ) {

                return View::make('datacatalog.index_create', [
                    'governments' => $governments,
                    'approve_users' => $approve_users
                ])->with('errorMsg', "Не выбраны сотрудники для согласования. Отправка паспорта данных невозможна." );

            } else {

                /* загрузка файла */
                $uploadedFile = $request->file('file_excel');

                $file_excel_upload = $uploadedFile->store('userfiles/passports');
                $file_excel = $request->file('file_excel')->getClientOriginalName();
                $file_excel_type = $uploadedFile->getMimeType();
                $file_excel_size = $uploadedFile->getSize();
                /* Конец загрузки файла */

                $addPassport = Passport::create([
                    'user_id' => Auth::user()->id,
                    'goverment_id' => $request->go_select,
                    'information_systems_id' => $request->is_select,
                    'approve_users' => json_encode($request->approve_users),
                    'data_used' => $request->data_used,
                    'data_enter' => $request->data_enter,
                    'data_first' => $request->data_first,
                    'data_agregate' => $request->data_agregate,
                    'data_access_only' => $request->data_access_only,
                    'data_access_free' => $request->data_access_free,
                    'users_npa' => $request->users_npa,
                    'data_source' => $request->data_source,
                    'data_source_fact' => $request->data_source_fact,
                    'object_description' => $request->object_description,
                    'interval_update' => $request->interval_update,
                    'graphic_update' => $request->graphic_update,
                    'update_rules' => $request->update_rules,
                    'geo' => $request->geo,
                    'geo_type' => $request->geo_type,
                    'npa_list' => $request->npa_list,
                    'npa_list_reglament' => $request->npa_list_reglament,
                    'npa_list_rules' => $request->npa_list_rules,
                    'info_object' => $request->info_object,
                    'object_used' => $request->object_used,
                    'object_change' => $request->object_change,
                    
                    'file_excel' => $file_excel,
                    'file_excel_upload' => $file_excel_upload,
                    'file_excel_type' => $file_excel_type,
                    'file_excel_size' => $file_excel_size,

                    'type_name_data' => $request->type_name_data,
                    'object_name_data' => $request->object_name_data,
                    'data_class' => $request->data_class,
                    'npa_data' => $request->npa_data,
                    'form_approve' => $request->form_approve,
                    'degree_access' => $request->degree_access,
                    'priznak_public' => $request->priznak_public,
                    'date_publication' => $request->date_publication,
                    'file_sostav' => $request->file_sostav,
                    'block_indicator' => $request->block_indicator,
                    'name_indicator' => $request->name_indicator,
                    'block_type' => $request->block_type,
                    'block_value' => $request->block_value,
                    'draft' => '0',
                    'send' => '1'
                ]);

                return View::make('datacatalog.index_create', [
                    'governments' => $governments,
                    'approve_users' => $approve_users
                ])->with('successMsg', trans('app.dc_save_send_ok') );
            
            }

        } else {

            /* загрузка файла */
            $uploadedFile = $request->file('file_excel');

            $file_excel_upload = $uploadedFile->store('userfiles/passports');
            $file_excel = $request->file('file_excel')->getClientOriginalName();
            $file_excel_type = $uploadedFile->getMimeType();
            $file_excel_size = $uploadedFile->getSize();
            /* Конец загрузки файла */

            $addPassport = Passport::create([
                'user_id' => Auth::user()->id,
                'goverment_id' => $request->go_select,
                'information_systems_id' => $request->is_select,
                'approve_users' => json_encode($request->approve_users),
                'data_used' => $request->data_used,
                'data_enter' => $request->data_enter,
                'data_first' => $request->data_first,
                'data_agregate' => $request->data_agregate,
                'data_access_only' => $request->data_access_only,
                'data_access_free' => $request->data_access_free,
                'users_npa' => $request->users_npa,
                'data_source' => $request->data_source,
                'data_source_fact' => $request->data_source_fact,
                'object_description' => $request->object_description,
                'interval_update' => $request->interval_update,
                'graphic_update' => $request->graphic_update,
                'update_rules' => $request->update_rules,
                'geo' => $request->geo,
                'geo_type' => $request->geo_type,
                'npa_list' => $request->npa_list,
                'npa_list_reglament' => $request->npa_list_reglament,
                'npa_list_rules' => $request->npa_list_rules,
                'info_object' => $request->info_object,
                'object_used' => $request->object_used,
                'object_change' => $request->object_change,
                
                'file_excel' => $file_excel,
                'file_excel_upload' => $file_excel_upload,
                'file_excel_type' => $file_excel_type,
                'file_excel_size' => $file_excel_size,

                'type_name_data' => $request->type_name_data,
                'object_name_data' => $request->object_name_data,
                'data_class' => $request->data_class,
                'npa_data' => $request->npa_data,
                'form_approve' => $request->form_approve,
                'degree_access' => $request->degree_access,
                'priznak_public' => $request->priznak_public,
                'date_publication' => $request->date_publication,
                'file_sostav' => $request->file_sostav,
                'block_indicator' => $request->block_indicator,
                'name_indicator' => $request->name_indicator,
                'block_type' => $request->block_type,
                'block_value' => $request->block_value,
                'draft' => '1',
                'send' => '0'
            ]);

            return View::make('datacatalog.index_create', [
                'governments' => $governments,
                'approve_users' => $approve_users
            ])->with('successMsg', trans('app.dc_save_draft_ok') );

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
        
        $passport = Passport::where('id', $id)->where('accepted_go', 1)->first();
        return View::make('datacatalog.index_show', [
            'passport' => $passport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $governments = Government::where('id', Auth::user()->government_id)->get();
        $passport = Passport::where('id', $id)->where('user_id', Auth::user()->id)->where('draft', 1)->first();
        $approve_users = User::where('government_id', Auth::user()->government_id)->where('activity', 1)->where('id', '<>', Auth::user()->id)->get();

        return View::make('datacatalog.index_edit', [
            'governments' => $governments,
            'passport' => $passport,
            'approve_users' => $approve_users
        ]);
    }



    public function agreementedit($id)
    {
        $passport = Passport::where('id', $id)->where('send', 1)->first();
        return View::make('datacatalog.index_agreementedit', [
            'passport' => $passport
        ]);
    }


    public function signingedit($id)
    {
        $passport = Passport::where('id', $id)->where('accepted', 1)->first();
        return View::make('datacatalog.index_signingedit', [
            'passport' => $passport
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
        if ( $request->has('passport_signin_discart') ) {
            // Нажата кнопка "Отправить на доработку" на форме "На согласовании"

            $acceptedPassport = Passport::find($id);
            $acceptedPassport->update([
                'comment' => $request->comment,
                'send' => '0',
                'draft' => '1',
                'discarted_go' => 1,
                'discarted_go_at' => new DateTime(),
                'accepted_go' => NULL,
                'accepted_go_at' => NULL,
                'accepted' => NULL,
                'accepted_at' => NULL
            ]);

            $passports = Passport::where('accepted', 1)->orderBy('accepted_at', 'desc')->get();
            return View::make('datacatalog.index_signing', [
                'passports' => $passports
            ]);


        } elseif ( $request->has('passport_signin_accept') ) {
            // Нажата кнопка "Согласовать паспорт" на форме "На согласовании"

            $acceptedPassport = Passport::find($id);
            $acceptedPassport->update([
                'comment' => $request->comment,
                'discarted_go' => NULL,
                'discarted_go_at' => NULL,
                'accepted_go' => '1',
                'accepted_go_at' => new DateTime()
            ]);

            $passports = Passport::where('accepted', 1)->orderBy('accepted_at', 'desc')->get();
            return View::make('datacatalog.index_signing', [
                'passports' => $passports
            ]);

        
        } elseif ( $request->has('passport_accepted') ) {
            // Нажата кнопка "Согласовать паспорт" на форме "На утверждении"

            $acceptedPassport = Passport::find($id);
            $acceptedPassport->update([
                'comment' => $request->comment,
                'discarted' => NULL,
                'discarted_at' => NULL,
                'discarted_go' => NULL,
                'discarted_go_at' => NULL,
                'accepted' => '1',
                'accepted_at' => new DateTime()
            ]);

            $governments = Government::all();
            $passports = Passport::where('goverment_id', Auth::user()->government_id)->where('send', '1')->where('approve_users', 'LIKE', '%' .Auth::user()->id .'%')->orderBy('id', 'desc')->get();
            return View::make('datacatalog.index_agreement', [
                'governments' => $governments,
                'passports' => $passports
            ]);

        
        } elseif ( $request->has('passport_discarted') ) {
            // Нажата кнопка "Отправить на доработку" на форме "На утверждении"

            $discartPassport = Passport::find($id);
            $discartPassport->update([
                'comment' => $request->comment,
                'send' => '0',
                'draft' => '1',
                'discarted' => '1',
                'discarted_at' => new DateTime(),
                'accepted' => NULL,
                'accepted_at' => NULL
            ]);

            $governments = Government::all();
            $passports = Passport::where('goverment_id', Auth::user()->government_id)->where('send', '1')->where('approve_users', 'LIKE', '%' .Auth::user()->id .'%')->orderBy('id', 'desc')->get();
            return View::make('datacatalog.index_agreement', [
                'governments' => $governments,
                'passports' => $passports
            ]);

        
        } elseif ( $request->has('save_send') ) {
            // Нажата кнопка "Сохранить и отправить" при создании паспорта

            if ( empty($request->approve_users) ) {

                $governments = Government::all();
                $passport = Passport::where('id', $id)->where('user_id', Auth::user()->id)->first();
                $approve_users = User::where('government_id', Auth::user()->government_id)->where('activity', 1)->where('id', '<>', Auth::user()->id)->get();

                return View::make('datacatalog.index_edit', [
                    'governments' => $governments,
                    'passport' => $passport,
                    'approve_users' => $approve_users
                ])->with('errorMsg', "Не выбраны сотрудники для согласования. Отправка паспорта данных невозможна." );

            } else {

                $updatePassport = Passport::find($id);
                $updatePassport->update([

                    'goverment_id' => $request->go_select,
                    'information_systems_id' => $request->is_select,
                    'approve_users' => json_encode($request->approve_users),
                    'data_used' => $request->data_used,
                    'data_enter' => $request->data_enter,
                    'data_first' => $request->data_first,
                    'data_agregate' => $request->data_agregate,
                    'data_access_only' => $request->data_access_only,
                    'data_access_free' => $request->data_access_free,
                    'users_npa' => $request->users_npa,
                    'data_source' => $request->data_source,
                    'data_source_fact' => $request->data_source_fact,
                    'object_description' => $request->object_description,
                    'interval_update' => $request->interval_update,
                    'graphic_update' => $request->graphic_update,
                    'update_rules' => $request->update_rules,
                    'geo' => $request->geo,
                    'geo_type' => $request->geo_type,
                    'npa_list' => $request->npa_list,
                    'npa_list_reglament' => $request->npa_list_reglament,
                    'npa_list_rules' => $request->npa_list_rules,
                    'info_object' => $request->info_object,
                    'object_used' => $request->object_used,
                    'object_change' => $request->object_change,
                    
                    'type_name_data' => $request->type_name_data,
                    'object_name_data' => $request->object_name_data,
                    'data_class' => $request->data_class,
                    'npa_data' => $request->npa_data,
                    'form_approve' => $request->form_approve,
                    'degree_access' => $request->degree_access,
                    'priznak_public' => $request->priznak_public,
                    'date_publication' => $request->date_publication,
                    
                    'block_indicator' => $request->block_indicator,
                    'name_indicator' => $request->name_indicator,
                    'block_type' => $request->block_type,
                    'block_value' => $request->block_value,
                    'draft' => '0',
                    'send' => '1',
                    'discarted' => null,
                    'discarted_at' => null,
                ]);

                /* Обновление или загрузка файла */
                $uploadedFile = $request->file('file_excel');
                if (!empty($uploadedFile)) {

                    $file_excel_upload = $uploadedFile->store('userfiles/passports');
                    $file_excel = $request->file('file_excel')->getClientOriginalName();
                    $file_excel_type = $uploadedFile->getMimeType();
                    $file_excel_size = $uploadedFile->getSize();

                    $updatePassport->update([
                        'file_excel' => $file_excel,
                        'file_excel_upload' => $file_excel_upload,
                        'file_excel_type' => $file_excel_type,
                        'file_excel_size' => $file_excel_size
                    ]);   
                }
                /* Конец обновления или загрузки файла */

                $governments = Government::all();
                $passport = Passport::where('id', $id)->where('user_id', Auth::user()->id)->first();
                $approve_users = User::where('government_id', Auth::user()->government_id)->where('activity', 1)->where('id', '<>', Auth::user()->id)->get();

                return View::make('datacatalog.index_edit', [
                    'governments' => $governments,
                    'passport' => $passport,
                    'approve_users' => $approve_users
                ])->with('successMsg', trans('app.dc_save_send_edit_ok') );

            }

        
        } else {

            // Нажата кнопка "Сохранить как черновик" при создании паспорта

            $updatePassport = Passport::find($id);
            $updatePassport->update([
                
                'goverment_id' => $request->go_select,
                'information_systems_id' => $request->is_select,
                'approve_users' => json_encode($request->approve_users),
                'data_used' => $request->data_used,
                'data_enter' => $request->data_enter,
                'data_first' => $request->data_first,
                'data_agregate' => $request->data_agregate,
                'data_access_only' => $request->data_access_only,
                'data_access_free' => $request->data_access_free,
                'users_npa' => $request->users_npa,
                'data_source' => $request->data_source,
                'data_source_fact' => $request->data_source_fact,
                'object_description' => $request->object_description,
                'interval_update' => $request->interval_update,
                'graphic_update' => $request->graphic_update,
                'update_rules' => $request->update_rules,
                'geo' => $request->geo,
                'geo_type' => $request->geo_type,
                'npa_list' => $request->npa_list,
                'npa_list_reglament' => $request->npa_list_reglament,
                'npa_list_rules' => $request->npa_list_rules,
                'info_object' => $request->info_object,
                'object_used' => $request->object_used,
                'object_change' => $request->object_change,
                
                'type_name_data' => $request->type_name_data,
                'object_name_data' => $request->object_name_data,
                'data_class' => $request->data_class,
                'npa_data' => $request->npa_data,
                'form_approve' => $request->form_approve,
                'degree_access' => $request->degree_access,
                'priznak_public' => $request->priznak_public,
                'date_publication' => $request->date_publication,
                
                
                'block_indicator' => $request->block_indicator,
                'name_indicator' => $request->name_indicator,
                'block_type' => $request->block_type,
                'block_value' => $request->block_value,
                'draft' => '1',
                'send' => '0'
            ]);


            /* Обновление или загрузка файла */
            $uploadedFile = $request->file('file_excel');
            if (!empty($uploadedFile)) {

                $file_excel_upload = $uploadedFile->store('userfiles/passports');
                $file_excel = $request->file('file_excel')->getClientOriginalName();
                $file_excel_type = $uploadedFile->getMimeType();
                $file_excel_size = $uploadedFile->getSize();

                $updatePassport->update([
                    'file_excel' => $file_excel,
                    'file_excel_upload' => $file_excel_upload,
                    'file_excel_type' => $file_excel_type,
                    'file_excel_size' => $file_excel_size
                ]);   
            }
            /* Конец обновления или загрузки файла */


            $governments = Government::all();
            $passport = Passport::where('id', $id)->where('user_id', Auth::user()->id)->first();
            $approve_users = User::where('government_id', Auth::user()->government_id)->where('activity', 1)->where('id', '<>', Auth::user()->id)->get();

            return View::make('datacatalog.index_edit', [
                'governments' => $governments,
                'passport' => $passport,
                'approve_users' => $approve_users
            ])->with('successMsg', trans('app.dc_save_draft_edit_ok') );

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
        dd($id);
        $passports = Passport::where('draft', '1')->orderBy('id', 'desc')->get();
        return View::make('datacatalog.index_draft', [
            'passports' => $passports
        ]);
    }




    public function getis(Request $request)
    {
        if ($request->ajax()) {
            
            $InformationSystems = InformationSystem::where('goverment_id', $request->goid)->where('status', 1)->get();
            

            $data = View::make('datacatalog.select_is', [
                'InformationSystems' => $InformationSystems,
                'passport' => $request->isid,
            ])->render();

            return response()->json(['options'=>$data]);
        }
        
    }

}
