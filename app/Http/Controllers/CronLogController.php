<?php

namespace App\Http\Controllers;

use App\Models\CronLog;
use App\Http\Requests\StoreCronLogRequest;
use App\Http\Requests\UpdateCronLogRequest;

class CronLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCronLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CronLog $cronLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CronLog $cronLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCronLogRequest $request, CronLog $cronLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CronLog $cronLog)
    {
        //
    }
}
