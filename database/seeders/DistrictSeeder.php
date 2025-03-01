<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $districts = [
            // Barishal Division
            ['name' => 'Barguna', 'division' => 'Barishal'],
            ['name' => 'Barishal', 'division' => 'Barishal'],
            ['name' => 'Bhola', 'division' => 'Barishal'],
            ['name' => 'Jhalokati', 'division' => 'Barishal'],
            ['name' => 'Patuakhali', 'division' => 'Barishal'],
            ['name' => 'Pirojpur', 'division' => 'Barishal'],

            // Chattogram Division
            ['name' => 'Bandarban', 'division' => 'Chattogram'],
            ['name' => 'Brahmanbaria', 'division' => 'Chattogram'],
            ['name' => 'Chandpur', 'division' => 'Chattogram'],
            ['name' => 'Chattogram', 'division' => 'Chattogram'],
            ['name' => 'Cumilla', 'division' => 'Chattogram'],
            ['name' => 'Cox\'s Bazar', 'division' => 'Chattogram'],
            ['name' => 'Feni', 'division' => 'Chattogram'],
            ['name' => 'Khagrachari', 'division' => 'Chattogram'],
            ['name' => 'Lakshmipur', 'division' => 'Chattogram'],
            ['name' => 'Noakhali', 'division' => 'Chattogram'],
            ['name' => 'Rangamati', 'division' => 'Chattogram'],

            // Dhaka Division
            ['name' => 'Dhaka', 'division' => 'Dhaka'],
            ['name' => 'Faridpur', 'division' => 'Dhaka'],
            ['name' => 'Gazipur', 'division' => 'Dhaka'],
            ['name' => 'Gopalganj', 'division' => 'Dhaka'],
            ['name' => 'Kishoreganj', 'division' => 'Dhaka'],
            ['name' => 'Madaripur', 'division' => 'Dhaka'],
            ['name' => 'Manikganj', 'division' => 'Dhaka'],
            ['name' => 'Munshiganj', 'division' => 'Dhaka'],
            ['name' => 'Narayanganj', 'division' => 'Dhaka'],
            ['name' => 'Narsingdi', 'division' => 'Dhaka'],
            ['name' => 'Rajbari', 'division' => 'Dhaka'],
            ['name' => 'Shariatpur', 'division' => 'Dhaka'],
            ['name' => 'Tangail', 'division' => 'Dhaka'],

            // Khulna Division
            ['name' => 'Bagerhat', 'division' => 'Khulna'],
            ['name' => 'Chuadanga', 'division' => 'Khulna'],
            ['name' => 'Jessore', 'division' => 'Khulna'],
            ['name' => 'Jhenaidah', 'division' => 'Khulna'],
            ['name' => 'Khulna', 'division' => 'Khulna'],
            ['name' => 'Kushtia', 'division' => 'Khulna'],
            ['name' => 'Magura', 'division' => 'Khulna'],
            ['name' => 'Meherpur', 'division' => 'Khulna'],
            ['name' => 'Narail', 'division' => 'Khulna'],
            ['name' => 'Satkhira', 'division' => 'Khulna'],

            //Mymensingh Division
            ['name' => 'Mymensingh', 'division' => 'Mymensingh'],
            ['name' => 'Jamalpur', 'division' => 'Mymensingh'],
            ['name' => 'Netrokona', 'division' => 'Mymensingh'],
            ['name' => 'Sherpur', 'division' => 'Mymensingh'],

            // Rajshahi Division
            ['name' => 'Bogura', 'division' => 'Rajshahi'],
            ['name' => 'Joypurhat', 'division' => 'Rajshahi'],
            ['name' => 'Naogaon', 'division' => 'Rajshahi'],
            ['name' => 'Natore', 'division' => 'Rajshahi'],
            ['name' => 'Chapainawabganj', 'division' => 'Rajshahi'],
            ['name' => 'Pabna', 'division' => 'Rajshahi'],
            ['name' => 'Rajshahi', 'division' => 'Rajshahi'],
            ['name' => 'Sirajganj', 'division' => 'Rajshahi'],

            // Rangpur Division
            ['name' => 'Rangpur', 'division' => 'Rangpur'],
            ['name' => 'Dinajpur', 'division' => 'Rangpur'],
            ['name' => 'Gaibandha', 'division' => 'Rangpur'],
            ['name' => 'Kurigram', 'division' => 'Rangpur'],
            ['name' => 'Lalmonirhat', 'division' => 'Rangpur'],
            ['name' => 'Nilphamari', 'division' => 'Rangpur'],
            ['name' => 'Panchagarh', 'division' => 'Rangpur'],
            ['name' => 'Thakurgaon', 'division' => 'Rangpur'],

            // Sylhet Division
            ['name' => 'Habiganj', 'division' => 'Sylhet'],
            ['name' => 'Moulvibazar', 'division' => 'Sylhet'],
            ['name' => 'Sunamganj', 'division' => 'Sylhet'],
            ['name' => 'Sylhet', 'division' => 'Sylhet'],
        ];

        foreach ($districts as $district) {
            $division = Division::where('name', $district['division'])->first();
            District::create([
                'name' => $district['name'],
                'division_id' => $division->id
            ]);
        }
    }
}
