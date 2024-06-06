<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

use App\Models\Government;
use App\Models\InformationSystem;
use App\Models\Contract;
use App\Models\Budget;
use DateTime;

class BudgetController extends Controller
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
    public function index(Request $request)
    {
        // $budgetProcesses = Budget::orderBy('year', 'desc')->paginate(20);
    
        // return view('budget.index', [
        //     'budgetProcesses' => $budgetProcesses
        // ]);

        $query = Budget::query();

        // Применяем фильтр по году, если выбрано значение
        if ($request->has('search-year') && $request->input('search-year') != '') {
            $query->where('year', $request->input('search-year'));
        }

        // Применяем фильтр по типу процесса, если выбрано значение
        if ($request->has('search-type') && $request->input('search-type') != '') {
            $query->where('type', $request->input('search-type'));
        }

        // Применяем поиск, если введен поисковый запрос
        if ($request->has('budget-search') && $request->input('budget-search') != '') {
            $query->where('name', 'like', '%' . $request->input('budget-search') . '%');
        }

        // Получаем отфильтрованные и отсортированные бюджетные процессы
        $budgetProcesses = $query->orderBy('year', 'desc')->paginate(20);

        return view('budget.index', compact('budgetProcesses'));
    }

    
 
    
    public function search(Request $request)
    {
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($_id)
    {
        $budgetProcess = Budget::find($_id);
        // $budgetall = Budget::all();
        return view('budget.show', compact('budgetProcess'));
        
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

}
