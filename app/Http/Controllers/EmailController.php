<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EmergencyEmail;
use App\Models\EmergencyEmailInfo;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = EmergencyEmail::paginate(10);

        return view('admin.email.email-home',compact('emails'))
            ->with('i', (request()->input('page', 1) - 1) * 10);;
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
        // Get section_handle and add date_created
        $requestData = $request->all(); 
        $requestData['date_created'] = now();

        // Create an EmergencyEmail record
        $email = EmergencyEmail::create($requestData);

        // Validate email data
        $emailInfoValidates = $request->validate([
            'email.*' => 'required|email',
        ]);

        // Loop through the validated email data and create EmergencyEmailInfo records
        foreach ($emailInfoValidates['email'] as $key => $emailAddress) {
            EmergencyEmailInfo::create([
                'emergency_email_id' => $email->id,
                'email' => $emailAddress,
            ]);
        }

        return redirect()->route('admin.emailIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
