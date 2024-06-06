<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

use App\Models\Government;
use App\Models\InformationSystem;
use App\Models\InformationSystemCollection;
use App\Models\Passport;
use App\Models\User;
use App\Models\ISType;
use DateTime;

class OnlineResourcesController extends Controller
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
    $iss = InformationSystemCollection::where('app_software_type', 'LIKE', 'internet_resource%')
        ->orderBy('idis', 'asc')
        ->paginate(20);

    return View::make('onlineResources.index', [
        'iss' => $iss
    ]);
}

    
 

    
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $iss = InformationSystemCollection::where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%$query%");
        })
        ->paginate(20);
    
        return view('onlineResources.index', ['iss' => $iss]);
    }
    






    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $types = ISType::where('visible', 1)->get();
    //     return View::make('accounting.reqests.create', [
    //         'types' => $types,
    //     ]);

    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     // Сохранить запрос как черновик
    //     if ( $request->has('save_draft') ) {

    //         $saveDraft = InformationSystem::create([
    //             'user_id' => Auth::user()->id,
    //             'goverment_id' => Auth::user()->government_id,
    //             'bin' => stripslashes(trim($request->bin)),
    //             'name_ru' => stripslashes(trim($request->name_ru)),
    //             'name_kz' => stripslashes(trim($request->name_kz)),
    //             'name_en' => stripslashes(trim($request->name_en)),
    //             'abbreviation' => stripslashes(trim($request->abbreviation)),
    //             'comment' => stripslashes(trim($request->comment)),
    //             'status' => 0,
    //             'type_is' => $request->type_select,
    //             'cgo_mio' => stripslashes(trim($request->cgo_mio)),
    //             'draft' => 1,
    //             'send' => 0
    //         ]);

    //         $drafts = InformationSystem::
    //             where('user_id', Auth::user()->id)->
    //             where('goverment_id', Auth::user()->government_id)->
    //             where('draft', 1)->
    //             orderBy('id', 'desc')->
    //             get();

            
    //         return redirect()->route('accounting.draft', [
    //             'drafts' => $drafts
    //         ])->with('success', 'Запрос на добавление данных в учет сведений успешно создан и сохранен в черновиках');
    //     }

    //     // Сохранить запрос как черновик
    //     elseif ( $request->has('save_send') ) {

    //         $saveSend = InformationSystem::create([
    //             'user_id' => Auth::user()->id,
    //             'goverment_id' => Auth::user()->government_id,
    //             'name_ru' => stripslashes(trim($request->name_ru)),
    //             'name_kz' => stripslashes(trim($request->name_kz)),
    //             'name_en' => stripslashes(trim($request->name_en)),
    //             'abbreviation' => stripslashes(trim($request->abbreviation)),
    //             'comment' => stripslashes(trim($request->comment)),
    //             'status' => 0,
    //             'type_is' => $request->type_select,
    //             'cgo_mio' => stripslashes(trim($request->cgo_mio)),
    //             'draft' => 0,
    //             'send' => 1
    //         ]);

    //         $sends = InformationSystem::
    //             where('user_id', Auth::user()->id)->
    //             where('goverment_id', Auth::user()->government_id)->
    //             where('send', 1)->
    //             orderBy('id', 'desc')->
    //             get();

            
    //         return redirect()->route('accounting.outbox', [
    //             'sends' => $sends
    //         ])->with('success', 'Запрос на добавление данных в учет сведений успешно создан и отправлен на рассмотрение');

    //     }

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* OLD
        $is = InformationSystem::where('id', $id)->first();
        return View::make('accounting.is_info', [
           'is' => $is
        ]);
         */
        $is = InformationSystemCollection::where('idis', $id)->first();
        return View::make('accounting.is_info', [
           'is' => $is
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




    public function inbox()
    {
        return View::make('accounting.reqests.inbox', [
           
        ]);
    }


    public function outbox()
    {
        $sends = InformationSystem::
            where('user_id', Auth::user()->id)->
            where('goverment_id', Auth::user()->government_id)->
            where('send', 1)->
            orderBy('id', 'desc')->
            get();

        return View::make('accounting.reqests.outbox', [
           'sends' => $sends
        ]);
    }


    public function draft()
    {
        $drafts = InformationSystem::
            where('user_id', Auth::user()->id)->
            where('goverment_id', Auth::user()->government_id)->
            where('draft', 1)->
            orderBy('id', 'desc')->
            get();

        return View::make('accounting.reqests.draft', [
           'drafts' => $drafts
        ]);
    }

    public function iss_old()
    {
        $iss = InformationSystem::
            where('status', 1)->
            orderBy('id', 'desc')->
            paginate(20);

        return View::make('onlineResources.index', [
           'iss' => $iss
        ]);
    }

    public function iss()
    {
        $iss = InformationSystemCollection::paginate(20);

        return View::make('onlineResources.index', [
           'iss' => $iss
        ]);
    }
}
