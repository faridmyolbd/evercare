<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uhid', 'name', 'age', 'gender', 'phone_number', 'alternate_phone',
        'division', 'district', 'thana', 'area', 'department_id', 'agent'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

