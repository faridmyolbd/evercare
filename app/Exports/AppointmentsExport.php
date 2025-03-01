<?php
namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppointmentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Appointment::select('uhid', 'name', 'age', 'gender', 'division', 'district', 'thana', 'area', 'phone_number', 'department_id', 'agent')->get();
    }

    public function headings(): array
    {
        return ['UHID', 'Name', 'Age', 'Gender', 'Division', 'District', 'Thana', 'Area', 'Phone', 'Department', 'Agent'];
    }
}
