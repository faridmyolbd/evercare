<?php
namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Patient::select('uhid', 'name', 'age', 'gender', 'phone', 'department', 'area')->get();
    }

    public function headings(): array
    {
        return ['UHID', 'Name', 'Age', 'Gender', 'Phone', 'Department', 'Area'];
    }
}
