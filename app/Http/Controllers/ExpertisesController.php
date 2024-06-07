<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade as PDF;



use App\Models\Government;
use App\Models\InformationSystem;
use App\Models\It_Project;
use App\Models\Expertise;
use App\Models\ExpertiseVersion;
use App\Models\ExpertiseConclutionSi;
use App\Models\ExpertiseConclutionUo;
use App\Models\ExpertiseConclutionGts;
use App\Models\ExpertiseRoleStatus;
use App\Models\ExpertiseDocument;
use App\Models\TechnicalTask;
use App\Models\User;


use DateTime;

class ExpertisesController extends Controller
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
        $govs = Government::all();
        $expertise = Expertise::where('user_id', '1')->first();

        return View::make('expertise.index', [
            'govs' => $govs,
            'expertise' => $expertise
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
        return View::make('expertise.create', [
            'projects' => $projects
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
        // Создаем новый IT-проект
        if ( $request->has('create_it') ) {

            $name_kz = strip_tags( trim($request->name_kz) );
            $name_ru = strip_tags( trim($request->name_ru) );
            $name_en = strip_tags( trim($request->name_en) );
            
            // Проверка на уникальность
            $chectIT = It_Project::where('user_id', Auth::user()->id)->where('name_ru', $name_ru)->orWhere('name_kz', $name_kz)->orWhere('name_en', $name_en)->count();

            if ($chectIT === 0) {

                $addIT = IT_Project::create([
                    'user_id' => Auth::user()->id,
                    'goverment_id' => Auth::user()->government_id,
                    'name_kz' => $request->name_kz,
                    'name_ru' => $request->name_ru,
                    'name_en' => $request->name_en
                ]);

                $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
                return View::make('expertise.create', [
                    'projects' => $projects
                ])->with('successMsg', 'IT-проект успешно добавлен, можете приступить к созданию запроса на экспертизу');


            } else {

                $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
                return View::make('expertise.create', [
                    'projects' => $projects
                ])->with('errorMsg', 'Невозможно создать IT-проект с таким названием. Подобный уже существует');

            }

        // Создаем предварительный драфт экспертизы для IT-проекта
        } elseif ( $request->has('create_draft') ) {

            $chectExpertise = Expertise::
                where('goverment_id', Auth::user()->government_id)->
                where('user_id', Auth::user()->id)->
                where('it_project_id', $request->it_project)->
                where('type_project', $request->project_type)->
                count();


            // Строчку ниже раскомментировать после теста, чтобы корректно проходила проверка на уникальность IT-проекта    
            //if ( $chectExpertise >= 0 ) { 
            if ( $chectExpertise == 0 ) { 

                $addExpertise = Expertise::create([
                    'user_id' => Auth::user()->id,
                    'goverment_id' => Auth::user()->government_id,
                    'it_project_id' => $request->it_project,
                    'type_project' => $request->project_type,
                    'version_expertise' => '0'
                ]);

                // $addExpertise->id  -  это ID последней записи в базу, добавленной запросом выше

                $expertise = Expertise::where('id', $addExpertise->id)->first();
                $iss = InformationSystem::where('goverment_id', Auth::user()->government_id)->get();
                $users = User::all();
                $versions = Expertise::where('id', $expertise->id)->get();

                return View::make('expertise.create_version', [
                    'expertise' => $expertise,
                    'iss' => $iss,
                    'it_project_id' => $request->it_project,
                    'type_project' => $request->project_type,
                    'users' => $users,
                    'versions' => $versions
                ]);
                // return View::make('expertise.create_data', [
                //     'expertise' => $expertise,
                //     'iss' => $iss,
                //     'it_project_id' => $request->it_project,
                //     'type_project' => $request->project_type,
                //     'users' => $users
                // ]);


            } else {
                $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
                return redirect()->route('expertise.draft')->with('errorMsg', 'Невозможно создать запрос на экспертизу, так как аналогичный уже существует');
            }

        // Сохранения черновика (драфта) при нажатии кнопки во вкладках табуляции
        } elseif( $request->has('save_draft_tab') ) {


            /* ШАГ 1. Записываем данные технического задания */
            $chectTechnicalTask = TechnicalTask::
                where('government_id', Auth::user()->government_id)->
                where('user_id', Auth::user()->id)->
                where('it_project_id', $request->it_project_id)->
                where('type_project', $request->type_project)->
                where('expertise_id', $request->expertise_id)->
                count();
                
            if ( $chectTechnicalTask == 0 ) {

                $addTechnicalTask = TechnicalTask::create([
                    'user_id' => Auth::user()->id,
                    'government_id' => Auth::user()->government_id,
                    'it_project_id' => $request->it_project_id,
                    'type_project' => $request->type_project,
                    'expertise_id' => $request->expertise_id,
                    'version' => '1',
                    'part_1' => $request->editor_1,
                    'part_2' => $request->editor_2,
                    'part_3' => $request->editor_3,
                    'part_4' => $request->editor_4,
                    'part_5' => $request->editor_5,
                    'part_6' => $request->editor_6,
                    'part_7' => $request->editor_7,
                    'part_8' => $request->editor_8,
                    'part_9' => $request->editor_9,
                    'part_10' => $request->editor_10,
                    'part_11' => $request->editor_11,
                    'part_12' => $request->editor_12
                ]);
                
                $ID_TechnicalTask = $addTechnicalTask->id;
            
            } else {
                $updateTechnicalTask =  TechnicalTask::find($request->tz_id);
                $updateTechnicalTask->update([
                    'version' => '2',
                    'part_1' => $request->editor_1,
                    'part_2' => $request->editor_2,
                    'part_3' => $request->editor_3,
                    'part_4' => $request->editor_4,
                    'part_5' => $request->editor_5,
                    'part_6' => $request->editor_6,
                    'part_7' => $request->editor_7,
                    'part_8' => $request->editor_8,
                    'part_9' => $request->editor_9,
                    'part_10' => $request->editor_10,
                    'part_11' => $request->editor_11,
                    'part_12' => $request->editor_12
                ]);

                
                // $TechnicalTask = TechnicalTask::
                // where('government_id', Auth::user()->government_id)->
                // where('user_id', Auth::user()->id)->
                // where('it_project_id', $request->it_project_id)->
                // where('type_project', $request->type_project)->
                // where('expertise_id', $request->expertise_id)->
                // first();
                

                $ID_TechnicalTask = $request->tz_id;
            }
            /* Конец ШАГА 1. */


            /* ШАГ 2. Обновление или загрузка файла */
            $uploadedFile = $request->file('doc_file');
            if (!empty($uploadedFile)) {

                $file_upload = $uploadedFile->store('userfiles/expertisefile');
                $file_name = $request->file('doc_file')->getClientOriginalName();
                $file_type = $uploadedFile->getMimeType();
                $file_size = $uploadedFile->getSize();

                $addFile = ExpertiseDocument::create([
                    'user_id' => Auth::user()->id,
                    'government_id' => Auth::user()->government_id,
                    'it_project_id' => $request->it_project_id,
                    'type_project' => $request->type_project,
                    'expertise_id' => $request->expertise_id,
                    
                    'doc_status' => $request->doc_status,
                    'doc_lang' => $request->doc_lang,
                    'doc_type' => $request->doc_type,
                    'doc_version' => $request->doc_version,
                    'doc_year' => $request->doc_year,
                    'doc_name' => $request->doc_name,
                    
                    'file_name' => $file_name,
                    'file_name_upload' => $file_upload,
                    'file_type' => $file_type,
                    'file_size' => $file_size
                ]);   
                $ID_File = $addFile->id;
            } else {
                $ID_File = NULL;
            }



            if ( isset($request->document_id)) {

                $uploadedFile = $request->file('doc_file');
                if (!empty($uploadedFile)) {

                    $file_upload = $uploadedFile->store('userfiles/expertisefile');
                    $file_name = $request->file('doc_file')->getClientOriginalName();
                    $file_type = $uploadedFile->getMimeType();
                    $file_size = $uploadedFile->getSize();
    
                    $updateFile = ExpertiseDocument::find($request->document_id);
                    $updateFile->update([
                        'user_id' => Auth::user()->id,
                        'government_id' => Auth::user()->government_id,
                        'it_project_id' => $request->it_project_id,
                        'type_project' => $request->type_project,
                        'expertise_id' => $request->expertise_id,
                        
                        'doc_status' => $request->doc_status,
                        'doc_lang' => $request->doc_lang,
                        'doc_type' => $request->doc_type,
                        'doc_version' => $request->doc_version,
                        'doc_year' => $request->doc_year,
                        'doc_name' => $request->doc_name,
                        
                        'file_name' => $file_name,
                        'file_name_upload' => $file_upload,
                        'file_type' => $file_type,
                        'file_size' => $file_size
                    ]);   
                    
                } else {
                    $updateFile = ExpertiseDocument::find($request->document_id);
                    $updateFile->update([
                        'user_id' => Auth::user()->id,
                        'government_id' => Auth::user()->government_id,
                        'it_project_id' => $request->it_project_id,
                        'type_project' => $request->type_project,
                        'expertise_id' => $request->expertise_id,
                        
                        'doc_status' => $request->doc_status,
                        'doc_lang' => $request->doc_lang,
                        'doc_type' => $request->doc_type,
                        'doc_version' => $request->doc_version,
                        'doc_year' => $request->doc_year,
                        'doc_name' => $request->doc_name,
                    ]); 
                }

                $ID_File = $updateFile->id;
                
            }
            /* Конец ШАГА 2. */


            /* ШАГ 3. запись данных в таблицу экспертизы */
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'abbr' => $request->abbr,
                'num_poject' => $request->num_poject,
                'company' => $request->company,
                'address' => $request->address,
                'сustomer' => $request->сustomer,
                'address_customer' => $request->address_customer,
                'list_docs' => $request->list_docs,
                'dates_start_end' => $request->dates_start_end,
                'finanсes' => $request->finanсes,
                'is_appointment' => $request->is_appointment,
                'is_target' => $request->is_target,
                'type_ntd' => $request->type_ntd,
                'basis_development' => $request->basis_development,
                'links' => $request->links,
                'build_year' => $request->build_year,
                'gosproject' => $request->gosproject,
                'sostav' => $request->sostav,
                'modules' => $request->modules,
                'po' => $request->po,
                'hosting' => $request->hosting,
                'selected_is_for_change' => $request->selected_is_for_change,
                'selected_is_for_exit' => $request->selected_is_for_exit,
                'paln_integrations' => $request->paln_integrations,
                'documents_list' => json_encode($ID_File),
                'version_expertise' => '1',
                'draft' => '1',
                'send' => '0',
                'comment_accept' => $request->comment
            ]);
            
            
            
            /* Конец ШАГА 3. */
            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Запрос на экспертизу успешно создан и сохранен в черновики');


        // Сохранение и отправка документа при нажатии кнопки во вкладках табуляции (файл create_data.blade.php)
        } elseif( $request->has('create_and_send_tab') ) {

            $selectedApproverId1 = $request->input('approver_id1');
            $selectedSignerId = $request->input('signer_id');


            // $expertiseId = Expertise::latest()->first()->id;
            $expertise = Expertise::latest()->first();
            // $expertiseId = $expertise->expertise_id;


            // Создание записи в таблице ExpertiseRoleStatus для согласующего
            $expertiseRoleStatusApprover1 = ExpertiseRoleStatus::create([
                'user_id' => isset($selectedApproverId1) ? $selectedApproverId1 : 0,
                'expertise_id' => $request->expertise_id,
                'approve' => ($selectedApproverId1 != null),
            ]);

            // Создание Roleзаписи в таблице ExpeRolertiseRoleStatus для подписанта
            $expertiseRoleStatusSigner = ExpertiseRoleStatus::create([
                'user_id' => $selectedSignerId,
                'expertise_id' => $request->expertise_id,
                'signing' => ($selectedSignerId != null)
            ]);


            /* ШАГ 1. Записываем данные технического задания */
            $chectTechnicalTask = TechnicalTask::
                where('government_id', Auth::user()->government_id)->
                where('user_id', Auth::user()->id)->
                where('it_project_id', $request->it_project_id)->
                where('type_project', $request->type_project)->
                where('expertise_id', $request->expertise_id)->
                // where('expertise_id', $expertiseId)->
                count();

                // dd($chectTechnicalTask);
                
            if ( $chectTechnicalTask == 0 ) {
                
                $addTechnicalTask = TechnicalTask::create([
                    'user_id' => Auth::user()->id,
                    'government_id' => Auth::user()->government_id,
                    'it_project_id' => $request->it_project_id,
                    'type_project' => $request->type_project,
                    'expertise_id' => $request->expertise_id,
                    // 'expertise_id' => $expertiseId,
                    'version' => 1,
                    'part_1' => $request->editor_1,
                    'part_2' => $request->editor_2,
                    'part_3' => $request->editor_3,
                    'part_4' => $request->editor_4,
                    'part_5' => $request->editor_5,
                    'part_6' => $request->editor_6,
                    'part_7' => $request->editor_7,
                    'part_8' => $request->editor_8,
                    'part_9' => $request->editor_9,
                    'part_10' => $request->editor_10,
                    'part_11' => $request->editor_11,
                    'part_12' => $request->editor_12
                ]);
                
                $ID_TechnicalTask = $addTechnicalTask->id;
            
             } 
            //else {
            //     $updateTechnicalTask =  TechnicalTask::find($request->tz_id);
            //     $updateTechnicalTask->update([
            //         'version' => '2',
            //         'part_1' => $request->editor_1,
            //         'part_2' => $request->editor_2,
            //         'part_3' => $request->editor_3,
            //         'part_4' => $request->editor_4,
            //         'part_5' => $request->editor_5,
            //         'part_6' => $request->editor_6,
            //         'part_7' => $request->editor_7,
            //         'part_8' => $request->editor_8,
            //         'part_9' => $request->editor_9,
            //         'part_10' => $request->editor_10,
            //         'part_11' => $request->editor_11,
            //         'part_12' => $request->editor_12
            //     ]);
            //     $ID_TechnicalTask = $request->tz_id;
            // }

            else {
                    $lastVersionNumber = TechnicalTask::where('expertise_id', $request->expertise_id)->max('version');
                    $updateTechnicalTask =  TechnicalTask::find($request->tz_id);
                    $addTechnicalTask = TechnicalTask::create([
                        'user_id' => Auth::user()->id,
                        'government_id' => Auth::user()->government_id,
                        'it_project_id' => $request->it_project_id,
                        'type_project' => $request->type_project,
                        'expertise_id' => $request->expertise_id,
                        // 'expertise_id' => $expertiseId,
                        'version' => $lastVersionNumber + 1,
                        'part_1' => $request->editor_1,
                        'part_2' => $request->editor_2,
                        'part_3' => $request->editor_3,
                        'part_4' => $request->editor_4,
                        'part_5' => $request->editor_5,
                        'part_6' => $request->editor_6,
                        'part_7' => $request->editor_7,
                        'part_8' => $request->editor_8,
                        'part_9' => $request->editor_9,
                        'part_10' => $request->editor_10,
                        'part_11' => $request->editor_11,
                        'part_12' => $request->editor_12
                    ]);
                    $ID_TechnicalTask = $request->tz_id;
                }
            /* Конец ШАГА 1. */


            /* ШАГ 2. Обновление или загрузка файла */
            $uploadedFile = $request->file('doc_file');
            if (!empty($uploadedFile)) {
                $lastVersionNumber = ExpertiseDocument::where('expertise_id', $request->expertise_id)->max('version');
                if($lastVersionNumber >= 1){

                $file_upload = $uploadedFile->store('userfiles/expertisefile');
                $file_name = $request->file('doc_file')->getClientOriginalName();
                $file_type = $uploadedFile->getMimeType();
                $file_size = $uploadedFile->getSize();
                $addFile = ExpertiseDocument::create([
                    'user_id' => Auth::user()->id,
                    'government_id' => Auth::user()->government_id,
                    'it_project_id' => $request->it_project_id,
                    'type_project' => $request->type_project,
                    'expertise_id' => $request->expertise_id,
                    // 'expertise_id' => $expertiseId,
                    'version' => $lastVersionNumber + 1,
                    
                    'doc_status' => $request->doc_status,
                    'doc_lang' => $request->doc_lang,
                    'doc_type' => $request->doc_type,
                    'doc_version' => $request->doc_version,
                    'doc_year' => $request->doc_year,
                    'doc_name' => $request->doc_name,
                    
                    'file_name' => $file_name,
                    'file_name_upload' => $file_upload,
                    'file_type' => $file_type,
                    'file_size' => $file_size
                ]);   
                $ID_File = $addFile->id;
               }else{
                $file_upload = $uploadedFile->store('userfiles/expertisefile');
                $file_name = $request->file('doc_file')->getClientOriginalName();
                $file_type = $uploadedFile->getMimeType();
                $file_size = $uploadedFile->getSize();
                $addFile = ExpertiseDocument::create([
                    'user_id' => Auth::user()->id,
                    'government_id' => Auth::user()->government_id,
                    'it_project_id' => $request->it_project_id,
                    'type_project' => $request->type_project,
                    'expertise_id' => $request->expertise_id,
                    // 'expertise_id' => $expertiseId,
                    'version' => 1,
                    
                    'doc_status' => $request->doc_status,
                    'doc_lang' => $request->doc_lang,
                    'doc_type' => $request->doc_type,
                    'doc_version' => $request->doc_version,
                    'doc_year' => $request->doc_year,
                    'doc_name' => $request->doc_name,
                    
                    'file_name' => $file_name,
                    'file_name_upload' => $file_upload,
                    'file_type' => $file_type,
                    'file_size' => $file_size
                ]);   
                $ID_File = $addFile->id;
               }
            } else {
                $ID_File = NULL;
            }


            // if ( isset($request->document_id)) {

            //     $uploadedFile = $request->file('doc_file');
            //     if (!empty($uploadedFile)) {

            //         $file_upload = $uploadedFile->store('userfiles/expertisefile');
            //         $file_name = $request->file('doc_file')->getClientOriginalName();
            //         $file_type = $uploadedFile->getMimeType();
            //         $file_size = $uploadedFile->getSize();
    
            //         $updateFile = ExpertiseDocument::find($request->document_id);
            //         $updateFile->update([
            //             'user_id' => Auth::user()->id,
            //             'government_id' => Auth::user()->government_id,
            //             'it_project_id' => $request->it_project_id,
            //             'type_project' => $request->type_project,
            //             'expertise_id' => $request->expertise_id,

                        
            //             'doc_status' => $request->doc_status,
            //             'doc_lang' => $request->doc_lang,
            //             'doc_type' => $request->doc_type,
            //             'doc_version' => $request->doc_version,
            //             'doc_year' => $request->doc_year,
            //             'doc_name' => $request->doc_name,
                        
            //             'file_name' => $file_name,
            //             'file_name_upload' => $file_upload,
            //             'file_type' => $file_type,
            //             'file_size' => $file_size
            //         ]);   
                    
            //     } else {
            //         $updateFile = ExpertiseDocument::find($request->document_id);
            //         $updateFile->update([
            //             'user_id' => Auth::user()->id,
            //             'government_id' => Auth::user()->government_id,
            //             'it_project_id' => $request->it_project_id,
            //             'type_project' => $request->type_project,
            //             'expertise_id' => $request->expertise_id,
                        
            //             'doc_status' => $request->doc_status,
            //             'doc_lang' => $request->doc_lang,
            //             'doc_type' => $request->doc_type,
            //             'doc_version' => $request->doc_version,
            //             'doc_year' => $request->doc_year,
            //             'doc_name' => $request->doc_name,
            //         ]); 
            //     }

            //     $ID_File = $updateFile->id;
                
            //}
            
            /* Конец ШАГА 2. */


            /* ШАГ 3. запись данных в таблицу экспертизы */
                $VersionNumber = (int) Expertise::where('id', $request->expertise_id)->max('version_expertise');
                if($VersionNumber >= 1){
                    $VersionNumber = $VersionNumber + 1;
                }else{
                    $VersionNumber = 1;
                }
                $updateExpertise = Expertise::find($request->expertise_id);
                $updateExpertise->update([
                    'abbr' => $request->abbr,
                    'num_poject' => $request->num_poject,
                    'company' => $request->company,
                    'address' => $request->address,
                    'сustomer' => $request->сustomer,
                    'address_customer' => $request->address_customer,
                    'list_docs' => $request->list_docs,
                    'dates_start_end' => $request->dates_start_end,
                    'finanсes' => $request->finanсes,
                    'is_appointment' => $request->is_appointment,
                    'is_target' => $request->is_target,
                    'type_ntd' => $request->type_ntd,
                    'basis_development' => $request->basis_development,
                    'links' => $request->links,
                    'build_year' => $request->build_year,
                    'gosproject' => $request->gosproject,
                    'sostav' => $request->sostav,
                    'modules' => $request->modules,
                    'po' => $request->po,
                    'hosting' => $request->hosting,
                    'selected_is_for_change' => $request->selected_is_for_change,
                    'selected_is_for_exit' => $request->selected_is_for_exit,
                    'paln_integrations' => $request->paln_integrations,
                    // 'documents_list' => json_encode($ID_File),
                    'documents_list' => $request->documents_list,
                    'version_expertise' => $VersionNumber,
                    'draft' => '0',
                    'send' => '1',
                    'comment_accept' => $request->comment,
                    'discart_go' => 0,
                    'discart_go_date' => null,
                ]);
            // }
            /* Конец ШАГА 3. */

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return redirect()->route('expertise.draft')->with('successMsg', 'Запрос на экспертизу был успешно создан и отправлен');


        // Отправить к СИ исполнителям 
        }elseif ($request->has('send_to_gts_executors')) {

            $expertiseId = Expertise::latest()->first()->id;

            $selectedApprovers = $request->input('approver_id');

            // dd($selectedApprovers);


            // Перебираем выбранных исполнителей и создаем записи в базе данных
            foreach ($selectedApprovers as $approverId) {
                ExpertiseRoleStatus::create([
                    'user_id' => $approverId,
                    'expertise_id' => $expertiseId,
                    'executor' => true, // Предполагаю, что при выборе исполнителя он автоматически соглашается
                ]);
            }
        
            $updateExpertise =Expertise::find($expertiseId);
            if ($updateExpertise) {
                $updateExpertise->send_to_gts = 0;
                $updateExpertise->send_to_gts_reviewers = 1;
                $updateExpertise->save();
                return redirect()->route('expertise.in_work')->with('successMsg', 'Отправлен к исполнителям ГТС!');
            } else {
                return redirect()->back()->with('errorMsg', 'Экспертиза не найдена');
            }
        }elseif ($request->has('approve_go')) {

            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'go_approve' => 1,
                'send' => 0,
                'send_to_go_signer' => 1
            ]);
                    
            return redirect()->route('expertise.approve')->with('successMsg', 'Запрос успешно согласован!');

         
        }elseif ($request->has('send_to_confirmers')) {

            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_si' => 1,
                'send_to_kib' => 1,
                'send_to_uo' => 0,
                'comment_accept' => $request->_comment,
            ]);
                    
            return redirect()->route('expertise.in_work')->with('successMsg', 'Отправлен согласующим!');

         
        }elseif ($request->has('send_to')) {
            $selectedApproverId1 = $request->input('approver_id1');
        
            $expertiseId = Expertise::latest()->first()->id;
        
            // Создание записи в таблице ExpertiseRoleStatus для согласующего
            $expertiseRoleStatusApprover1 = ExpertiseRoleStatus::create([
                'user_id' => $selectedApproverId1,
                'expertise_id' => $expertiseId,
                'executor' => ($selectedApproverId1 != null),
            ]);
            
            $updateExpertise =Expertise::find($expertiseId);
            if ($updateExpertise) {
                $updateExpertise->send_to_si = 0;
                $updateExpertise->send_to_si_reviewers = 1;
                $updateExpertise->save();
                return redirect()->route('expertise.approve_confirmers')->with('successMsg', 'Отправлен к исполнителям!');
            } else {
                return redirect()->back()->with('errorMsg', 'Экспертиза не найдена');
            }
        }elseif( $request->has('create_and_send_to_dana') ) {
            /* ШАГ 3. запись данных в таблицу экспертизы */
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                // 'draft' => '0',
                'send_to_go_signer' => 0,
                'send_to_uo' => '1',
                'comment_accept' => $request->comment
            ]);
            
            /* Конец ШАГА 3. */

            return redirect()->route('expertise.outbox')->with('successMsg', 'Запрос на экспертизу был успешно создан и отправлен в УО!');


            // $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            // return View::make('expertise.create', [
            //     'projects' => $projects
            // ])->with('successMsg', 'Запрос на экспертизу был успешно создан и отправлен в УО');


        // Отправка заявления на согласование исполнителем СИ 
        }elseif($request->has('send_to_gts')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_gts' => 1,
                'send_to_kib' => 0,
            ]);

            return redirect()->route('expertise.in_work')->with('successMsg', 'Отправлен в ГТС!');


        }elseif($request->has('send_to_uo_si')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_uo_si' => 1,
                'send_to_si_signer' => 0,
                'si_signer_accept_date' => now(), // Запись текущей даты и времени
            ]);

            return redirect()->route('expertise.in_work')->with('successMsg', 'Отправлен в УО!');


        }elseif($request->has('send_to_uo_gts')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_uo_gts' => 1,
                'send_to_gts_signer' => 0,
                'gts_signer_accept_date' => now(), // Запись текущей даты и времени
            ]);

            return redirect()->route('expertise.in_work')->with('successMsg', 'Отправлен в УО!');


        }elseif($request->has('send_to_uo_reviewer')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_uo_reviewer' => 1,
                'comment_accept' => $request->_comment,
                'send_to_uo' => 0,
                'uo_reviewer' => $request->send_to_mcriap_executor  // Используем переданный идентификатор исполнителя
            ]);

            return redirect()->route('expertise.in_work')->with('successMsg', 'Отправлен к исполнителю!');


        }elseif($request->has('accept_si_reviewer')){

            $selectedSignerId = $request->input('signer_id');
        
            $expertiseId = Expertise::latest()->first()->id;
        
            // Создание записи в таблице ExpertiseRoleStatus для подписанта
            $expertiseRoleStatusSigner = ExpertiseRoleStatus::create([
                'user_id' => $selectedSignerId,
                'expertise_id' => $expertiseId,
                'signing' => ($selectedSignerId != null),
            ]);
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                // 'draft' => '0',
                'send_to_si' => 1,
                'send_to_si_reviewers' => 0,
                'accept_si_reviewers' => '1',
                // 'comment_accept' => $request->comment,
            ]);

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Отправлен на согласование');

        }elseif($request->has('save_si_reviewer')){
            // Добавление данных в таблицу conclusion_si
            $expertiseConclusionSi = ExpertiseConclutionSi::where('expertise_id', $request->expertise_id)->first();
            $lastVersionNumber = $expertiseConclusionSi->expertise_version;
            if($lastVersionNumber >=1){

                if (!$expertiseConclusionSi) {
                    // Создаем новую запись, если ее еще нет
                    $expertiseConclusionSi = new ExpertiseConclutionSi();
                    $expertiseConclusionSi->expertise_id = $request->expertise_id;
                    $expertiseConclusionSi->user_id = Auth::user()->id; // Предполагается, что у вас есть аутентификация пользователя
                    $expertiseConclusionSi->expertise_version = $lastVersionNumber + 1; 
                }

                // Обновляем поля _concl_1 до _concl_59
                $expertiseConclusionSi->concl_1 = $request->concl_1;
                $expertiseConclusionSi->concl_2 = $request->concl_2;
                $expertiseConclusionSi->concl_3 = $request->concl_3;
                $expertiseConclusionSi->concl_4 = $request->concl_4;
                $expertiseConclusionSi->concl_5 = $request->concl_5;
                $expertiseConclusionSi->concl_6 = $request->concl_6;
                $expertiseConclusionSi->concl_7 = $request->concl_7;
                $expertiseConclusionSi->concl_8 = $request->concl_8;
                $expertiseConclusionSi->concl_9 = $request->concl_9;
                $expertiseConclusionSi->concl_10 = $request->concl_10;
                $expertiseConclusionSi->concl_11 = $request->concl_11;
                $expertiseConclusionSi->concl_12 = $request->concl_12;
                $expertiseConclusionSi->concl_13 = $request->concl_13;
                $expertiseConclusionSi->concl_14 = $request->concl_14;
                $expertiseConclusionSi->concl_15 = $request->concl_15;
                $expertiseConclusionSi->concl_16 = $request->concl_16;
                $expertiseConclusionSi->concl_17 = $request->concl_17;
                $expertiseConclusionSi->concl_18 = $request->concl_18;
                $expertiseConclusionSi->concl_19 = $request->concl_19;
                $expertiseConclusionSi->concl_20 = $request->concl_20;
                $expertiseConclusionSi->concl_21 = $request->concl_21;
                $expertiseConclusionSi->concl_22 = $request->concl_22;
                $expertiseConclusionSi->concl_23 = $request->concl_23;
                $expertiseConclusionSi->concl_24 = $request->concl_24;
                $expertiseConclusionSi->concl_25 = $request->concl_25;
                $expertiseConclusionSi->concl_26 = $request->concl_26;
                $expertiseConclusionSi->concl_27 = $request->concl_27;
                $expertiseConclusionSi->concl_28 = $request->concl_28;
                $expertiseConclusionSi->concl_29 = $request->concl_29;
                $expertiseConclusionSi->concl_30 = $request->concl_30;
                $expertiseConclusionSi->concl_31 = $request->concl_31;
                $expertiseConclusionSi->concl_32 = $request->concl_32;
                $expertiseConclusionSi->concl_33 = $request->concl_33;
                $expertiseConclusionSi->concl_34 = $request->concl_34;
                $expertiseConclusionSi->concl_35 = $request->concl_35;
                $expertiseConclusionSi->concl_36 = $request->concl_36;
                $expertiseConclusionSi->concl_37 = $request->concl_37;
                $expertiseConclusionSi->concl_38 = $request->concl_38;
                $expertiseConclusionSi->concl_39 = $request->concl_39;
                $expertiseConclusionSi->concl_40 = $request->concl_40;
                $expertiseConclusionSi->concl_41 = $request->concl_41;
                $expertiseConclusionSi->concl_42 = $request->concl_42;
                $expertiseConclusionSi->concl_43 = $request->concl_43;
                $expertiseConclusionSi->concl_44 = $request->concl_44;
                $expertiseConclusionSi->concl_45 = $request->concl_45;
                $expertiseConclusionSi->concl_46 = $request->concl_46;
                $expertiseConclusionSi->concl_47 = $request->concl_47;
                $expertiseConclusionSi->concl_48 = $request->concl_48;
                $expertiseConclusionSi->concl_49 = $request->concl_49;
                $expertiseConclusionSi->concl_50 = $request->concl_50;
                $expertiseConclusionSi->concl_51 = $request->concl_51;
                $expertiseConclusionSi->concl_52 = $request->concl_52;
                $expertiseConclusionSi->concl_53 = $request->concl_53;
                $expertiseConclusionSi->concl_54 = $request->concl_54;
                $expertiseConclusionSi->concl_55 = $request->concl_55;
                $expertiseConclusionSi->concl_56 = $request->concl_56;
                $expertiseConclusionSi->concl_57 = $request->concl_57;
                $expertiseConclusionSi->concl_58 = $request->concl_58;
                $expertiseConclusionSi->concl_59 = $request->concl_59;

                $expertiseConclusionSi->save();
        }else{
            if (!$expertiseConclusionSi) {
                // Создаем новую запись, если ее еще нет
                $expertiseConclusionSi = new ExpertiseConclutionSi();
                $expertiseConclusionSi->expertise_id = $request->expertise_id;
                $expertiseConclusionSi->user_id = Auth::user()->id; // Предполагается, что у вас есть аутентификация пользователя
                $expertiseConclusionSi->expertise_version = 1; 
            }

            // Обновляем поля _concl_1 до _concl_59
            $expertiseConclusionSi->concl_1 = $request->concl_1;
            $expertiseConclusionSi->concl_2 = $request->concl_2;
            $expertiseConclusionSi->concl_3 = $request->concl_3;
            $expertiseConclusionSi->concl_4 = $request->concl_4;
            $expertiseConclusionSi->concl_5 = $request->concl_5;
            $expertiseConclusionSi->concl_6 = $request->concl_6;
            $expertiseConclusionSi->concl_7 = $request->concl_7;
            $expertiseConclusionSi->concl_8 = $request->concl_8;
            $expertiseConclusionSi->concl_9 = $request->concl_9;
            $expertiseConclusionSi->concl_10 = $request->concl_10;
            $expertiseConclusionSi->concl_11 = $request->concl_11;
            $expertiseConclusionSi->concl_12 = $request->concl_12;
            $expertiseConclusionSi->concl_13 = $request->concl_13;
            $expertiseConclusionSi->concl_14 = $request->concl_14;
            $expertiseConclusionSi->concl_15 = $request->concl_15;
            $expertiseConclusionSi->concl_16 = $request->concl_16;
            $expertiseConclusionSi->concl_17 = $request->concl_17;
            $expertiseConclusionSi->concl_18 = $request->concl_18;
            $expertiseConclusionSi->concl_19 = $request->concl_19;
            $expertiseConclusionSi->concl_20 = $request->concl_20;
            $expertiseConclusionSi->concl_21 = $request->concl_21;
            $expertiseConclusionSi->concl_22 = $request->concl_22;
            $expertiseConclusionSi->concl_23 = $request->concl_23;
            $expertiseConclusionSi->concl_24 = $request->concl_24;
            $expertiseConclusionSi->concl_25 = $request->concl_25;
            $expertiseConclusionSi->concl_26 = $request->concl_26;
            $expertiseConclusionSi->concl_27 = $request->concl_27;
            $expertiseConclusionSi->concl_28 = $request->concl_28;
            $expertiseConclusionSi->concl_29 = $request->concl_29;
            $expertiseConclusionSi->concl_30 = $request->concl_30;
            $expertiseConclusionSi->concl_31 = $request->concl_31;
            $expertiseConclusionSi->concl_32 = $request->concl_32;
            $expertiseConclusionSi->concl_33 = $request->concl_33;
            $expertiseConclusionSi->concl_34 = $request->concl_34;
            $expertiseConclusionSi->concl_35 = $request->concl_35;
            $expertiseConclusionSi->concl_36 = $request->concl_36;
            $expertiseConclusionSi->concl_37 = $request->concl_37;
            $expertiseConclusionSi->concl_38 = $request->concl_38;
            $expertiseConclusionSi->concl_39 = $request->concl_39;
            $expertiseConclusionSi->concl_40 = $request->concl_40;
            $expertiseConclusionSi->concl_41 = $request->concl_41;
            $expertiseConclusionSi->concl_42 = $request->concl_42;
            $expertiseConclusionSi->concl_43 = $request->concl_43;
            $expertiseConclusionSi->concl_44 = $request->concl_44;
            $expertiseConclusionSi->concl_45 = $request->concl_45;
            $expertiseConclusionSi->concl_46 = $request->concl_46;
            $expertiseConclusionSi->concl_47 = $request->concl_47;
            $expertiseConclusionSi->concl_48 = $request->concl_48;
            $expertiseConclusionSi->concl_49 = $request->concl_49;
            $expertiseConclusionSi->concl_50 = $request->concl_50;
            $expertiseConclusionSi->concl_51 = $request->concl_51;
            $expertiseConclusionSi->concl_52 = $request->concl_52;
            $expertiseConclusionSi->concl_53 = $request->concl_53;
            $expertiseConclusionSi->concl_54 = $request->concl_54;
            $expertiseConclusionSi->concl_55 = $request->concl_55;
            $expertiseConclusionSi->concl_56 = $request->concl_56;
            $expertiseConclusionSi->concl_57 = $request->concl_57;
            $expertiseConclusionSi->concl_58 = $request->concl_58;
            $expertiseConclusionSi->concl_59 = $request->concl_59;

            $expertiseConclusionSi->save();
        }

            
            /* Конец ШАГА 3. */
            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Заключение сохранено');

        }elseif($request->has('save_uo_reviewer')){
            // Добавление данных в таблицу conclusion_si
            $expertiseConclusionUo = ExpertiseConclutionUo::where('expertise_id', $request->expertise_id)->first();
            $lastVersionNumber = $expertiseConclusionUo->expertise_version;
            if($lastVersionNumber >= 1){
                if (!$expertiseConclusionUo) {
                    // Создаем новую запись, если ее еще нет
                    $expertiseConclusionUo = new ExpertiseConclutionUo();
                    $expertiseConclusionUo->expertise_id = $request->expertise_id;
                    $expertiseConclusionUo->user_id = Auth::user()->id; // Предполагается, что у вас есть аутентификация пользователя
                    $expertiseConclusionUo->expertise_version = $lastVersionNumber + 1;
                }

                // Обновляем поля _concl_1 до _concl_59
                $expertiseConclusionUo->concl_1 = $request->concl_1;
                $expertiseConclusionUo->concl_2 = $request->concl_2;
                $expertiseConclusionUo->concl_3 = $request->concl_3;
                $expertiseConclusionUo->concl_4 = $request->concl_4;
                $expertiseConclusionUo->concl_5 = $request->concl_5;
                $expertiseConclusionUo->concl_6 = $request->concl_6;
                $expertiseConclusionUo->concl_7 = $request->concl_7;
                $expertiseConclusionUo->concl_8 = $request->concl_8;
                $expertiseConclusionUo->concl_9 = $request->concl_9;
                $expertiseConclusionUo->concl_10 = $request->concl_10;
                $expertiseConclusionUo->concl_11 = $request->concl_11;
                $expertiseConclusionUo->concl_12 = $request->concl_12;
                $expertiseConclusionUo->concl_13 = $request->concl_13;
                $expertiseConclusionUo->concl_14 = $request->concl_14;
                $expertiseConclusionUo->concl_15 = $request->concl_15;
                $expertiseConclusionUo->concl_16 = $request->concl_16;
                $expertiseConclusionUo->concl_17 = $request->concl_17;
                $expertiseConclusionUo->concl_18 = $request->concl_18;
                $expertiseConclusionUo->concl_19 = $request->concl_19;
                $expertiseConclusionUo->concl_20 = $request->concl_20;
                $expertiseConclusionUo->concl_21 = $request->concl_21;
                $expertiseConclusionUo->concl_22 = $request->concl_22;
                $expertiseConclusionUo->concl_23 = $request->concl_23;
                $expertiseConclusionUo->concl_24 = $request->concl_24;
                $expertiseConclusionUo->concl_25 = $request->concl_25;
                $expertiseConclusionUo->concl_26 = $request->concl_26;
                $expertiseConclusionUo->concl_27 = $request->concl_27;
                $expertiseConclusionUo->concl_28 = $request->concl_28;
                $expertiseConclusionUo->concl_29 = $request->concl_29;
                $expertiseConclusionUo->concl_30 = $request->concl_30;
                $expertiseConclusionUo->concl_31 = $request->concl_31;
                $expertiseConclusionUo->concl_32 = $request->concl_32;
                $expertiseConclusionUo->concl_33 = $request->concl_33;
                $expertiseConclusionUo->concl_34 = $request->concl_34;
                $expertiseConclusionUo->concl_35 = $request->concl_35;
                $expertiseConclusionUo->concl_36 = $request->concl_36;
                $expertiseConclusionUo->concl_37 = $request->concl_37;
                $expertiseConclusionUo->concl_38 = $request->concl_38;
                $expertiseConclusionUo->concl_39 = $request->concl_39;
                $expertiseConclusionUo->concl_40 = $request->concl_40;
                $expertiseConclusionUo->concl_41 = $request->concl_41;
                $expertiseConclusionUo->concl_42 = $request->concl_42;
                $expertiseConclusionUo->concl_43 = $request->concl_43;
                $expertiseConclusionUo->concl_44 = $request->concl_44;
                $expertiseConclusionUo->concl_45 = $request->concl_45;
                $expertiseConclusionUo->concl_46 = $request->concl_46;
                $expertiseConclusionUo->concl_47 = $request->concl_47;
                $expertiseConclusionUo->concl_48 = $request->concl_48;
                $expertiseConclusionUo->concl_49 = $request->concl_49;
                $expertiseConclusionUo->concl_50 = $request->concl_50;
                $expertiseConclusionUo->concl_51 = $request->concl_51;
                $expertiseConclusionUo->concl_52 = $request->concl_52;
                $expertiseConclusionUo->concl_53 = $request->concl_53;
                $expertiseConclusionUo->concl_54 = $request->concl_54;
                $expertiseConclusionUo->concl_55 = $request->concl_55;
                $expertiseConclusionUo->concl_56 = $request->concl_56;
                $expertiseConclusionUo->concl_57 = $request->concl_57;
                $expertiseConclusionUo->concl_58 = $request->concl_58;
                $expertiseConclusionUo->concl_59 = $request->concl_59;

                $expertiseConclusionUo->save();
            }else{
                if (!$expertiseConclusionUo) {
                    // Создаем новую запись, если ее еще нет
                    $expertiseConclusionUo = new ExpertiseConclutionUo();
                    $expertiseConclusionUo->expertise_id = $request->expertise_id;
                    $expertiseConclusionUo->user_id = Auth::user()->id; // Предполагается, что у вас есть аутентификация пользователя
                    $expertiseConclusionUo->expertise_version = 1;
                }

                // Обновляем поля _concl_1 до _concl_59
                $expertiseConclusionUo->concl_1 = $request->concl_1;
                $expertiseConclusionUo->concl_2 = $request->concl_2;
                $expertiseConclusionUo->concl_3 = $request->concl_3;
                $expertiseConclusionUo->concl_4 = $request->concl_4;
                $expertiseConclusionUo->concl_5 = $request->concl_5;
                $expertiseConclusionUo->concl_6 = $request->concl_6;
                $expertiseConclusionUo->concl_7 = $request->concl_7;
                $expertiseConclusionUo->concl_8 = $request->concl_8;
                $expertiseConclusionUo->concl_9 = $request->concl_9;
                $expertiseConclusionUo->concl_10 = $request->concl_10;
                $expertiseConclusionUo->concl_11 = $request->concl_11;
                $expertiseConclusionUo->concl_12 = $request->concl_12;
                $expertiseConclusionUo->concl_13 = $request->concl_13;
                $expertiseConclusionUo->concl_14 = $request->concl_14;
                $expertiseConclusionUo->concl_15 = $request->concl_15;
                $expertiseConclusionUo->concl_16 = $request->concl_16;
                $expertiseConclusionUo->concl_17 = $request->concl_17;
                $expertiseConclusionUo->concl_18 = $request->concl_18;
                $expertiseConclusionUo->concl_19 = $request->concl_19;
                $expertiseConclusionUo->concl_20 = $request->concl_20;
                $expertiseConclusionUo->concl_21 = $request->concl_21;
                $expertiseConclusionUo->concl_22 = $request->concl_22;
                $expertiseConclusionUo->concl_23 = $request->concl_23;
                $expertiseConclusionUo->concl_24 = $request->concl_24;
                $expertiseConclusionUo->concl_25 = $request->concl_25;
                $expertiseConclusionUo->concl_26 = $request->concl_26;
                $expertiseConclusionUo->concl_27 = $request->concl_27;
                $expertiseConclusionUo->concl_28 = $request->concl_28;
                $expertiseConclusionUo->concl_29 = $request->concl_29;
                $expertiseConclusionUo->concl_30 = $request->concl_30;
                $expertiseConclusionUo->concl_31 = $request->concl_31;
                $expertiseConclusionUo->concl_32 = $request->concl_32;
                $expertiseConclusionUo->concl_33 = $request->concl_33;
                $expertiseConclusionUo->concl_34 = $request->concl_34;
                $expertiseConclusionUo->concl_35 = $request->concl_35;
                $expertiseConclusionUo->concl_36 = $request->concl_36;
                $expertiseConclusionUo->concl_37 = $request->concl_37;
                $expertiseConclusionUo->concl_38 = $request->concl_38;
                $expertiseConclusionUo->concl_39 = $request->concl_39;
                $expertiseConclusionUo->concl_40 = $request->concl_40;
                $expertiseConclusionUo->concl_41 = $request->concl_41;
                $expertiseConclusionUo->concl_42 = $request->concl_42;
                $expertiseConclusionUo->concl_43 = $request->concl_43;
                $expertiseConclusionUo->concl_44 = $request->concl_44;
                $expertiseConclusionUo->concl_45 = $request->concl_45;
                $expertiseConclusionUo->concl_46 = $request->concl_46;
                $expertiseConclusionUo->concl_47 = $request->concl_47;
                $expertiseConclusionUo->concl_48 = $request->concl_48;
                $expertiseConclusionUo->concl_49 = $request->concl_49;
                $expertiseConclusionUo->concl_50 = $request->concl_50;
                $expertiseConclusionUo->concl_51 = $request->concl_51;
                $expertiseConclusionUo->concl_52 = $request->concl_52;
                $expertiseConclusionUo->concl_53 = $request->concl_53;
                $expertiseConclusionUo->concl_54 = $request->concl_54;
                $expertiseConclusionUo->concl_55 = $request->concl_55;
                $expertiseConclusionUo->concl_56 = $request->concl_56;
                $expertiseConclusionUo->concl_57 = $request->concl_57;
                $expertiseConclusionUo->concl_58 = $request->concl_58;
                $expertiseConclusionUo->concl_59 = $request->concl_59;

                $expertiseConclusionUo->save();
            }

            
            /* Конец ШАГА 3. */
            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Заключение сохранено');

        }elseif($request->has('send_to_go_fromUO')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_uo_signer' => 0,
                // 'accept_uo_confirmer' => 0,
                'accept_uo_signer' => 1,
                'send_to_go_fromUo' => 1
            ]);

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Отправлен в ГО');

        }elseif($request->has('accept_si_confirmer_first')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                // 'send_to_si' => 0,
                'accept_si_confirmer_first' => 1,
            ]);

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Согласован');

        }elseif($request->has('accept_si_confirmer_second')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_si' => 0,
                'accept_si_confirmer_second' => 1,
                'send_to_si_signer' => 1,
            ]);

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Согласован');

        }elseif($request->has('save_gts_reviewer')){
            // Добавление данных в таблицу conclusion_si
            $expertiseConclusionGts = ExpertiseConclutionGts::where('expertise_id', $request->expertise_id)->first();
            $lastVersionNumber = $expertiseConclusionGts->expertise_version;
            if($lastVersionNumber >= 1){

            if (!$expertiseConclusionGts) {
                // Создаем новую запись, если ее еще нет
                $expertiseConclusionGts = new ExpertiseConclutionGts();
                $expertiseConclusionGts->expertise_id = $request->expertise_id;
                $expertiseConclusionGts->user_id = Auth::user()->id; // Предполагается, что у вас есть аутентификация пользователя
                $expertiseConclusionGts->expertise_version = $lastVersionNumber + 1;
            }

            // Обновляем поля _concl_1 до _concl_59
            
            $expertiseConclusionGts->concl_59 = $request->concl_59;

            $expertiseConclusionGts->save();
            }else{
                if (!$expertiseConclusionGts) {
                    // Создаем новую запись, если ее еще нет
                    $expertiseConclusionGts = new ExpertiseConclutionGts();
                    $expertiseConclusionGts->expertise_id = $request->expertise_id;
                    $expertiseConclusionGts->user_id = Auth::user()->id; // Предполагается, что у вас есть аутентификация пользователя
                    $expertiseConclusionGts->expertise_version = 1;
                }

                // Обновляем поля _concl_1 до _concl_59
            
                $expertiseConclusionGts->concl_59 = $request->concl_59;

                $expertiseConclusionGts->save();
            }

            
            /* Конец ШАГА 3. */
            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Заключение сохранено');

        }elseif($request->has('accept_gts_reviewer')){
            
            $expertiseId = Expertise::latest()->first()->id;

            $selectedApprovers = $request->input('app_id');
            $selectedSigners = $request->input('signer');

            // dd($selectedApprovers, $selectedSigners);




            // Перебираем выбранных исполнителей и создаем записи в базе данных
            if (!is_null($selectedApprovers)) {
                foreach ($selectedApprovers as $approverId) {
                    ExpertiseRoleStatus::create([
                        'user_id' => $approverId,
                        'expertise_id' => $expertiseId,
                        'approve' => true, // Предполагаю, что при выборе исполнителя он автоматически соглашается
                    ]);
                }
            }   
            if (!is_null($selectedSigners)) {
                foreach ($selectedSigners as $signerId) {
                    ExpertiseRoleStatus::create([
                        'user_id' => $signerId,
                        'expertise_id' => $expertiseId,
                        'signing' => true, // Предполагаю, что при выборе исполнителя он автоматически соглашается
                    ]);
                }
            }
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_gts' => 1,
                'send_to_gts_reviewers' => 0,
                'accept_gts_reviewers' => '1',
            ]);

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Отправлен на согласование');


        }elseif($request->has('accept_uo_reviewer_concl')){
            
            $expertiseId = Expertise::latest()->first()->id;

            $selectedApprovers = $request->input('appUo');
            $selectedSigners = $request->input('signerUo');

            // dd($selectedApprovers, $selectedSigners);




            // Перебираем выбранных исполнителей и создаем записи в базе данных
            if (!is_null($selectedApprovers)) {
                foreach ($selectedApprovers as $approverId) {
                    ExpertiseRoleStatus::create([
                        'user_id' => $approverId,
                        'expertise_id' => $expertiseId,
                        'approve' => true, // Предполагаю, что при выборе исполнителя он автоматически соглашается
                    ]);
                }
            }   
            if (!is_null($selectedSigners)) {
                foreach ($selectedSigners as $signerId) {
                    ExpertiseRoleStatus::create([
                        'user_id' => $signerId,
                        'expertise_id' => $expertiseId,
                        'signing' => true, // Предполагаю, что при выборе исполнителя он автоматически соглашается
                    ]);
                }
            }
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'accept_uo_reviewer' => 0,
                'send_to_uo_confirmer' => 1
            ]);

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Отправлен на согласование');


        }elseif($request->has('accept_uo_reviewer')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_uo_reviewer' => 0,
                'comment_accept' => $request->_comment,
                'send_to_uo' => 1,
                'accept_uo_reviewer' => 1
            ]);

            return redirect()->route('expertise.in_work')->with('successMsg', 'Исполнитель принял');


        }elseif($request->has('accept_gts_confirmer')){
            // Обновление данных в таблице Expertise
            $updateExpertise = Expertise::find($request->expertise_id);
            $updateExpertise->update([
                'send_to_gts' => 0,
                // 'send_to_gts_reviewers' => 0,
                'accept_gts_confirmer' => 1,
                'send_to_gts_signer' => 1,
            ]);

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Запрос согласован');

        }elseif ( $request->has('discart') ) {

            // Отклонение со стороны ЦПЦП (СИ)
            if ( Auth::user()->government_id == 108 ) {
                Expertise::find($request->expertise_id)->update([
                    'accept_cpcp' => 0,
                    'accept_cpcp_date' => NULL,
                    'discart_cpcp' => 1,
                    'discart_cpcp_date' => new DateTime(),
                    'comment_discart' => $request->_comment,
                    'comment_accept' => "",
                    'ecp_cpcp' => NULL,
                    'ecp_name_cpcp' => NULL,

                    'accept_mcriap' => 0,
                    'accept_mcriap_date' => NULL,
                    'discart_mcriap' => 0,
                    'discart_mcriap_date' => NULL,

                    'accept_gts' => 0,
                    'accept_gts_date' => NULL,
                    'discart_gts' => 0,
                    'discart_gts_date' => NULL,

                    'draft' => 1,
                    'send' => 0,
                ]);
            }

            // Отклонение со стороны ГТС
            if ( Auth::user()->government_id == 114 ) {
                Expertise::find($request->expertise_id)->update([
                    'accept_gts' => 0,
                    'accept_gts_date' => NULL,
                    'discart_gts' => 1,
                    'discart_gts_date' => new DateTime(),
                    'comment_discart' => $request->_comment,
                    'comment_accept' => "",
                    'ecp_gts' => NULL,
                    'ecp_name_gts' => NULL,

                    'accept_mcriap' => 0,
                    'accept_mcriap_date' => NULL,
                    'discart_mcriap' => 0,
                    'discart_mcriap_date' => NULL,

                    'accept_cpcp' => 0,
                    'accept_cpcp_date' => NULL,
                    'discart_cpcp' => 0,
                    'discart_cpcp_date' => NULL,

                    'draft' => 1,
                    'send' => 0,
                ]);
            }


            // Отклонение со стороны МЦРИАП
            if ( Auth::user()->government_id == 24 ) {
                Expertise::find($request->expertise_id)->update([
                    'accept_mcriap' => 0,
                    'accept_mcriap_date' => NULL,
                    'discart_mcriap' => 1,
                    'discart_mcriap_date' => new DateTime(),
                    'comment_discart' => $request->_comment,
                    'comment_accept' => "",
                    'ecp_mcriap' => NULL,
                    'ecp_name_mcriap' => NULL,

                    'accept_gts' => 0,
                    'accept_gts_date' => NULL,
                    'discart_gts' => 0,
                    'discart_gts_date' => NULL,

                    'accept_cpcp' => 0,
                    'accept_cpcp_date' => NULL,
                    'discart_cpcp' => 0,
                    'discart_cpcp_date' => NULL,

                    'draft' => 1,
                    'send' => 0,
                ]);
            }


            $govs = Government::all();
            $expertises = Expertise::
                where('send', '1')->
                where('accept_go', '1')->
                orderBy('id', 'desc')->
                paginate(10);

            return View::make('expertise.signing.index', [
                'govs' => $govs,
                'expertises' => $expertises
            ])->with('errorMsg', 'Заявка на экспертизу была отклонена, ваш комментарий направлен в ГО для устранения замечаний');



        // Отклонение заявления на экспертизу сотрудником ГО 
        }elseif ( $request->has('discart_uo_reviewer') ) {
            // Находим запись в таблице ExpertiseRoleStatus по expertise_id и удаляем ее
          ExpertiseRoleStatus::where('expertise_id', $request->expertise_id)->delete();

          // Обновляем запись в таблице Expertise
          Expertise::find($request->expertise_id)->update([
              'discart_uo_reviewer' => 1,
              'discart_uo_reviewer_date' => new DateTime(),
              'accept_go' => 0,
              'go_approve' => 0,
              'send_to_uo_reviewer' => 0,
              'uo_reviewer' => '',
              'accept_go_date' => NULL,
              'comment_discart' => $request->comment,
              'comment_accept' => "",
              'ecp' => '',
              'ecp_name_go' => '',
              'draft' => 1,
          ]);

          // Получаем необходимые данные для передачи в представление
          $expertise = Expertise::where('id', $request->expertise_id)->first();

          $tz = TechnicalTask::where('expertise_id', $request->expertise_id)->first();
          $document = ExpertiseDocument::where('expertise_id', $request->expertise_id)->first();

          // Возвращаем представление с данными и сообщением об ошибке
          return View::make('expertise.info.index', [
              'expertise' => $expertise,
              'tz' => $tz,
              'document' => $document
          ])->with('errorMsg', 'Заявка на экспертизу была отклонена, ваш комментарий направлен исполнителю');


      // В остальных случаях    
   }elseif ( $request->has('discart_gos') ) {
              // Находим запись в таблице ExpertiseRoleStatus по expertise_id и удаляем ее
            ExpertiseRoleStatus::where('expertise_id', $request->expertise_id)->delete();

            // Обновляем запись в таблице Expertise
            Expertise::find($request->expertise_id)->update([
                'discart_go' => 1,
                'discart_go_date' => new DateTime(),
                'accept_go' => 0,
                'accept_go_date' => NULL,
                'comment_discart' => $request->comment,
                'comment_accept' => "",
                'draft' => 1,
                'send' => 0,
                'send_to_gts' => 0
            ]);

            // Получаем необходимые данные для передачи в представление
            $expertise = Expertise::where('id', $request->expertise_id)->first();

            $tz = TechnicalTask::where('expertise_id', $request->expertise_id)->first();
            $document = ExpertiseDocument::where('expertise_id', $request->expertise_id)->first();

            // Возвращаем представление с данными и сообщением об ошибке
            return View::make('expertise.info.index', [
                'expertise' => $expertise,
                'tz' => $tz,
                'document' => $document
            ])->with('errorMsg', 'Заявка на экспертизу была отклонена, ваш комментарий направлен исполнителю');


        // В остальных случаях    
     } else {

            $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
            return View::make('expertise.create', [
                'projects' => $projects
            ])->with('successMsg', 'Запрос на экспертизу успешно создан');

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
        $projects = It_Project::where('goverment_id', Auth::user()->government_id)->get();
        $iss = InformationSystem::where('goverment_id', Auth::user()->government_id)->get();
        $expertise = Expertise::
            where('id', $id)->
            where('user_id', Auth::user()->id)->
            where('goverment_id', Auth::user()->government_id)->
            where('draft', '1')->
            first();
        $tz = TechnicalTask::
            where('expertise_id', $id)->
            where('user_id', Auth::user()->id)->
            where('government_id', Auth::user()->government_id)->
            first();
        $document = ExpertiseDocument::
            where('expertise_id', $id)->
            where('user_id', Auth::user()->id)->
            where('government_id', Auth::user()->government_id)->
            first();
        $users = User::all();
        return View::make('expertise.edit', [
            'expertise' => $expertise,
            'projects' => $projects,
            'iss' => $iss,
            'tz' => $tz,
            'document' => $document,
            'users' => $users
        ]);
    }


    // Добавим метод createVersion в ExpertisesController.php
    // public function createVersion($expertiseId)
    // {
    //     $expertise = Expertise::find($expertiseId);
    //     if (!$expertise) {
    //         return redirect()->route('expertise.index')->with('error', 'Expertise not found');
    //     }
    
    //     // $versions = ExpertiseVersion::where('expertise_id', $expertiseId)->get();
    //     $versions = ExpertiseVersion::where('expertise_id', $expertiseId)->get();

    //     // Проверяем, есть ли версии и их количество
    //     if ($versions->isNotEmpty() && $versions->first()->version_number > 1) {
    //         // Получаем версии, если есть версии с номером больше 1
    //         $versions = ExpertiseVersion::where('expertise_id', $expertiseId)->get();
    //     } else {
    //         // Если нет, то получаем данные из таблицы Expertise
    //         $versions = Expertise::where('id', $expertiseId)->get();
    //     }

    //     return view('expertise.create_version', compact('expertise', 'versions'));
    // }


