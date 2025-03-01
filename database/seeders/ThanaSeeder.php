<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\Thana;

class ThanaSeeder extends Seeder
{
    public function run()
    {
        $thanas = [
            ['name' => 'Amtali', 'district' => 'Barguna'],
            ['name' => 'Bamna', 'district' => 'Barguna'],
            ['name' => 'Barguna Sadar', 'district' => 'Barguna'],
            ['name' => 'Betagi', 'district' => 'Barguna'],
            ['name' => 'Patharghata', 'district' => 'Barguna'],
            ['name' => 'Taltali', 'district' => 'Barguna'],

            ['name' => 'Muladi', 'district' => 'Barishal'],
            ['name' => 'Babuganj', 'district' => 'Barishal'],
            ['name' => 'Agailjhara', 'district' => 'Barishal'],
            ['name' => 'Barisal Sadar', 'district' => 'Barishal'],
            ['name' => 'Bakerganj', 'district' => 'Barishal'],
            ['name' => 'Banaripara', 'district' => 'Barishal'],
            ['name' => 'Gaurnadi', 'district' => 'Barishal'],
            ['name' => 'Hizla', 'district' => 'Barishal'],
            ['name' => 'Mehendiganj', 'district' => 'Barishal'],
            ['name' => 'Wazirpur', 'district' => 'Barishal'],

            ['name' => 'Bhola Sadar', 'district' => 'Bhola'],
            ['name' => 'Burhanuddin', 'district' => 'Bhola'],
            ['name' => 'Char Fasson', 'district' => 'Bhola'],
            ['name' => 'Daulatkhan', 'district' => 'Bhola'],
            ['name' => 'Lalmohan', 'district' => 'Bhola'],
            ['name' => 'Manpura', 'district' => 'Bhola'],
            ['name' => 'Tazumuddin', 'district' => 'Bhola']
        ];

        foreach ($thanas as $thana) {
            $district = District::where('name', $thana['district'])->first();
            Thana::create([
                'name' => $thana['name'],
                'district_id' => $district->id
            ]);
        }
    }
}
