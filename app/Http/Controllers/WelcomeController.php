<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Models\Government;
use App\Models\InformationSystem;
use App\Models\InformationSystemCollection;
use App\Models\GosorganCollection;
use App\Models\Passport;
use App\Models\ISType;
use App\Models\DomainCollection;
use App\Models\DomainObjectCollection;
use App\Models\User;
use DateTime;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
   



    public function etalon()
    {
        $domainlists = DomainCollection::where('approve', '1')->get();
        $domainobjects = DomainObjectCollection::get();
        
        return View::make('etalondata.firstpage.index', [
            'domainobjects' => $domainobjects,
            'domainlists' => $domainlists
        ]);

    }

    public function getinfo(Request $request) {

        if ($request->ajax()) {

            if ($request->_id == "") {
                return response()->json(['options'=>'<b>Выберите объект из списка выше</b>']);
            } else {

                $result_text = '<b>Информация о данных:</b><br><br>';
                $data = DomainObjectCollection::where('id', $request->_id)->first();

                $data_json = json_decode($data['attributes'], true);

            
                for ($i = 0; $i < count($data_json); $i++) {
                    $result_text .= '<b>Владелец данных</b>: '.$data_json[$i]['Owner'].'<br>';
                    $result_text .= '<b>Атрибут</b>: <span style="color: #0075ff">'.$data_json[$i]['Attribute'].'</span><br>';
                    $result_text .= '<b>Наименование ИС</b>: '.$data_json[$i]['Original source'].'<br><br>';
                }

                return response()->json(['options'=>$result_text]);
            }
        
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

    public function info($id)
    {
        $infosys = InformationSystemCollection::where('idis', $id)->first();
        return View::make('infosys.info', [
            'infosys' => $infosys
        ]);
    }
    
    
    public function iscgo()
    {
        $infosys = InformationSystemCollection::
            join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
            select('information_system_collections.*')->
            where('information_system_collections.app_software_type', 'informsystem')->
            where('information_system_collections.bpStatus', '<>', 'archive')->
            where('gosorgan_collections.type', '<>', 'central_mio')->
            paginate(20);
        return View::make('infosys.iscgo', [
            'infosys' => $infosys
        ]);
    }

    public function ircgo()
    {
        $infosys = InformationSystemCollection::
            join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
            select('information_system_collections.*')->
            where('information_system_collections.app_software_type', 'internet_resource')->
            where('information_system_collections.bpStatus', '<>', 'archive')->
            where('gosorgan_collections.type', '<>', 'central_mio')->
            paginate(20);
        return View::make('infosys.ircgo', [
            'infosys' => $infosys
        ]);
    }

    public function ikcgo()
    {
        $infosys = InformationSystemCollection::
            join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
            select('information_system_collections.*')->
            where('information_system_collections.app_software_type', 'IC_service')->
            where('information_system_collections.bpStatus', '<>', 'archive')->
            where('gosorgan_collections.type', '<>', 'central_mio')->
            paginate(20);
        return View::make('infosys.ikcgo', [
            'infosys' => $infosys
        ]);
    }

    public function ismio()
    {
        $infosys = InformationSystemCollection::
            join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
            select('information_system_collections.*')->
            where('information_system_collections.app_software_type', 'informsystem')->
            where('information_system_collections.bpStatus', '<>', 'archive')->
            where('gosorgan_collections.type', 'central_mio')->
            paginate(20);
        return View::make('infosys.ismio', [
            'infosys' => $infosys
        ]);
    }

    public function irmio()
    {
        $infosys = InformationSystemCollection::
            join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
            select('information_system_collections.*')->
            where('information_system_collections.app_software_type', 'internet_resource')->
            where('information_system_collections.bpStatus', '<>', 'archive')->
            where('gosorgan_collections.type', 'central_mio')->
            paginate(20);
        return View::make('infosys.irmio', [
            'infosys' => $infosys
        ]);
    }

    public function ikmio()
    {
        $infosys = InformationSystemCollection::
            join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
            select('information_system_collections.*')->
            where('information_system_collections.app_software_type', 'IC_service')->
            where('information_system_collections.bpStatus', '<>', 'archive')->
            where('gosorgan_collections.type', 'central_mio')->
            paginate(20);
        return View::make('infosys.ikmio', [
            'infosys' => $infosys
        ]);
    }

    public function isfirst()
    {
        $infosys = InformationSystemCollection::
            where('app_software_type', 'informsystem')->
            where('wholeClass', 'HIGH_PRIORITY_APPLICATION_SOFTWARE')->
            where('bpStatus', '<>', 'archive')->
            paginate(20);
        return View::make('infosys.isfirst', [
            'infosys' => $infosys
        ]);
    }

    public function issecond()
    {
        $infosys = InformationSystemCollection::
            where('app_software_type', 'informsystem')->
            where('wholeClass', 'MEDIUM_PRIORITY_APPLICATION_SOFTWARE')->
            where('bpStatus', '<>', 'archive')->
            paginate(20);
        return View::make('infosys.issecond', [
            'infosys' => $infosys
        ]);
    }

    public function isthird()
    {
        $infosys = InformationSystemCollection::
            where('app_software_type', 'informsystem')->
            where('wholeClass', 'LOW_PRIORITY_APPLICATION_SOFTWARE')->
            where('bpStatus', '<>', 'archive')->
            paginate(20);
        return View::make('infosys.isthird', [
            'infosys' => $infosys
        ]);
    }





    public function search(Request $request)
    {
        // Поиск по ИС ЦГО
        if ( $request->search_type == "iscgo" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'informsystem')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', '<>', 'central_mio')->
                    paginate(20);
            } else {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'informsystem')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', '<>', 'central_mio')->
                    where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                    orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                    orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                    paginate(20);
            }
            return View::make('infosys.iscgo', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        } 

        // Поиск по Интернет-ресурсам ЦГО
        if ( $request->search_type == "ircgo" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'internet_resource')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', '<>', 'central_mio')->
                    paginate(20);
            } else {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'internet_resource')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', '<>', 'central_mio')->
                    where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                    orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                    orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                    paginate(20);
            }
            return View::make('infosys.ircgo', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        }

        // Поиск по ИК-услуги ЦГО
        if ( $request->search_type == "ikcgo" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'IC_service')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', '<>', 'central_mio')->
                    paginate(20);
            } else {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'IC_service')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', '<>', 'central_mio')->
                    where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                    orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                    orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                    paginate(20);
            }
            return View::make('infosys.ikcgo', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        }

        // Поиск по ИС 1 Класса
        if ( $request->search_type == "isfirst" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    where('app_software_type', 'informsystem')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('information_system_collections.wholeClass', 'HIGH_PRIORITY_APPLICATION_SOFTWARE')->
                    paginate(20);
            } else {
            $infosys = InformationSystemCollection::
                join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                select('information_system_collections.*')->
                where('information_system_collections.bpStatus', '<>', 'archive')->
                where('information_system_collections.app_software_type', 'informsystem')->
                where('information_system_collections.wholeClass', 'HIGH_PRIORITY_APPLICATION_SOFTWARE')->
                where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                paginate(20);
            }
            return View::make('infosys.isfirst', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        } 

        // Поиск по ИС 2 Класса
        if ( $request->search_type == "issecond" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    where('app_software_type', 'informsystem')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('information_system_collections.wholeClass', 'MEDIUM_PRIORITY_APPLICATION_SOFTWARE')->
                    paginate(20);
            } else {
            $infosys = InformationSystemCollection::
                join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                select('information_system_collections.*')->
                where('information_system_collections.bpStatus', '<>', 'archive')->
                where('information_system_collections.app_software_type', 'informsystem')->
                where('information_system_collections.wholeClass', 'MEDIUM_PRIORITY_APPLICATION_SOFTWARE')->
                where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                paginate(20);
            }
            return View::make('infosys.issecond', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        } 

        // Поиск по ИС 3 Класса
        if ( $request->search_type == "isthird" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    where('app_software_type', 'informsystem')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('information_system_collections.wholeClass', 'LOW_PRIORITY_APPLICATION_SOFTWARE')->
                    paginate(20);
            } else {
            $infosys = InformationSystemCollection::
                join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                select('information_system_collections.*')->
                where('information_system_collections.app_software_type', 'informsystem')->
                where('information_system_collections.bpStatus', '<>', 'archive')->
                where('information_system_collections.wholeClass', 'LOW_PRIORITY_APPLICATION_SOFTWARE')->
                where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                paginate(20);
            }
            return View::make('infosys.isthird', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        } 

        // Поиск по ИС МИО
        if ( $request->search_type == "ismio" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'informsystem')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', 'central_mio')->
                    paginate(20);
            } else {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'informsystem')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', 'central_mio')->
                    where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                    orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                    orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                    paginate(20);
            }
            return View::make('infosys.ismio', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        } 


        // Поиск по Интернет-ресурсам МИО
        if ( $request->search_type == "irmio" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'internet_resource')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', 'central_mio')->
                    paginate(20);
            } else {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'internet_resource')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', 'central_mio')->
                    where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                    orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                    orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                    paginate(20);
            }
            return View::make('infosys.irmio', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        } 

        // Поиск по ИК-услуги МИО
        if ( $request->search_type == "ikmio" ) {

            $search_text = strip_tags($request->q);
            if ($search_text == "") {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'IC_service')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', 'central_mio')->
                    paginate(20);
            } else {
                $infosys = InformationSystemCollection::
                    join('gosorgan_collections', 'information_system_collections.ownerId', '=', 'gosorgan_collections._id')->
                    select('information_system_collections.*')->
                    where('information_system_collections.app_software_type', 'IC_service')->
                    where('information_system_collections.bpStatus', '<>', 'archive')->
                    where('gosorgan_collections.type', 'central_mio')->
                    where('information_system_collections.name', 'LIKE', '%'.$search_text.'%')->
                    orWhere('information_system_collections.AppShortName', 'LIKE', '%'.$search_text.'%')->
                    orWhere('gosorgan_collections.name', 'LIKE', '%'.$search_text.'%')->
                    paginate(20);
            }
            return View::make('infosys.ikmio', [
                'infosys' => $infosys,
                'search_text' => $search_text
            ]);

        } 


    }



}
