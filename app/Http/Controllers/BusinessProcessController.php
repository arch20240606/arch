<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

use App\Models\RoadMap;
use App\Models\BusinessFunction;
use App\Models\BusinessProcess;
use App\Models\BusinessCase;

use DateTime;

class BusinessProcessController extends Controller
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
        $b_roadmaps = RoadMap::where('government_id', Auth::user()->government_id)->where('status', '1')->orderBy('id', 'desc')->get();
        $b_proccesses = BusinessProcess::where('government_id', Auth::user()->government_id)->where('status', '1')->orderBy('id', 'desc')->paginate(20);
        return View::make('businessprocess.index', [
            'b_proccesses' => $b_proccesses,
            'b_roadmaps' => $b_roadmaps
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $b_roadmaps = RoadMap::where('government_id', Auth::user()->government_id)->where('status', '1')->orderBy('id', 'desc')->get();
        $b_functions = BusinessFunction::where('government_id', Auth::user()->government_id)->where('status', '1')->get();
        return View::make('businessprocess.index_create', [
            'b_functions' => $b_functions,
            'b_roadmaps' => $b_roadmaps
        ]);
    }

    public function create_bp($id)
    {
        $b_case = BusinessCase::where('government_id', Auth::user()->government_id)->where('id', $id)->first();
        $b_roadmaps = RoadMap::where('government_id', Auth::user()->government_id)->where('status', '1')->orderBy('id', 'desc')->get();
        $b_functions = BusinessFunction::where('government_id', Auth::user()->government_id)->where('status', '1')->get();
        return View::make('businessprocess.index_create_bp', [
            'b_functions' => $b_functions,
            'b_roadmaps' => $b_roadmaps,
            'b_case' => $b_case
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
        // Нажата кнопка сохранения Кейса
        if ( $request->has('save_case') ) {

            $name_case = strip_tags(trim($request->bp_name));

            $addCase = BusinessCase::create([
                'user_id' => Auth::user()->id,
                'government_id' => Auth::user()->government_id,
                'roadmap_id' => $request->bp_roadmap,
                'name' => $name_case,
                'function_groups' => json_encode($request->bp_functions),
                'date' => $request->bp_date,
                'status' => '1'
            ]);

            return Redirect::to('businessprocess')->with(['successMsg' => 'Кейс <b>'.$name_case.'</b> успешно сохранен для дальнейшей обработки']);



        // Нажата кнопка сохранения бизнес-процесса
        } else {

            /* загрузка файлов */
            if ( $request->file('file_bpm_asis') ) {
                $uploadedFile = $request->file('file_bpm_asis');
                $file_bpm_asis_upload = $uploadedFile->store('userfiles/businessproccess');
                $file_bpm_asis = $request->file('file_bpm_asis')->getClientOriginalName();
                $file_bpm_asis_type = $uploadedFile->getMimeType();
                $file_bpm_asis_size = $uploadedFile->getSize();
            } else {
                $file_bpm_asis_upload = NULL;
                $file_bpm_asis = NULL;
                $file_bpm_asis_type = NULL;
                $file_bpm_asis_size = NULL;
            }

            if ( $request->file('file_bpm_tobe') ) {
                $uploadedFile = $request->file('file_bpm_tobe');
                $file_bpm_tobe_upload = $uploadedFile->store('userfiles/businessproccess');
                $file_bpm_tobe = $request->file('file_bpm_tobe')->getClientOriginalName();
                $file_bpm_tobe_type = $uploadedFile->getMimeType();
                $file_bpm_tobe_size = $uploadedFile->getSize();
            } else {
                $file_bpm_tobe_upload = NULL;
                $file_bpm_tobe = NULL;
                $file_bpm_tobe_type = NULL;
                $file_bpm_tobe_size = NULL;
            }

            if ( $request->file('file_bpm_program') ) {
                $uploadedFile = $request->file('file_bpm_program');
                $file_bpm_program_upload = $uploadedFile->store('userfiles/businessproccess');
                $file_bpm_program = $request->file('file_bpm_program')->getClientOriginalName();
                $file_bpm_program_type = $uploadedFile->getMimeType();
                $file_bpm_program_size = $uploadedFile->getSize();
            } else {
                $file_bpm_program_upload = NULL;
                $file_bpm_program = NULL;
                $file_bpm_program_type = NULL;
                $file_bpm_program_size = NULL;
            }
            /* Конец загрузки файлов */


            $addBusiness = BusinessProcess::create([
                'user_id' => Auth::user()->id,
                'government_id' => Auth::user()->government_id,
                'businesscase_id' => $request->businesscase_id,
                'businessfunction_id' => $request->bp_function,
                'name' => $request->bp_name,

                'file_as_is' => $file_bpm_asis,
                'file_as_upload' => $file_bpm_asis_upload,
                'file_as_is_type' => $file_bpm_asis_type,
                'file_as_is_size' => $file_bpm_asis_size,

                'file_to_be' => $file_bpm_tobe,
                'file_to_be_upload' => $file_bpm_tobe_upload,
                'file_to_be_type' => $file_bpm_tobe_type,
                'file_to_be_size' => $file_bpm_tobe_size,

                'file_program' => $file_bpm_program,
                'file_program_upload' => $file_bpm_program_upload,
                'file_program_type' => $file_bpm_program_type,
                'file_program_size' => $file_bpm_program_size,

                'draft' => '0',
                'send' => '0',
                'status' => '1'
            ]);

            return Redirect::to('businessprocess')->with(['successMsg' => 'Бизнес-процесс <b>'.$request->bp_name.'</b> успешно сохранен для дальнейшей обработки']);

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
        $b_case = BusinessCase::where('id', $id)->where('government_id', Auth::user()->government_id)->first();
        $b_roadmaps = RoadMap::where('government_id', Auth::user()->government_id)->where('status', '1')->orderBy('id', 'desc')->get();
        $b_functions = BusinessFunction::where('government_id', Auth::user()->government_id)->where('status', '1')->get();
        return View::make('businessprocess.index_edit', [
            'b_functions' => $b_functions,
            'b_roadmaps' => $b_roadmaps,
            'b_case' => $b_case
        ]);

    }

    public function edit_bp($id)
    {
        $b_process = BusinessProcess::where('id', $id)->where('government_id', Auth::user()->government_id)->first();
        $b_roadmaps = RoadMap::where('government_id', Auth::user()->government_id)->where('status', '1')->orderBy('id', 'desc')->get();
        $b_functions = BusinessFunction::where('government_id', Auth::user()->government_id)->where('status', '1')->get();
        return View::make('businessprocess.index_edit_bp', [
            'b_functions' => $b_functions,
            'b_roadmaps' => $b_roadmaps,
            'b_process' => $b_process
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

        // Обновление кейса
        if ( $request->has('update_case') ) {

            $name_case = strip_tags(trim($request->bp_name));

            $updateCase = BusinessCase::find($id);
            $updateCase->update([
                'roadmap_id' => $request->bp_roadmap,
                'name' => $name_case,
                'function_groups' => json_encode($request->bp_functions),
                'date' => $request->bp_date,
            ]);

            return Redirect::to('businessprocess')->with(['successMsg' => 'Кейс <b>'.$name_case.'</b> был успешно обновлен']);
        }

        // Удаление кейса
        if ( $request->has('delete_case') ) {
            $deleteCase = BusinessCase::find($id);
            $deleteCase->delete();
            return Redirect::to('businessprocess')->with(['successMsg' => 'Кейс и его связи с функциями и бизнес-процессами были успешно удалены']);
        }


        // Обновление бизнес-процесса
        if ( $request->has('update_bp') ) {

            /* загрузка файлов */
            if ( $request->file('file_bpm_asis') ) {
                $uploadedFile = $request->file('file_bpm_asis');
                $file_bpm_asis_upload = $uploadedFile->store('userfiles/businessproccess');
                $file_bpm_asis = $request->file('file_bpm_asis')->getClientOriginalName();
                $file_bpm_asis_type = $uploadedFile->getMimeType();
                $file_bpm_asis_size = $uploadedFile->getSize();
            } else {
                $file_bpm_asis_upload = NULL;
                $file_bpm_asis = NULL;
                $file_bpm_asis_type = NULL;
                $file_bpm_asis_size = NULL;
            }

            if ( $request->file('file_bpm_tobe') ) {
                $uploadedFile = $request->file('file_bpm_tobe');
                $file_bpm_tobe_upload = $uploadedFile->store('userfiles/businessproccess');
                $file_bpm_tobe = $request->file('file_bpm_tobe')->getClientOriginalName();
                $file_bpm_tobe_type = $uploadedFile->getMimeType();
                $file_bpm_tobe_size = $uploadedFile->getSize();
            } else {
                $file_bpm_tobe_upload = NULL;
                $file_bpm_tobe = NULL;
                $file_bpm_tobe_type = NULL;
                $file_bpm_tobe_size = NULL;
            }

            if ( $request->file('file_bpm_program') ) {
                $uploadedFile = $request->file('file_bpm_program');
                $file_bpm_program_upload = $uploadedFile->store('userfiles/businessproccess');
                $file_bpm_program = $request->file('file_bpm_program')->getClientOriginalName();
                $file_bpm_program_type = $uploadedFile->getMimeType();
                $file_bpm_program_size = $uploadedFile->getSize();
            } else {
                $file_bpm_program_upload = NULL;
                $file_bpm_program = NULL;
                $file_bpm_program_type = NULL;
                $file_bpm_program_size = NULL;
            }
            /* Конец загрузки файлов */

            $updateBP = BusinessProcess::find($id);
            $updateBP->update([
                'businessfunction_id' => $request->bp_function,
                'name' => $request->bp_name,

                'file_as_is' => $file_bpm_asis,
                'file_as_upload' => $file_bpm_asis_upload,
                'file_as_is_type' => $file_bpm_asis_type,
                'file_as_is_size' => $file_bpm_asis_size,

                'file_to_be' => $file_bpm_tobe,
                'file_to_be_upload' => $file_bpm_tobe_upload,
                'file_to_be_type' => $file_bpm_tobe_type,
                'file_to_be_size' => $file_bpm_tobe_size,

                'file_program' => $file_bpm_program,
                'file_program_upload' => $file_bpm_program_upload,
                'file_program_type' => $file_bpm_program_type,
                'file_program_size' => $file_bpm_program_size,
                'accept' => 0,
                'discard' => 0,
            ]);
            return Redirect::to('businessprocess')->with(['successMsg' => 'Бизнес-процесс <b>'.$request->bp_name.'</b> был успешно обновлен']);
        }

        
        // Удаление бизнес-процесса
        if ( $request->has('delete_bp') ) {
            $deleteBP = BusinessProcess::find($id);
            $deleteBP->delete();
            return Redirect::to('businessprocess')->with(['successMsg' => 'Бизнес-процесс и все его файлы были успешно удалены']);
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


    public function roadmaps()
    {
        $roadmaps = RoadMap::paginate(20);
        return View::make('businessprocess.roadmaps', [
            'roadmaps' => $roadmaps
        ]);
    }



    public function reestr()
    {
        if ( Auth::user()->government_id == 108 ) {


            $b_roadmaps = RoadMap::where('status', '1')->orderBy('id', 'desc')->get();
            $b_proccesses = BusinessProcess::where('status', '1')->orderBy('id', 'desc')->get();
            return View::make('businessprocess.reestr', [
                'b_proccesses' => $b_proccesses,
                'b_roadmaps' => $b_roadmaps
            ]);

            /*
            $cases = BusinessCase::where('status', '1')->orderBy('id', 'desc')->get();
            return View::make('businessprocess.reestr', [
                'cases' => $cases
            ]);
            */


        } else {
            return "Access denied";
        }

    }

    public function view_bp($id)
    {
        $b_process = BusinessProcess::where('id', $id)->first();
        $b_roadmaps = RoadMap::where('status', '1')->orderBy('id', 'desc')->get();
        $b_functions = BusinessFunction::where('status', '1')->get();
        return View::make('businessprocess.reestr_view_bp', [
            'b_functions' => $b_functions,
            'b_roadmaps' => $b_roadmaps,
            'b_process' => $b_process
        ]);
    }



    public function approve(Request $request, $id)
    {
        if ( Auth::user()->government_id == 108 ) {

            // Если бизнес-процесс принят
            if ( $request->has('accept_bp') ) {
                $updateBP = BusinessProcess::find($id);
                $updateBP->update([
                    'file_as_is_accept' => $request->file_as_is_accept,
                    'file_to_be_accept' => $request->file_to_be_accept,
                    'file_program_accept' => $request->file_program_accept,
                    'accept' => 1,
                    'discard' => 0,
                    'comment' => $request->comment
                ]);
                return Redirect::to('businessprocess/reestr')->with(['successMsg' => 'Бизнес-процесс был успешно одобрен']);
            }

            // Если бизнес-процесс отклонен
            if ( $request->has('discard_bp') ) {
                $updateBP = BusinessProcess::find($id);
                $updateBP->update([
                    'file_as_is_accept' => $request->file_as_is_accept,
                    'file_to_be_accept' => $request->file_to_be_accept,
                    'file_program_accept' => $request->file_program_accept,
                    'accept' => 0,
                    'discard' => 1,
                    'comment' => $request->comment
                ]);
                return Redirect::to('businessprocess/reestr')->with(['successMsg' => 'Бизнес-процесс был успешно отклонен']);
            }
            


        } else {
            return "Access denied";
        }
    }
    
}