//     public function createVersion($expertiseId)
// {
//     $expertise = Expertise::find($expertiseId);
//     if (!$expertise) {
//         return redirect()->route('expertise.index')->with('error', 'Expertise not found');
//     }

//     // Получаем все версии из модели ExpertiseVersion
//     $versions = ExpertiseVersion::where('expertise_id', $expertiseId)->get();

//     // Добавляем первую версию (из модели Expertise) в начало коллекции
//     $allVersions = collect([$expertise])->merge($versions);

//     return view('expertise.create_version', compact('expertise', 'allVersions'));
// }


public function createVersion($expertiseId)
{
    $expertise = Expertise::find($expertiseId);
    $expertises = $expertise -> expertise_id;
    
    // dd($expertises);
    // $expertise_id = $expertiseId->expertise_id;
    if (!$expertise) {
        return redirect()->route('expertise.index')->with('error', 'Expertise not found');
    }

    // Получаем последующие версии из модели ExpertiseVersion
    // $versions = ExpertiseVersion::where('expertise_id', $expertiseId)->get();
    $versions = Expertise::where('id', $expertiseId)->get();
    $versionsTwo = ExpertiseVersion::where('expertise_id', $expertiseId)->get();
    // dd($versionsTwo, $versions);
    // $versionsTwo = ExpertiseVersion::where('expertise_id', $expertiseId)->get();
    // dd($versions,$versionsTwo);
    
    return view('expertise.create_version', compact('expertise', 'versions','versionsTwo'));
}


    
// public function createNewVersion($id)
// {
//     $expertise = Expertise::findOrFail($id);

