<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Thana;

class LocationController extends Controller
{
    // Get districts based on division
    public function getDistricts(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->get();
        return response()->json($districts);
    }

    // Get thanas based on district
    public function getThanas(Request $request)
    {
        $thanas = Thana::where('district_id', $request->district_id)->get();
        return response()->json($thanas);
    }
}
