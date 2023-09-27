<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Live Search on Table
     */
    public function search(Request $request)
    {
        $output = "";
        $users = User::where('name', 'LIKE', '%'.$request->search.'%')->get();

        foreach($users as $user)
        {
            
        }

        return response($output);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNotIn('role_id', [5, 6, 7, 8])
            ->orderBy('name', 'asc')
            ->paginate(10);
        $records = Record::all();

        //if(auth()->user()->role->role == 'Student')
        //{
        //    $record = Record::where('user_id', '=', auth()->user()->id)->first();
        //    return view('student.record.index', compact('record'));
        //}
        //elseif(auth()->user()->role->role == 'Faculty')
        //{
        //    $record = Record::where('user_id', '=', auth()->user()->id)->first();
        //    return view('faculty.record.index', compact('record'));
        //}
        //elseif(auth()->user()->role->role == 'Staff')
        //{
        //    $record = Record::where('user_id', '=', auth()->user()->id)->first();
        //    return view('faculty.record.index', compact('record'));
        //}
        if(auth()->user()->role->role == 'Nurse')
        {
            return view('nurse.record.record-home',compact('users', 'records',))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        }
        //elseif(auth()->user()->role->role == 'Doctor')
        //{

        //}
        //elseif(auth()->user()->role->role == 'Dentist')
        //{

        //}
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
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
    }
}
