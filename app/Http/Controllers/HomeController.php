<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

use Barryvdh\DomPDF\Facade as PDF;

use App\Models\Expertise;
use App\Models\InformationSystem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }




    /* ВРЕМЕННЫЕ КОНТРОЛЛЕРЫ */

    public function budget()
    {
        return view('budget.index');
    }

    public function accounting()
    {
        return view('accounting.index');
    }

    /* КОНЕЦ ВРЕМЕННЫХ КОНТРОЛЛЕРОВ */

    public function pdf(Request $reqest)
    {
        Log::debug($reqest->_id);

        $expertise = Expertise::where('id', $reqest->_id)->first();

        Log::debug($expertise->abbr);
/*
        $data = [
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
            'hosting' => $expertise->hosting
            
        ];
        $pdf = \PDF::loadView('examplepdf', $data);
        return $pdf->download('example.pdf');
        */
    }

    public function psp(Request $reqest)
    {
        $data = [
            'title' => 'Тестовая страница',
            'date' => date('d.m.Y')
        ];

        return View::make('examplepdf', [
            'title' => 'Тестовая страница',
            'date' => date('d.m.Y')
        ]);
    }


    public function qrcode(Request $reqest)
    {
        return View::make('exampleqr', [
        ]);
    }





}