//     // // Создайте новую версию
//     // $newVersion = new Expertise();
//     // $newVersion->some_property = $expertise->some_property; // Копируйте необходимые данные
//     // // Убедитесь, что вы сохраняете новую версию
//     // $newVersion->save();

//     return redirect()->route('expertise.edit', ['expertise' => $expertise->id])
//         ->with('success', 'Новая версия успешно создана');
// }



    public function createNewVersion($id)
    {
        $expertise = Expertise::findOrFail($id);

        $newVersion = null;

        // DB::transaction(function () use ($expertise, &$newVersion) {
                // Получаем текущую последнюю версию
                $lastVersionNumber = Expertise::where('id', $expertise->id)->max('version_expertise');
                // if($lastVersionNumber > 1){
            //  $lastVersionNumber = ExpertiseVersion::where('expertise_id', $expertise->id)->max('version_number');
            // }
            // else{
            //  $lastVersionNumber = Expertise::where('id', $expertise->id)->max('version_expertise');
            // }

            // Создаем новую версию в таблице expertise_versions
            $newVersion = ExpertiseVersion::create([
                'expertise_id' => $expertise->id,
                'version_number' => $lastVersionNumber,
                'abbr' => $expertise->abbr,
                'num_poject' => $expertise->num_poject,
                'company' => $expertise->company,
                'address' => $expertise->address,
                'customer' => $expertise->сustomer,
                'address_customer' => $expertise->address_customer,
                'list_docs' => $expertise->list_docs,
                'dates_start_end' => $expertise->dates_start_end,
                'finances' => $expertise->finances,
                'is_appointment' => $expertise->is_appointment, 
                'is_target' => $expertise->is_target, 
                'type_ntd' => $expertise->type_ntd,
                'basis_development' => $expertise->basis_development,
                'links' => $expertise->links,
                'build_year' => $expertise->build_year,
                'gosproject' => $expertise->gosproject,
                'sostav' => $expertise->sostav,
                'modules' => $expertise->modules,
                'po' => $expertise->po,
                'hosting' => $expertise->hosting,
                'selected_is_for_change' => $expertise->selected_is_for_change, 
                'selected_is_for_exit' => $expertise->selected_is_for_exit, 
                'plan_integrations' => $expertise->plan_integrations,
                'documents_list' => $expertise->documents_list
            ]);

            // Создаем новую версию в таблице technical_tasks
            // $lastVersionTech = TechnicalTask::where('expertise_id', $expertise->id)->max('version');
            // $technicalTask = TechnicalTask::where('expertise_id', $expertise->id)->latest('version')->first();
            // if ($technicalTask) {
            //     TechnicalTask::create([
            //         'user_id' => $technicalTask->user_id,
            //         'government_id' => $technicalTask->government_id,
            //         'it_project_id' => $technicalTask->it_project_id,
            //         'type_project' => $technicalTask->type_project,
            //         'expertise_id' => $technicalTask->expertise_id,
            //         'version' => $lastVersionTech + 1,
            //         'part_1' => $technicalTask->part_1,
            //         'part_2' => $technicalTask->part_2,
            //         'part_3' => $technicalTask->part_3,
            //         'part_4' => $technicalTask->part_4,
            //         'part_5' => $technicalTask->part_5,
            //         'part_6' => $technicalTask->part_6,
            //         'part_7' => $technicalTask->part_7,
            //         'part_8' => $technicalTask->part_8,
            //         'part_9' => $technicalTask->part_9,
            //         'part_10' => $technicalTask->part_10,
            //         'part_11' => $technicalTask->part_11,
            //         'part_12' => $technicalTask->part_12
            //     ]);
            // }

            // Создаем новую версию в таблице expertise_documents
            // $lastVersionDoc = ExpertiseDocument::where('expertise_id', $expertise->id)->max('version');
            // $expertiseDocument = ExpertiseDocument::where('expertise_id', $expertise->id)->latest('version')->first();
            // if ($expertiseDocument) {
            //     ExpertiseDocument::create([
            //         'user_id' => $expertiseDocument->user_id,
            //         'government_id' => $expertiseDocument->government_id,
            //         'it_project_id' => $expertiseDocument->it_project_id,
            //         'type_project' => $expertiseDocument->type_project,
            //         'expertise_id' => $expertiseDocument->expertise_id,
            //         'doc_status' => $expertiseDocument->doc_status,
            //         'doc_lang' => $expertiseDocument->doc_lang,
            //         'doc_type' => $expertiseDocument->doc_type,
            //         'doc_version' => $expertiseDocument->doc_version,
            //         'doc_year' => $expertiseDocument->doc_year,
            //         'doc_name' => $expertiseDocument->doc_name,
            //         'file_name' => $expertiseDocument->file_name,
            //         'file_name_upload' => $expertiseDocument->file_name_upload,
            //         'file_type' => $expertiseDocument->file_type,
            //         'file_size' => $expertiseDocument->file_size,
            //         'version' => $lastVersionDoc + 1
            //     ]);
            // }
        // });

        return redirect()->route('expertise.edit', ['expertise' => $expertise->id, 'version' => $newVersion->id])
            ->with('success', 'Новая версия успешно создана');
    }

    
    // public function createNewVersion($id)
    // {
    //     $expertise = Expertise::findOrFail($id);
    
    //     // Создание новой версии на основе текущей
    //     $newVersion = $expertise->replicate();
    //     $newVersion->expertise_id = $expertise->expertise_id; // Явно устанавливаем значение expertise_id
    //     $newVersion->version_expertise = Expertise::where('it_project_id', $expertise->it_project_id)
    //                                               ->where('type_project', $expertise->type_project)
    //                                               ->where('expertise_id', $expertise->expertise_id)
    //                                               ->max('version_expertise') + 1;
    //     $newVersion->save();
    
    //     // return redirect()->route('expertise.edit', ['expertise' => $newVersion->id])
    //     //     ->with('success', 'Новая версия успешно создана');
    //     return redirect()->route('expertise.edit', ['expertise' => $expertise->id])
    //          ->with('success', 'Новая версия успешно создана');
    // }
    
    





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
        $expertise = Expertise::findOrFail($id);
        $expertise->delete();
        
        return redirect()->back()->with('successMsg', 'Экспертиза успешно удалена');
    }


    public function create_it_project()
    {
        $govs = Government::all();
        return View::make('expertise.create_it_project', [
            'govs' => $govs
        ]);
    }



    // Форма подписания для МЦРИАП, ГТС и ЦПЦП (СИ)
    public function signing()
    {
        if ( Auth::user()->government_id == 24 || Auth::user()->government_id == 114 || Auth::user()->government_id == 108 ) {
            
            $govs = Government::all();
            $expertises = Expertise::
                where('send', '1')->
                where('accept_go', '1')->
                orderBy('id', 'desc')->
                paginate(10);

            return View::make('expertise.signing.index', [
                'govs' => $govs,
                'expertises' => $expertises
            ]);


        } else {
            echo "<pre>Доступ запрещен!</pre>";
        }
    }


    public function info($id)
    {
        if ( Auth::user()->government_id == 24 || Auth::user()->government_id == 114 || Auth::user()->government_id == 108 ) {

            $expertise = Expertise::where('id', $id)->first();
            $tz = TechnicalTask::where('expertise_id', $id)->first();
            $document = ExpertiseDocument::where('expertise_id', $id)->first();
            return View::make('expertise.signing.info', [
                'expertise' => $expertise,
                'tz' => $tz,
                'document' => $document
            ]);

        } else {
            echo "<pre>Доступ запрещен!</pre>";
        }
    }


   

    public function export(Request $request)
    {
        $expertise = Expertise::where('id', $request->_id)->first();

        if ( $expertise->type_project == "1" ) {
            $type_project_name = "Запрос государственного органа на автоматизацию деятельности государственного органа в уполномоченный орган и сервисному интегратору (СМИ)";
        } elseif ( $expertise->type_project == "2" ) {
            $type_project_name = "Инвестиционное предложение";
        } elseif ( $expertise->type_project == "3" ) {
            $type_project_name = "Технико-экономическое обоснование";
        } elseif ( $expertise->type_project == "4" ) {
            $type_project_name = "Техническое задание";
        } else {
            $type_project_name = "Не определен";
        }

        $project = It_Project::where('id', $expertise->it_project_id)->first();

        $data = [
            'name' => $project->name_ru,
            'type_project' => $type_project_name,
            'abbr' => $expertise->abbr,
            'num_poject' => $expertise->num_poject,
            'company' => $expertise->company,
            'address' => $expertise->address,
            'сustomer' => $expertise->сustomer,
            'address_customer' => $expertise->address_customer,
            'list_docs' => $expertise->list_docs,
            'dates_start_end' => $expertise->dates_start_end,
            'finanсes' => $expertise->finanсes,
            'is_appointment' => $expertise->is_appointment,
            'is_target' => $expertise->is_target,
            'type_ntd' => $expertise->type_ntd,
            'basis_development' => $expertise->basis_development,
            'links' => $expertise->links,
            'build_year' => $expertise->build_year,
            'gosproject' => $expertise->gosproject,
            'sostav' => $expertise->sostav,
            'modules' => $expertise->modules,
            'po' => $expertise->po,
            'hosting' => $expertise->hosting,
            'comment_accept' => $expertise->comment_accept,

            'ecp_name_mcriap' => $expertise->ecp_name_mcriap,
            'ecp_mcriap' => $expertise->ecp_mcriap,
            'ecp_name_go' => $expertise->ecp_name_go,
            'ecp' => $expertise->ecp,
            'accept_mcriap_date' => $expertise->accept_mcriap_date,
            'comm_1' => $expertise->comm_1,
            'comm_2' => $expertise->comm_2,
            'comm_3' => $expertise->comm_3,
            'comm_4' => $expertise->comm_4,
            'comm_5' => $expertise->comm_5,
            'comm_6' => $expertise->comm_6,
            'comm_7' => $expertise->comm_7,
            'comm_8' => $expertise->comm_8,
            'comm_9' => $expertise->comm_9,
            'comm_10' => $expertise->comm_10,
            'comm_11' => $expertise->comm_11,
            'comm_12' => $expertise->comm_12,
            'comm_13' => $expertise->comm_13,

            
        ];
        $pdf = \PDF::loadView('expertise_result', $data);
        return $pdf->download('expertise_result.pdf');

    }



    // На согласовании
    public function approve()
{
    $govs = Government::all();
    $user = Auth::user();

    // Проверяем, имеет ли пользователь роль ROLE_GO_EXPERTISE_CONFIRMER
    if ($user->hasRole('ROLE_GO_EXPERTISE_CONFIRMER')) {
        $expertises = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
            ->where('expertise.goverment_id', $user->government_id)
            ->where('expertise.send', '1')
            ->where('expertise_role_status.user_id', $user->id)
            ->where('expertise_role_status.approve', 1)
            ->orderBy('expertise.id', 'desc')
            ->select('expertise.*') // Выбираем все поля из таблицы expertise
            ->paginate(10);

        return view('expertise.approve', [
            'govs' => $govs,
            'expertises' => $expertises
        ]);
    }

    if ($user->hasRole('ROLE_GO_EXPERTISE_EDITOR')) {
        $expertises = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
            ->where('expertise.goverment_id', $user->government_id)
            ->where('expertise.send', '1')
            // ->where('expertise_role_status.user_id', $user->id)
            ->where('expertise_role_status.approve', 1)
            ->orderBy('expertise.id', 'desc')
            ->select('expertise.*') // Выбираем все поля из таблицы expertise
            ->paginate(10);

        return view('expertise.approve', [
            'govs' => $govs,
            'expertises' => $expertises
        ]);
    }

    if ($user->hasRole('ROLE_GO_EXPERTISE_SIGNER')) {
        $expertises = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
            ->where('expertise.goverment_id', $user->government_id)
            ->where('expertise.send', '1')
            // ->where('expertise_role_status.user_id', $user->id)
            ->where('expertise_role_status.approve', 1)
            ->orderBy('expertise.id', 'desc')
            ->select('expertise.*') // Выбираем все поля из таблицы expertise
            ->paginate(10);

        return view('expertise.approve', [
            'govs' => $govs,
            'expertises' => $expertises
        ]);
    }

    // Проверяем, имеет ли пользователь роль ROLE_UO_EXPERTISE_CONFIRMER
    if ($user->hasRole('ROLE_UO_EXPERTISE_CONFIRMER')) {
        // Отладочная информация
        Log::info('User has role ROLE_UO_EXPERTISE_CONFIRMER');
        
        $expertises = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
            // ->where('expertise.goverment_id', $user->government_id)
            ->where('expertise.send_to_uo_confirmer', 1) // Новое условие для send_to_uo_confirmer
            ->where('expertise_role_status.user_id', $user->id)
            ->where('expertise_role_status.approve', 1) // Новое условие для approve
            ->orderBy('expertise.id', 'desc')
            ->select('expertise.*') // Выбираем все поля из таблицы expertise
            ->paginate(10);

        // Отладочная информация
        Log::info('Expertises count: ' . $expertises->total());

        return view('expertise.approve', [
            'govs' => $govs,
            'expertises' => $expertises
        ]);
    }

    // Если у пользователя нет необходимой роли, просто возвращаем пустую страницу
    return view('expertise.approve', [
        'govs' => $govs,
        'expertises' => collect(), // передаем пустую коллекцию экспертиз
    ]);
}

    


   

