@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Logo Centered -->
        <div class="text-center mb-4">
            <img src="{{ asset('storage/apollo.png') }}" alt="Evercare Hospital Dhaka" class="img-fluid"
                style="max-width: 200px;">
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <!-- Display all errors at top (optional) -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm mt-3 mb-5">
            <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #003366;">
                <h5 class="card-title mb-0">Appointment Information</h5>
                <div>
                    <span class="fw-semibold text-white me-2">Agent:</span>
                    <input type="text" class="border-0 bg-transparent text-white fw-bold"
                        value="{{ request()->get('agent') ?? '' }}" readonly>
                    <span class="fw-semibold text-white ms-3 me-2">Phone:</span>
                    <input type="text" class="border-0 bg-transparent text-white fw-bold"
                        value="{{ request()->get('phone_number') ?? '' }}" readonly>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('crm.store') }}" method="post">
                    @csrf

                    <!-- First Row: UHID, Name, Age -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="uhid" class="form-label fw-semibold">Appointment UHID</label>
                            <input type="text" name="uhid" id="uhid" placeholder="UHID"
                                   class="form-control form-control-sm @error('uhid') is-invalid @enderror"
                                   value="{{ old('uhid') }}" required>
                            @error('uhid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="text" name="phone_number" class="form-control form-control-sm"
                               value="{{ request()->get('phone_number') }}" hidden>
                        <input type="text" name="agent" class="form-control form-control-sm"
                               value="{{ request()->get('agent') }}" hidden>
                        <div class="col-md-4">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" id="name" placeholder="Appointment Name"
                                   class="form-control form-control-sm @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="age" class="form-label fw-semibold">Age</label>
                            <input type="text" name="age" id="age" placeholder="Appointment Age"
                                   class="form-control form-control-sm @error('age') is-invalid @enderror"
                                   value="{{ old('age') }}" required>
                            @error('age')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Second Row: Gender, Alternate Phone, Location -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="gender" class="form-label fw-semibold">Gender</label>
                            <select name="gender" id="gender"
                                    class="form-select form-control-sm @error('gender') is-invalid @enderror" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="alternate_phone" class="form-label fw-semibold">Alternate Phone</label>
                            <input type="text" name="alternate_phone" id="alternate_phone"
                                   placeholder="Alternate Phone"
                                   class="form-control form-control-sm @error('alternate_phone') is-invalid @enderror"
                                   value="{{ old('alternate_phone') }}" required>
                            @error('alternate_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="division" class="form-label fw-semibold">Division</label>
                            <input type="text" name="division" id="division" placeholder="Division"
                                   class="form-control form-control-sm @error('division') is-invalid @enderror"
                                   value="{{ old('division') }}" required>
                            @error('division')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Third Row: District, Thana, Area -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="district" class="form-label fw-semibold">District</label>
                            <input type="text" name="district" id="district" placeholder="District"
                                   class="form-control form-control-sm @error('district') is-invalid @enderror"
                                   value="{{ old('district') }}" required>
                            @error('district')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="thana" class="form-label fw-semibold">Thana</label>
                            <input type="text" name="thana" id="thana" placeholder="Thana"
                                   class="form-control form-control-sm @error('thana') is-invalid @enderror"
                                   value="{{ old('thana') }}" required>
                            @error('thana')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="area" class="form-label fw-semibold">Area</label>
                            <input type="text" name="area" id="area" placeholder="Area"
                                   class="form-control form-control-sm @error('area') is-invalid @enderror"
                                   value="{{ old('area') }}" required>
                            @error('area')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Fourth Row: Department -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label for="department_id" class="form-label fw-semibold">Department</label>
                            <select name="department_id" id="department_id"
                                    class="form-select form-control-sm select2 @error('department_id') is-invalid @enderror" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn text-white btn-sm px-4" style="background-color: #004a99;">
                            <i class="fas fa-save"></i> Save Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#department_id').select2({
                placeholder: "Select Department",
                allowClear: true
            });
        });
    </script>
    @endsection
@endsection
