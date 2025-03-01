<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        /* 🔵 Evercare Blue Navbar */
        .navbar {
            background-color: #002f6c;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        /* 🔵 Updated Logout Button */
        .logout-btn {
            background-color: #00509d;
            color: white;
            border: none;
        }
        .logout-btn:hover {
            background-color: #003366;
        }
        .card {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

{{-- ✅ Hide Navbar on Login, CRM, and Appointment Create Pages --}}
@if (!request()->is('login') && !request()->is('crm') && !request()->is('appointment/create'))
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">CRM Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointments.index') }}">Appointments List</a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn logout-btn">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endif {{-- ✅ End Navbar Condition --}}

<div class="container">
    @yield('content')
</div>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
