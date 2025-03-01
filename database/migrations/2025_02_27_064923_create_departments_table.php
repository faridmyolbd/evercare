<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // ✅ Insert default departments here
        $departments = [
            "Admission Desk", "Anesthesia", "Pain Clinic", "Blood Bank", "Bariatric",
            "CTVS", "CT Scan", "Cardiology", "Child Development", "Counseling",
            "Corporate Desk", "Compliance Issue", "Day Care", "Dental", "Dermatology",
            "Diabetology", "Dietician", "Dialysis", "Emergency", "Endoscopy / Clonoscopy",
            "ECG / ECHO / TMT", "EEG / EMG / NCV / NCS", "ENT", "Fertility", "Gastroenterology",
            "General Surgery", "Hematology", "HIP", "IPD", "IP Billing", "Information Desk",
            "Investigation Billing", "Internal Medicine", "Joint Care and Wellness", "KIDU",
            "Lab", "MRD", "MRI", "MHC", "Nephrology", "Neurology", "Neuro Surgery",
            "Nuclear Medicine", "OBS & Gyne", "Oncology", "Ophthalmology", "OT",
            "Orthopaedics", "Pediatrics", "Pediatric Cardiology", "Pediatric Surgery",
            "Pharmacy", "Physical Medicine", "Physiotherapy", "Plastic Surgery",
            "Psychiatry", "Respiratory Medicine", "Radiation Oncology", "Report Delivery",
            "Sample Collection", "Urology", "Ultrasound", "Vaccination", "Others"
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insertOrIgnore(['name' => $department]); // ✅ Avoid duplicates
        }
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
