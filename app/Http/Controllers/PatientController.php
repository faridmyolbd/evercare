<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PatientsExport;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query();

        // ✅ Filter by Name or Phone
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        // ✅ Filter by UHID
        if ($request->has('uhid') && !empty($request->uhid)) {
            $query->where('uhid', $request->uhid);
        }

        // ✅ Filter by Created Date
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('created_at', $request->date);
        }

        $patients = $query->latest()->paginate(10);
        return view('patients.index', compact('patients'));
    }


    public function exportExcel()
    {
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }

    public function create()
    {
        return view('crm.create');
    }

    public function store(Request $request)
    {
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

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
