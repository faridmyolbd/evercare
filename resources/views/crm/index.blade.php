@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Logo Centered -->
    <div class="text-center">
        <img src="{{ asset('storage/apollo.png') }}" alt="Evercare Hospital Dhaka" class="img-fluid mb-3" style="max-width: 200px;">
    </div>

    <h2 class="text-center text-primary">CRM - Manage Patients</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="card shadow mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Patient Information</h5>
        </div>
        <div class="card-body">
            <!-- ✅ Submit form data to /crm/store -->
            <form action="{{ route('crm.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="uhid" class="form-label fw-semibold">Patient UHID</label>
                        <input type="text" name="uhid" id="uhid" placeholder="UHID" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" id="name" placeholder="Patient Name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="age" class="form-label fw-semibold">Age</label>
                        <input type="text" name="age" id="age" placeholder="Patient Age" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="gender" class="form-label fw-semibold">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label fw-semibold">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="district" class="form-label fw-semibold">District</label>
                        <input type="text" name="district" id="district" placeholder="District" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="area" class="form-label fw-semibold">Area</label>
                        <input type="text" name="area" id="area" placeholder="Area" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="department" class="form-label fw-semibold">Department</label>
                        <input type="text" name="department" id="department" placeholder="Department" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-50">Save Patient</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