public function approve_confirmers(){
    $user = Auth::user();
    $govs = Government::all();
        
    $expertises = Expertise::where(function ($query) use ($user) {
        if ($user->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER')) {
            $query->where('send_to_kib', '1');
        } elseif ($user->hasRole('ROLE_SI_EXPERTISE_CONFIRMER')) {
            $query->where('send_to_si', '1');
        } else {
            // Если у пользователя нет соответствующей роли, не отображаем ничего
            $query->whereRaw('1=0');
        }
    })
    ->orderBy('id', 'desc')
    ->paginate(10);
    
    return view('expertise.approve_confirmers', compact('govs', 'expertises'));
}
    

    


// public function approve_info($id, $version_id = null)
// {
//     $expertise = Expertise::findOrFail($id);

//     // Получить нужную версию или самую последнюю, если не указана
//     // if ($version_id) {
//         $version = ExpertiseVersion::where('expertise_id', $id)->where('version_number', $version_id)->firstOrFail();
//         // dd($version);
//     // } else {
//         // $version = ExpertiseVersion::where('expertise_id', $id)->orderBy('version_expertise', 'desc')->first();
//         // $version = ExpertiseVersion::where('expertise_id', $id)->where('version_number', $version_id)->firstOrFail();

//     // }

//     if ($version_id) {
//         $tz = TechnicalTask::where('expertise_id', $id)->where('version', $version_id)->first();
//     } else {
//         $tz = TechnicalTask::where('expertise_id', $id)->first();
//     }

