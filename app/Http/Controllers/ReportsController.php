<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

use App\Models\Government;
use App\Models\InformationSystem;
use App\Models\InformationSystemCollection;

use DateTime;

class ReportsController extends Controller
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
        $ios = InformationSystem::paginate(10);
        $iss = InformationSystem::
            where('user_id', Auth::user()->id)->
            where('goverment_id', Auth::user()->government_id)->
            orderBy('id', 'desc')->
            get();
        return View::make('reports.index', [
            'govs' => $govs,
            'ios' => $ios,
            'iss' => $iss,
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


    // public function search(Request $request)
    // {
    //     $govs = Government::all();
    //     $search_text = strip_tags($request->q);

    //     if ( $request->has('export_report') ) {

    //         return response()->streamDownload(function () {
    //             $iss = InformationSystem::get();
    //             header('Content-Type: text/x-csv; charset=utf-8');
    //             header("Content-Disposition: attachment;filename=".date("d-m-Y")."-export.xls");
    //             header("Content-Transfer-Encoding: binary");

    //             $csv_output ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    //             <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    //             <head>
    //             <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    //             </head>
    //             <body>';

    //             // Теперь данные в виде таблицы:
    //             $csv_output .='<table border="1">
    //                 <tr style="font-size: 14px; font-weight: bold;">
    //                     <td>Наименование</td>
    //                     <td>Государственный орган</td>
    //                     <td>Аббревиатура</td>
    //                     <td>Статус</td>
    //                     <td>ЦГО/МИО</td>
    //                 </tr>';

    //             foreach ($iss as $is) {
    //                 $gov_name = Government::where('id', $is->goverment_id)->first();

    //                 $csv_output .= "<tr style='font-size: 14px;'>
    //                     <td>$is->name_ru</td>
    //                     <td>$gov_name->name_ru</td>
    //                     <td>$is->abbreviation</td>
    //                     <td>Действующий</td>
    //                     <td>$is->cgo_mio</td>
    //                 </td>";
    //             }

    //             // закрываем тело страницы
    //             $csv_output .='</table></body></html>';
    //             // И наконец выгрузка в EXCEL - что в скрипте как обычный вывод
    //             echo $csv_output;
            
    //         }, 'test.csv');






    //     } elseif ( $request->has('show_report') ) {
    //         $ios = InformationSystem::where('goverment_id', $request->report_go)->paginate(10)->withPath('?show_report=');
    //     } else {
    //         $ios = InformationSystem::where('name_ru', 'LIKE', '%'.$search_text.'%')->orWhere('abbreviation', 'LIKE', '%'.$search_text.'%')->orWhere('cgo_mio', 'LIKE', '%'.$search_text.'%')->paginate(10);
    //     }

    //     return View::make('reports.index', [
    //         'govs' => $govs,
    //         'ios' => $ios,
    //         'search_text' => $search_text
    //     ]);
    // }


    public function search(Request $request)
{
    $govs = Government::all();
    $search_text = strip_tags($request->q);

    if ($request->has('export_report')) {
        // Добавляем фильтрацию по выбранному государственному органу
        $selectedGovId = $request->input('report_go');
        $iss = InformationSystem::when($selectedGovId, function ($query) use ($selectedGovId) {
            return $query->where('goverment_id', $selectedGovId);
        })->get();

        return response()->streamDownload(function () use ($iss) {
            header('Content-Type: text/x-csv; charset=utf-8');
            header("Content-Disposition: attachment;filename=" . date("d-m-Y") . "-export.xls");
            header("Content-Transfer-Encoding: binary");

            $csv_output = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
            <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            </head>
            <body>';

            // Теперь данные в виде таблицы:
            $csv_output .= '<table border="1">
                <tr style="font-size: 14px; font-weight: bold;">
                    <td>Наименование</td>
                    <td>Государственный орган</td>
                    <td>Аббревиатура</td>
                    <td>Статус</td>
                    <td>ЦГО/МИО</td>
                </tr>';

            foreach ($iss as $is) {
                $gov_name = Government::where('id', $is->goverment_id)->first();

                $csv_output .= "<tr style='font-size: 14px;'>
                    <td>$is->name_ru</td>
                    <td>$gov_name->name_ru</td>
                    <td>$is->abbreviation</td>
                    <td>Действующий</td>
                    <td>$is->cgo_mio</td>
                </td>";
            }

            // закрываем тело страницы
            $csv_output .= '</table></body></html>';
            // И наконец выгрузка в EXCEL - что в скрипте как обычный вывод
            echo $csv_output;
        }, 'test.csv');
    } elseif ($request->has('show_report')) {
        $ios = InformationSystem::where('goverment_id', $request->report_go)->paginate(10)->withPath('?show_report=');
    } else {
        $ios = InformationSystem::where('name_ru', 'LIKE', '%' . $search_text . '%')
            ->orWhere('abbreviation', 'LIKE', '%' . $search_text . '%')
            ->orWhere('cgo_mio', 'LIKE', '%' . $search_text . '%')->paginate(10);
    }

    return View::make('reports.index', [
        'govs' => $govs,
        'ios' => $ios,
        'search_text' => $search_text
    ]);
}


}
