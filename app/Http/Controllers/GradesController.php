<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Models\Grade;
use App\Models\InformationSystem;

use DateTime;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::where('type', 'mio')->orderBy('total_2022', 'desc')->get();
        $gos = Grade::get();
        return View::make('grades.index', [
            'grades' => $grades,
            'search_year' => '2022',
            'search_type' => 'mio',
            'gos' => $gos
        ]);
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
        $filter_year = 'total_'.$request->search_year;
        $filger_go = $request->search_type;

        $gos = Grade::get();
        $grades = Grade::where('type', $filger_go)->orderBy($filter_year, 'desc')->get();
        return View::make('grades.index', [
            'grades' => $grades,
            'search_year' => $request->search_year,
            'search_type' => $request->search_type,
            'gos' => $gos
        ]);
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


    public function infosys(){
        $locale = app()->getLocale();
        if ($locale == "ru" ) {
            $names = 'name_ru';
        } else {
            $names = 'name_kz';
        }

        $array_data = array();
        $infosyses = InformationSystem::get();
        

        foreach ($infosyses as $infosys) {

            array_push ($array_data, [
                "id" => $infosys->id,
                "go" => $infosys->government->$names,
                "name" => $infosys->$names,
                "abbreviation" => $infosys->abbreviation,
                "status" => $infosys->status,
                "cgo_mio" => $infosys->cgo_mio
                ]
            );

        }

        $jsonData = json_encode($array_data, JSON_UNESCAPED_UNICODE);

        return $jsonData;

    }
}