//     if ($version_id) {
//         $document = ExpertiseDocument::where('expertise_id', $id)->where('version', $version_id)->first();
//     } else {
//         $document = ExpertiseDocument::where('expertise_id', $id)->first();
//     }

//     return view('expertise.info.index', [
//         'expertise' => $expertise,
//         'version' => $version,
//         'tz' => $tz,
//         'document' => $document
//     ]);
// }


public function approve_info($id, $version_id = null)
{
    $expertise = Expertise::findOrFail($id);
    $current_version = $expertise -> version_expertise;
    // dd((int) $current_version, (int) $version_id);
    // $ef = (int) $current_version > (int) $version_id;
    // dd($ef);

    if ((int) $current_version > (int) $version_id) {
        // Выборка из обеих моделей, если версия больше предыдущей
        $version = ExpertiseVersion::where('expertise_id', $id)->where('version_number', $version_id)->firstOrFail();
    } else {
        $version = Expertise::where('id', $id)->where('version_expertise', $version_id)->firstOrFail();
        // Выборка только из модели Expertise, если версия равна 1
    }

   
    $tz = TechnicalTask::where('expertise_id', $id)->where('version', $version_id)->first();
    $document = ExpertiseDocument::where('expertise_id', $id)->where('version', $version_id)->first();
    // dd($tz,$document);

    return view('expertise.info.index', [
        'expertise' => $expertise,
        'version' => $version,
        'tz' => $tz,
        'document' => $document
    ]);
}





    // Подписание ЭЦП со стороны ГО (Ajax)
    public function approve_signecp(Request $request)
    {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];

            $subjectCn = $request->_verify['subjectCn'];


            Expertise::find($request->_expertise_id)->update([
                'discart_go' => 0,
                'discart_go_date' => NULL,
                'accept_go' => 1,
                'accept_go_date' => new DateTime(),
                'comment_discart' => "",
                'comment_accept' => $request->_comment,
                // 'send_to_si' => $request->send_to_si,
                // 'send_to_kib' => $request->send_to_kib,
                // 'send_to_mcriap_executor' => $request->send_to_mcriap_executor,
                // 'send_to_uo' => 0,
                // 'send_to_si' => 1,
                // 'send_to_kib' => 1,
                // 'send_to_mcriap_executor' => 1,
                'ecp_name_go' => $subjectCn,
                'ecp' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber
            ]);


            return response()->json(['options'=>'Запрос на экспертизу успешно подписана']);  
        }
    }
    
    

    // Исходящие
    // public function outbox()
    // {
    //     $govs = Government::all();
    //     $user = Auth::user();
    
    //     // Проверяем, имеет ли пользователь роль ROLE_GO_EXPERTISE_SIGNER
    //     if (!$user->hasRole('ROLE_GO_EXPERTISE_SIGNER')) {
    //         // Если у пользователя нет необходимой роли, просто возвращаем пустую страницу
    //         return view('expertise.outbox', [
    //             'govs' => $govs,
    //             'expertises' => collect(), // передаем пустую коллекцию экспертиз
    //         ]);
    //     }
    
    //     $expertises = Expertise::join('expertise_role_status as signer_status', function ($join) use ($user) {
    //         $join->on('expertise.id', '=', 'signer_status.expertise_id')
    //              ->where('signer_status.user_id', $user->id) // Условие для роли подписанта
    //              ->where('signer_status.signing', 1); // Проверяем, что пользователь - подписант
    //     })
    //     ->select('expertise.*') // Выбираем все поля из таблицы expertise
    //     ->leftJoin('expertise_role_status as approver_status', function ($join) {
    //         $join->on('expertise.id', '=', 'approver_status.expertise_id')
    //             ->where(function ($query) {
    //                 // Условие для согласующего или если user_id равен 0
    //                 $query->where('approver_status.approve', 1)
    //                     ->orWhere('approver_status.user_id', 0);
    //             });
    //     })
    //     ->where(function ($query) {
    //         // Условие, когда документ доступен после согласования согласующим
    //         $query->where('expertise.go_approve', 1)
    //               ->where('expertise.send_to_go_signer', 1);
    //     })
    //     ->orWhere(function ($query) {
    //         // Условие, когда документ доступен после подписания подписывающим без согласования
    //         $query->where(function ($query) {
    //             $query->orWhere('approver_status.user_id', 0);
    //         })
    //         ->where('expertise.go_approve', 0);
    //     })
    //     ->orWhere(function ($query) use ($user) {
    //         if ($user->hasRole('ROLE_SI_EXPERTISE_SIGNER')) {
    //             $query->where('expertise.send_to_si_signer', '=', 1);
    //         }
    //     })
    //     ->orderBy('expertise.id', 'desc')
    //     ->paginate(10);
    //     return view('expertise.outbox', [
    //         'govs' => $govs,
    //         'expertises' => $expertises
    //     ]);
    // }

    public function outbox()
    {
        $govs = Government::all();
        $user = Auth::user();
    

        // Проверяем, имеет ли пользователь роль ROLE_GO_EXPERTISE_SIGNER или ROLE_UO_EXPERTISE_SIGNER
        if (!$user->hasRole('ROLE_GO_EXPERTISE_SIGNER') && !$user->hasRole('ROLE_UO_EXPERTISE_SIGNER')) {
            // Если у пользователя нет необходимой роли, просто возвращаем пустую страницу
            return view('expertise.outbox', [
                'govs' => $govs,
                'expertises' => collect(), // передаем пустую коллекцию экспертиз
            ]);
        }
    
        $query = Expertise::join('expertise_role_status as signer_status', function ($join) use ($user) {
            $join->on('expertise.id', '=', 'signer_status.expertise_id')
                 ->where('signer_status.user_id', $user->id) // Условие для роли подписанта
                 ->where('signer_status.signing', 1); // Проверяем, что пользователь - подписант
        })
        ->select('expertise.*') // Выбираем все поля из таблицы expertise
        ->leftJoin('expertise_role_status as approver_status', function ($join) {
            $join->on('expertise.id', '=', 'approver_status.expertise_id')
                ->where(function ($query) {
                    // Условие для согласующего или если user_id равен 0
                    $query->where('approver_status.approve', 1)
                        ->orWhere('approver_status.user_id', 0);
                });
        })
        ->where(function ($query) {
            // Условие, когда документ доступен после согласования согласующим
            $query->where('expertise.go_approve', 1)
                  ->where('expertise.send_to_go_signer', 1);
        })
        ->orWhere(function ($query) {
            // Условие, когда документ доступен после подписания подписывающим без согласования
            $query->where(function ($query) {
                $query->orWhere('approver_status.user_id', 0);
            })
            ->where('expertise.go_approve', 0);
        })
        ->orWhere(function ($query) use ($user) {
            if ($user->hasRole('ROLE_SI_EXPERTISE_SIGNER')) {
                $query->where('expertise.send_to_si_signer', '=', 1);
            }
        });
    
        // Добавляем новое условие для ROLE_UO_EXPERTISE_SIGNER
        if ($user->hasRole('ROLE_UO_EXPERTISE_SIGNER')) {
            $query->leftJoin('expertise_role_status as uo_signer_status', 'expertise.id', '=', 'uo_signer_status.expertise_id')
                ->orWhere(function ($query) use ($user) {
                    $query->where('uo_signer_status.user_id', $user->id)
                          ->where('uo_signer_status.signing', 1)
                          ->where('expertise.send_to_uo_signer', 1);
                });
        }
    
        $expertises = $query->distinct() // Исключаем дублирования
                            ->orderBy('expertise.id', 'desc')
                            ->paginate(10);
    
        return view('expertise.outbox', [
            'govs' => $govs,
            'expertises' => $expertises
        ]);
    }

