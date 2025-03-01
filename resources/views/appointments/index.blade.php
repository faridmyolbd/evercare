@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center text-primary">Appointments List</h2>

    <!-- ✅ Search & Filters -->
    <form method="GET" action="{{ route('appointments.index') }}" class="row mb-3">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Search by Name or Phone" value="{{ request()->search }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="uhid" class="form-control" placeholder="Search by UHID" value="{{ request()->uhid }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="date" class="form-control" value="{{ request()->date }}">
        </div>
        <div class="col-md-3 d-flex align-items-center">
            <button type="submit" class="btn text-white" style="background-color: #008037;">Search</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary ms-2">Reset</a>
            <a href="{{ route('appointments.exportExcel') }}" class="btn text-white ms-2" style="background-color: #008037;">Excel</a>
        </div>
    </form>

    <!-- ✅ Responsive DataTable -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead style="background-color: #003366; color: white;">
                <tr>
                    <th>SL No.</th>
                    <th>UHID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Alternate Phone</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Thana</th>
                    <th>Area</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Agent</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $index => $appointment)
                <tr>
                    <td>{{ ($appointments->currentPage() - 1) * $appointments->perPage() + $index + 1 }}</td>
                    <td>{{ $appointment->uhid }}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->age }}</td>
                    <td>{{ $appointment->gender }}</td>
                    <td>{{ $appointment->alternate_phone }}</td>
                    <td>{{ $appointment->division }}</td>
                    <td>{{ $appointment->district }}</td>
                    <td>{{ $appointment->thana }}</td>
                    <td>{{ $appointment->area }}</td>
                    <td>{{ $appointment->phone_number }}</td>
                    <td>{{ $appointment->department->name ?? 'N/A' }}</td>
                    <td>{{ $appointment->agent }}</td>
                    <td>{{ $appointment->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn text-white btn-sm" style="background-color: #cc0000;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ✅ Pagination -->
    <div class="mt-3">
        {{ $appointments->links() }}
    </div>
</div>
@endsection
