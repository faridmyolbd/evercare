<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    public function run()
    {
        $divisions = [
            'Barishal', 'Chattogram', 'Dhaka', 'Khulna', 'Mymensingh', 'Rajshahi', 'Rangpur', 'Sylhet'
        ];

        foreach ($divisions as $division) {
            Division::create(['name' => $division]);
        }
    }
}
