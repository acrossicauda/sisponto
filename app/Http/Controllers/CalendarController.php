<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    private function validateEvent($calendar)
    {
        $eventData = [];
        foreach ($calendar as $k => $event) {
            $inicio_data = $event['inicio_data'];
            $inicio_hora = $event['inicio_hora'];
            $termino_data = $event['termino_data'] ?? $event['inicio_data'];
            $termino_hora = $event['termino_hora'];

            $start = $inicio_data . ' ' . $inicio_hora;
            $end = $termino_data . ' ' . $termino_hora;

            $eventData[$k] = [
                'id' => $event['id'],
                'title' => $event['titulo'],
                'description' => $event['descricao'],
                'start' => $start,
                'end' => $end,
                'color' => $event['cor'],
                'id_usuario' => $event['id_usuario'],
                'status' => $event['status'],
            ];
        }


        return $eventData;

    }

    public function getCalendar(Request $request = null)
    {
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();  // Primeiro dia do mês atual
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();      // Último dia do mês atual

        $category = 1;

        $calendar = Calendar::where('id_usuario', Auth::id())
            ->where('status', 1)
            ->where('id_category', $category)
            ->whereBetween('inicio_data', [$startOfMonth, $endOfMonth])  // Filtra entre o primeiro e o último dia do mês
            ->get()->toArray();
        $calendar = $this->validateEvent($calendar);
        return $calendar;
    }

    public function getCalendarFilter(Request $request)
    {
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();  // Primeiro dia do mês atual
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();      // Último dia do mês atual

        // Pega o intervalo de datas enviado pelo AJAX
        $start = $request->input('start') ?? $startOfMonth;
        $end = $request->input('end') ?? $endOfMonth;
        $category = 1;

        // Converte para instâncias do Carbon
        $startDate = \Carbon\Carbon::parse($start);
        $endDate = \Carbon\Carbon::parse($end);

        // Busca eventos dentro do intervalo de datas
        //$events = Calendar::whereBetween('inicio_data', [$startDate, $endDate])
        $calendar = Calendar::where('id_usuario', Auth::id())
            ->where('status', 1)
            ->where('id_category', $category)
            ->whereBetween('inicio_data',  [$startDate, $endDate])  // Filtra entre o primeiro e o último dia do mês
            ->get();

        $calendar = $this->validateEvent($calendar);

        // Retorna os eventos no formato JSON
        return response()->json($calendar);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendar = $this->getCalendar();
        //dd(json_encode($calendar));
        return view('pages.calendario', compact('calendar'));
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
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['id_usuario'] = Auth::user()->id;

        //dd($data);
        $calendar = new Calendar($data);
        $calendar->save();

        return redirect()->route('calendar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        return view('pages.calendario', compact('calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function relatorios(Request $request = null)
    {
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();  // Primeiro dia do mês atual
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();      // Último dia do mês atual

        $category = 1;

        $calendar = Calendar::where('id_usuario', Auth::id())
            ->where('status', 1)
            ->where('id_category', $category)
            ->whereBetween('inicio_data', [$startOfMonth, $endOfMonth])  // Filtra entre o primeiro e o último dia do mês
            ->paginate();
        //dd($calendar[0]->category()->get()->toArray());
        return view('pages.relatorios', compact('calendar'));
    }
}