//     public function approve_info($id, $version_id)
// {
//     // Находим экспертизу по ID
//     $expertise = Expertise::where('id', $id)->first();

//     // Проверяем, была ли найдена экспертиза
//     if (!$expertise) {
//         abort(404); // Экспертиза не найдена
//     }

//     // Находим версию по version_id
//     $version = ExpertiseVersion::where('id', $version_id)->where('expertise_id', $id)->first();

//     // Проверяем, была ли найдена версия
//     if (!$version) {
//         abort(404); // Версия не найдена
//     }

//     $tz = TechnicalTask::where('expertise_id', $id)->first();
//     $document = ExpertiseDocument::where('expertise_id', $id)->first();

//     return view('expertise.info.index', [
//         'expertise' => $expertise,
//         'version' => $version,
//         'tz' => $tz,
//         'document' => $document
//     ]);
// }

    

    

    

    public function signer_outbox()
{
    $govs = Government::all();
    $user = Auth::user();
    $expertises = collect(); // Пустая коллекция на случай отсутствия ролей

    // Проверяем наличие хотя бы одной из ролей
    if ($user->hasRole('ROLE_SI_EXPERTISE_SIGNER') || $user->hasRole('ROLE_GTS_EXPERTISE_SIGNER')) {
        $expertises = Expertise::query();

        // Если у пользователя есть роль SI_EXPERTISE_SIGNER
        if ($user->hasRole('ROLE_SI_EXPERTISE_SIGNER')) {
            $expertises = $expertises->join('expertise_role_status as si_signer_status', function ($join) use ($user) {
                $join->on('expertise.id', '=', 'si_signer_status.expertise_id')
                    ->where('si_signer_status.user_id', $user->id)
                    ->where('si_signer_status.signing', 1)
                    ->where('expertise.send_to_si_signer', 1);
            });
        }

        // Если у пользователя есть роль GTS_EXPERTISE_SIGNER
        if ($user->hasRole('ROLE_GTS_EXPERTISE_SIGNER')) {
            $expertises = $expertises->join('expertise_role_status as gts_signer_status', function ($join) use ($user) {
                $join->on('expertise.id', '=', 'gts_signer_status.expertise_id')
                    ->where('gts_signer_status.user_id', $user->id)
                    ->where('gts_signer_status.signing', 1)
                    ->where('expertise.send_to_gts_signer', 1);
            });
        }

        $expertises = $expertises->select('expertise.*')
            ->orderBy('expertise.id', 'desc')
            ->paginate(10);
    }

    return view('expertise.signer_outbox', [
        'govs' => $govs,
        'expertises' => $expertises,
    ]);
}

    
    
    // }

    // public function outbox()
    // {
    //     $govs = Government::all();
    //     $expertises = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
    // ->where('expertise.send', '1')
    // ->when(Auth::user()->hasRole('ROLE_GO_EXPERTISE_SIGNER'), function ($query) {
    //     return $query->where(function($subquery) {
    //         $subquery->where(function($subquery) {
    //             $subquery->where('expertise.go_approve', 0)
    //                      ->where('expertise_role_status.signing', 1);
    //         })->orWhere(function($subquery) {
    //             $subquery->where('expertise.go_approve', 1)
                         
    //         });
    //     });
    // })
    // ->orderBy('expertise.id', 'desc')
    // ->paginate(10);
    // return view('expertise.outbox', [
    //     'govs' => $govs,
    //     'expertises' => $expertises
    // ]);

    
    // }



    // Черновики
    // public function draft()
    // {
    //     $govs = Government::all();
    //     $expertises = Expertise::
    //         where('user_id', Auth::user()->id)->
    //         where('goverment_id', Auth::user()->government_id)->
    //         where('draft', '1')->
    //         orderBy('id', 'desc')->
    //         paginate(10);
    //     return View::make('expertise.draft', [
    //         'govs' => $govs,
    //         'expertises' => $expertises
    //     ]);
    // }

