@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Patient List</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
    <a href="{{ route('patients.exportExcel') }}" class="btn btn-success">Export Excel</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>UHID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Department</th>
                <th>District</th>
                <th>Area</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->uhid }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->department }}</td>
                    <td>{{ $patient->district }}</td>
                    <td>{{ $patient->area }}</td>
                    <td>
                        <form method="GET" action="{{ route('patients.index') }}">
                            <input type="text" name="search" placeholder="Search by Name or Phone" class="form-control w-25 d-inline">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>

                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $patients->links() }}
</div>
@endsection
