<?php

namespace App\Http\Controllers;

use App\Models\DailyVisit;
use Illuminate\Http\Request;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('nurse.homepage');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyVisit $daily_visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyVisit $daily_visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyVisit $daily_visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyVisit $daily_visit)
    {
        //
    }
}