//     public function draft()
// {
//     $govs = Government::all();
//     $expertises = Expertise::where(function ($query) {
//         $query->where('user_id', Auth::user()->id)
//               ->where('goverment_id', Auth::user()->government_id)
//               ->where('draft', '1');
//     })->orWhere('send_to_go_fromUo', '1')
//       ->orderBy('id', 'desc')
//       ->paginate(10);

//     return View::make('expertise.draft', [
//         'govs' => $govs,
//         'expertises' => $expertises
//     ]);
// }

// public function draft()
// {
//     $govs = Government::all();
//     $expertises = Expertise::where(function ($query) {
//         $query->where('user_id', Auth::user()->id)
//               ->where('goverment_id', Auth::user()->government_id)
//               ->where('draft', '1');
//     })->orWhere('send_to_go_fromUo', '1')
//       ->orderBy('id', 'desc')
//       ->paginate(10);

//     $expertiseCount = Expertise::where(function ($query) {
//         $query->where('user_id', Auth::user()->id)
//               ->where('goverment_id', Auth::user()->government_id)
//               ->where('draft', '1');
//     })->orWhere('send_to_go_fromUo', '1')
//       ->count();

//     return View::make('expertise.draft', [
//         'govs' => $govs,
//         'expertises' => $expertises,
//         'expertiseCount' => $expertiseCount // добавьте это
//     ]);
// }

