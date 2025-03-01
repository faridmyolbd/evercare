<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrmRequest;
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
    public function store(CrmRequest $request)
    {
        // ✅ Insert data correctly
        Appointment::updateOrCreate(['phone_number'=>$request->phone_number],[
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

        return back()->with('success', 'Appointment added successfully.');
    }
}
