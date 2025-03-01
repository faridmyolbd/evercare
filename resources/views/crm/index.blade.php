@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/apollo.png') }}" alt="Evercare Hospital Dhaka" class="img-fluid"
                style="max-width: 200px;">
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

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

                    <!-- Hidden Inputs for Phone Number & Agent -->
                    <input type="hidden" name="phone_number" value="{{ request()->get('phone_number') }}">
                    <input type="hidden" name="agent" value="{{ request()->get('agent') }}">

                    <!-- First Row -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Appointment UHID</label>
                            <input type="text" name="uhid" class="form-control form-control-sm" value="{{ old('uhid') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Age</label>
                            <input type="text" name="age" class="form-control form-control-sm" value="{{ old('age') }}" required>
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Gender</label>
                            <select name="gender" class="form-select form-control-sm" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Alternate Phone</label>
                            <input type="text" name="alternate_phone" class="form-control form-control-sm" value="{{ old('alternate_phone') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Department</label>
                            <select name="department_id" id="department_id" class="form-select form-control-sm select2" required>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Third Row -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Division</label>
                            <select name="division_id" id="division_id" class="form-select form-control-sm" required>
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="division" id="hidden_division">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">District</label>
                            <select name="district_id" id="district_id" class="form-select form-control-sm" required>
                                <option value="">Select District</option>
                            </select>
                            <input type="hidden" name="district" id="hidden_district">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Thana</label>
                            <select name="thana_id" id="thana_id" class="form-select form-control-sm" required>
                                <option value="">Select Thana</option>
                            </select>
                            <input type="hidden" name="thana" id="hidden_thana">
                        </div>
                    </div>

                    <!-- Fourth Row -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Area</label>
                            <input type="text" name="area" class="form-control form-control-sm" value="{{ old('area') }}" required>
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

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();

        $('#division_id').change(function () {
            var divisionName = $("#division_id option:selected").text();
            $('#hidden_division').val(divisionName);
            $.ajax({
                url: "{{ route('get.districts') }}",
                type: "GET",
                data: { division_id: $(this).val() },
                success: function (data) {
                    $('#district_id').html('<option value="">Select District</option>');
                    $.each(data, function (key, district) {
                        $('#district_id').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                }
            });
        });

        $('#district_id').change(function () {
            var districtName = $("#district_id option:selected").text();
            $('#hidden_district').val(districtName);
            $.ajax({
                url: "{{ route('get.thanas') }}",
                type: "GET",
                data: { district_id: $(this).val() },
                success: function (data) {
                    $('#thana_id').html('<option value="">Select Thana</option>');
                    $.each(data, function (key, thana) {
                        $('#thana_id').append('<option value="' + thana.id + '">' + thana.name + '</option>');
                    });
                }
            });
        });

        $('#thana_id').change(function () {
            var thanaName = $("#thana_id option:selected").text();
            $('#hidden_thana').val(thanaName);
        });
    });
</script>
@endpush