public function draft()
{
    $govs = Government::all();
    $expertises = Expertise::where(function ($query) {
        $query->where('user_id', Auth::user()->id)
              ->where('goverment_id', Auth::user()->government_id)
              ->where('draft', '1');
    })->orWhere('send_to_go_fromUo', '1')
      ->orderBy('id', 'desc')
      ->paginate(10);

    $expertiseCount = Expertise::where(function ($query) {
        $query->where('user_id', Auth::user()->id)
              ->where('goverment_id', Auth::user()->government_id)
              ->where('draft', '1');
    })->orWhere('send_to_go_fromUo', '1')
      ->count();

    // Сохраняем значение в сессии
    session(['expertiseCount' => $expertiseCount]);

    return View::make('expertise.draft', [
        'govs' => $govs,
        'expertises' => $expertises,
        'expertiseCount' => $expertiseCount // добавьте это
    ]);
}



    


    // public function in_work(){
    //     $user = Auth::user();
    //     $govs = Government::all();
        
    //     $expertises = Expertise::where(function ($query) use ($user) {
    //         if ($user->hasRole('ROLE_UO_EXPERTISE_REVIEWER')) {
    //             $query->where('send_to_uo_reviewer', '1')
    //             ->orWhere('accept_uo_reviewer', '1');
    //         }  elseif ($user->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR')) {
    //             $query->where('send_to_kib', '1');
    //         } elseif ($user->hasRole('ROLE_SI_EXPERTISE_CONFIRMER')) {
    //             $query->where('send_to_si', '1');
    //         }elseif ($user->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER')) {
    //             $query->where('send_to_gts', '1');
    //         }elseif ($user->hasRole('ROLE_UO_EXPERTISE_DANA')) {
    //             $query->where('send_to_uo', '1');
    //         } else {
    //             // Если у пользователя нет соответствующей роли, не отображаем ничего
    //             $query->whereRaw('1=0');
    //         }
    //     })
    //     ->orderBy('id', 'desc')
    //     ->paginate(10);
    
    //     return view('expertise.in_work', compact('govs', 'expertises'));
    // }

    public function in_work() {
        $user = Auth::user();
        $govs = Government::all();
        
        $expertisesQuery = Expertise::query();
    
        if ($user->hasRole('ROLE_UO_EXPERTISE_REVIEWER')) {
            $expertisesQuery->where(function($query) {
                $query->where('send_to_uo_reviewer', '1')
                    ->orWhere('accept_uo_reviewer', '1');
            });
        } elseif ($user->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR')) {
            $expertisesQuery->where('send_to_kib', '1');
        } elseif ($user->hasRole('ROLE_SI_EXPERTISE_CONFIRMER')) {
            $expertisesQuery->where('send_to_si', '1');
        } elseif ($user->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER')) {
            $expertisesQuery->where('send_to_gts', '1');
        } elseif ($user->hasRole('ROLE_UO_EXPERTISE_DANA')) {
            $expertisesQuery->where('send_to_uo', '1');
        } else {
            // Если у пользователя нет соответствующей роли, не отображаем ничего
            $expertisesQuery->whereRaw('1=0');
        }
    
        $expertisesCount = $expertisesQuery->count();
        $expertises = $expertisesQuery->orderBy('id', 'desc')->paginate(10);
    
        return view('expertise.in_work', compact('govs', 'expertises', 'expertisesCount'));
    }
    
    

    public function got_job(){
        $govs = Government::all();
        $expertises = Expertise::
            where('send_to_uo', '1')->
            orderBy('id', 'desc')->
            paginate(10);
        return View::make('expertise.got_job', [
            'govs' => $govs,
            'expertises' => $expertises
        ]); 
    }

    public function executor(){

    $govs = Government::all();
    $expertises = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
    ->select('expertise.*')
    ->where('expertise.send_to_si_reviewers', '1')
    ->where('expertise_role_status.user_id', Auth::id())
    ->where('expertise_role_status.executor', 1)
    ->orWhere(function($query) {
        $query->where('expertise.send_to_gts_reviewers', '1')
              ->where('expertise_role_status.user_id', Auth::id())
              ->where('expertise_role_status.executor', 1);
    })
    ->orderBy('expertise.id', 'desc')
    ->paginate(10);

    
    return view('expertise.executor', [
        'govs' => $govs,
        'expertises' => $expertises
    ]);
}


// public function goExecutor(){

//     $govs = Government::all();
//     $expertises = Expertise::
//     where('expertise.send_to_uo_si', '1')
//     ->where('expertise.send_to_uo_gts', '1')
//     ->where('expertise.user_id', Auth::id())
//     ->orderBy('expertise.id', 'desc')
//     ->paginate(10);
    
//     return view('expertise.goExecutor', [
//         'govs' => $govs,
//         'expertises' => $expertises
//     ]);
// }


public function goExecutor() {
    $govs = Government::all();
    $expertises = Expertise::
    where('expertise.send_to_uo_si', '1')
    ->where('expertise.send_to_uo_gts', '1')
    ->where('expertise.user_id', Auth::id())
    ->orderBy('expertise.id', 'desc')
    ->paginate(10);

    // Подсчитываем количество записей, соответствующих условиям
    $expertiseCount = Expertise::
    where('expertise.send_to_uo_si', '1')
    ->where('expertise.send_to_uo_gts', '1')
    ->where('expertise.user_id', Auth::id())
    ->count();

    return view('expertise.goExecutor', [
        'govs' => $govs,
        'expertises' => $expertises,
        'expertiseCount' => $expertiseCount // Передаем количество записей в представление
    ]);
}





    public function showComment(){
        $user = User::all();
        return view('expertise.info.comments', compact('user'));
    }

   
    // public function approve_go(Request $request) {
    //     if ($request->ajax()) {
    //         Expertise::find($request->expertise_id)->update([
    //             'go_approve' => 1,
    //             'send' => 0,
    //             'send_to_go_signer' => 1
    //         ]);
    //         return response()->json(['options' => 'Запрос согласован']);

    //     }
    // }
    // public function approve_go(Request $request) {
    //     if ($request->ajax()) {
    //         Expertise::find($request->expertise_id)->update([
    //             'go_approve' => 1,
    //             'send' => 0,
    //             'send_to_go_signer' => 1
    //         ]);
    //         return response()->json(['options' => 'Запрос согласован']);
    //     }
    
    //     return redirect()->route('expertise.approve');
    // }
    

    public function approve_si_reviewer(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_si_reviewers' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_si_reviewers' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }
    
    
    public function accept_si_confirmer_first(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_si_confirmer_first' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_si_confirmer_first' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }


    public function accept_si_confirmer_second(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_si_confirmer_second' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_si_confirmer_second' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }

    public function accept_gts_reviewer(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_gts_reviewers' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_gts_reviewers' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }

    public function accept_uo_reviewer_concl(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_uo_reviewers' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_uo_reviewers' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }

    public function accept_uo_confirmer(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_uo_confirmer' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_uo_confirmer' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }
    

    public function accept_gts_confirmer(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_gts_confirmer' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_gts_confirmer' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }

    public function accept_si_signer(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_si_signer' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_si_signer' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }

    public function accept_gts_signer(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_gts_signer' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_gts_signer' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }
   

    public function  accept_uo_signer(Request $request) {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];
            $subjectCn = $request->_verify['subjectCn'];

            Expertise::find($request->expertise_id)->update([
                'ecp_uo_signer' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name_uo_signer' => $subjectCn,
            ]);
            return response()->json(['options' => 'Запрос подписан']);
        }
    }

    // public function send_uo_reviewer(Request $request) {
    //     if ($request->ajax()) {
    //         Expertise::find($request->expertise_id)->update([
    //             'send_to_uo_reviewer' => 1,
    //             'comment_accept' => $request->_comment,
    //             'send_to_uo' => 0,
    //             'uo_reviewer' => $request->send_to_mcriap_executor  // Используем переданный идентификатор исполнителя
    //         ]);
    //         return response()->json(['options' => 'Отправлен к исполнителю']);
    //     }
    // }


    public function accept_uo_reviewer(Request $request) {
        if ($request->ajax()) {
            Expertise::find($request->expertise_id)->update([
                'send_to_uo_reviewer' => 0,
                'comment_accept' => $request->_comment,
                'send_to_uo' => 1,
                'accept_uo_reviewer' => 1
            ]);
            return response()->json(['options' => 'Исполнитель принял']);
        }
    }
    
    public function accept_uo_confirm(Request $request) {
        if ($request->ajax()) {
            Expertise::find($request->expertise_id)->update([
                'accept_uo_to_confirm' => 1,
                'send_to_uo_confirmer' => 0,
            ]);
            return response()->json(['options' => 'Согласован!']);
        }
    }

    
    // public function sendToConfirmers(Request $request) {
    //     if ($request->ajax()) {
    //         Expertise::find($request->expertise_id)->update([
    //             'send_to_si' => 1,
    //             'send_to_kib' => 1,
    //             'send_to_uo' => 0,
    //             'comment_accept' => $request->_comment,
    //         ]);
    //         return response()->json(['options' => 'Отправлен Согласующим']);
    //     }
    // }
}


