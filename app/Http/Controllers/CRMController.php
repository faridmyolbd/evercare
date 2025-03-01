<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Division;

class CRMController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('name')->get();
        $divisions = Division::orderBy('name')->get();
        return view('crm.index', compact('departments', 'divisions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'uhid' => 'required',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Male,Female',
            'phone_number' => 'required|string|min:8|max:15|',
            'alternate_phone' => 'required|string|min:8|max:15',
            'division' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'thana' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'department_id' => 'required',
            'agent' => 'required|string|max:255',
        ]);

        // ✅ Insert data correctly
        Appointment::create([
            'uhid' => $request->uhid,
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'alternate_phone' => $request->alternate_phone,
            'division' => $request->division,
            'district' => $request->district,
            'thana' => $request->thana,
            'area' => $request->area,
            'department_id' => $request->department_id,
            'agent' => $request->agent,
        ]);

        return redirect()->route('crm.index')->with('success', 'Appointment added successfully.');
    }
}
