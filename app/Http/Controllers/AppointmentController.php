<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppointmentsExport;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::query();

        // ✅ Filter by Name or Phone
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone_number', 'like', '%' . $request->search . '%');
            });
        }

        // ✅ Filter by UHID
        if ($request->filled('uhid')) {
            $query->where('uhid', $request->uhid);
        }

        // ✅ Filter by Created Date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $appointments = $query->latest()->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    public function exportExcel()
    {
        return Excel::download(new AppointmentsExport, 'appointments.xlsx');
    }
    public function store(Request $request)
    {
        $request->validate([
            'uhid' => 'required|unique:appointments',
            'name' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'alternate_phone' => 'required',
            'phone_number' => 'required|unique:appointments',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'area' => 'required',
            'department' => 'required',
            'agent' => 'required'

        ]);

        Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Appointment added successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
