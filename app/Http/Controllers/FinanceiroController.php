<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowFinanceiroRequest;
use App\Models\Financeiro;
use App\Http\Requests\StoreFinanceiroRequest;
use App\Http\Requests\UpdateFinanceiroRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceiroController extends Controller
{
    protected int $paginateLimit = 15;
    private $onjectCcarbon;

    private $firstDayofPreviousMonth;
    private $lastDayofPreviousMonth ;

    public function __construct()
    {
        $this->onjectCarbon = Carbon::now();
        $this->firstDayofPreviousMonth = Carbon::now()->startOfMonth()->toDateString();
        $this->lastDayofPreviousMonth = Carbon::now()->endOfMonth()->toDateString();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Financeiro $financeiro)
    {
        $dataInicio = (!empty($request->get('data_inicio'))) ? $request->get('data_inicio') : $this->firstDayofPreviousMonth;
        $dataFim = (!empty($request->get('data_fim'))) ? $request->get('data_fim') : $this->lastDayofPreviousMonth;
        $financeiro = $financeiro->active()
            ->currentMonth(
                $dataInicio,
                $dataFim
            );
        $request->request->add(['data_inicio' => $dataInicio]);
        $request->request->add(['data_fim' => $dataFim]);
        $filter = [
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'active' => true,
        ];
//        dd($financeiro->get()->toArray());
        return view('pages.financeiro', ['financeiro' => $financeiro->paginate($this->paginateLimit), 'filter' => $filter]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinanceiroRequest $request)
    {
        $data = $request->except('_token');
        $data['status'] = $data['status'] == 'on' ? 1 : null;
        $data['recorrencia'] = $data['recorrencia'] == 'on' ? 1 : null;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['id_usuario'] = Auth::user()->id;
        $data['id_category'] = 2;

        $calendar = new Financeiro($data);
        $calendar->save();

        return redirect()->route('financeiro.index')->with('success', 'Financeiro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     * ShowFinanceiroRequest $request
     */
    public function show($id)
    {
        $financeiro = Financeiro::find($id);
        return response()->json($financeiro);
//        return view('pages.financeiro', ['financeiro' => $financeiro->paginate($this->paginateLimit)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Financeiro $financeiro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinanceiroRequest $request, Financeiro $financeiro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Financeiro $financeiro)
    {
        //
    }
}
