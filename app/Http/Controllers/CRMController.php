<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class CRMController extends Controller
{
    // ✅ REMOVE auth middleware so it's PUBLICLY ACCESSIBLE
    public function index()
    {
        return view('crm.index'); // No need to pass patients list here
    }

    // ✅ Handle form submission and save data
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'uhid' => 'required|unique:patients',
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'phone' => 'required|unique:patients',
            'department' => 'required',
            'district' => 'required',
            'area' => 'required'
        ]);

        // Save to database
        Patient::create($request->all());

        // ✅ Redirect to the CRM form with success message
        return redirect()->route('crm.index')->with('success', 'Patient added successfully.');
    }
}
