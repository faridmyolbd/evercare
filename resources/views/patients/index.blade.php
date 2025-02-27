@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center text-primary">Patients List</h2>

    <!-- ✅ Search & Filters -->
    <form method="GET" action="{{ route('patients.index') }}" class="row mb-3">
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
            <button type="submit" class="btn btn-success me-2">Search</button>
            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('crm.index') }}" class="btn btn-primary">Add New Patient</a>
        <a href="{{ route('patients.exportExcel') }}" class="btn btn-success">Export to Excel</a>
    </div>

    <!-- ✅ Responsive DataTable -->
    <div class="table-responsive">
        <table id="patientsTable" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>SL No.</th>
                    <th>UHID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Area</th>
                    <th>Created Date</th> <!-- ✅ Added Created Date Column -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $index => $patient)
                <tr>
                    <td>{{ ($patients->currentPage() - 1) * $patients->perPage() + $index + 1 }}</td>
                    <td>{{ $patient->uhid }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->department }}</td>
                    <td>{{ $patient->area }}</td>
                    <td>{{ $patient->created_at->format('d M Y') }}</td> <!-- ✅ Format Date -->
                    <td>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ✅ Laravel Pagination -->
    <div class="mt-3">
        {{ $patients->links() }}
    </div>

    <!-- ✅ Logout Button -->
    {{-- <div class="text-center mt-4">
        <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </div> --}}

</div>

<!-- ✅ Include DataTables Scripts -->
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#patientsTable').DataTable({
            "paging": false,  // Laravel pagination handles it
            "info": false,
            "ordering": true,
            "responsive": true,
            "columnDefs": [
                { "orderable": false, "targets": 9 } // Disable sorting for actions column
            ]
        });
    });
</script>
@endsection

@endsection
