<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Keuangan.ku') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <!-- FontAwesome Icon Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontawesome-iconpicker@3.2.0/dist/css/fontawesome-iconpicker.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom DataTable Styles -->
    <style>
        /* DataTable Custom Styling */
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            background-color: white;
            color: #374151;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            background-color: white;
            color: #374151;
            margin-left: 0.5rem;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .dataTables_wrapper .dataTables_info {
            color: #6b7280;
            font-size: 0.875rem;
            margin-top: 1rem;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: 1px solid #d1d5db;
            background: white;
            color: #374151 !important;
            padding: 0.5rem 0.75rem;
            margin: 0 0.125rem;
            border-radius: 0.375rem;
            text-decoration: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f3f4f6 !important;
            border-color: #9ca3af;
            color: #111827 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #3b82f6 !important;
            border-color: #3b82f6;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #2563eb !important;
            border-color: #2563eb;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            color: #9ca3af !important;
            border-color: #e5e7eb;
            background: #f9fafb;
        }

        .dataTables_wrapper .dataTables_processing {
            background: rgba(255, 255, 255, 0.9);
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 1rem;
        }

        /* Table styling */
        .dataTable {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .dataTable thead th {
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #6b7280;
            padding: 0.75rem 1rem;
        }

        .dataTable tbody tr {
            transition: background-color 0.15s ease-in-out;
        }

        .dataTable tbody tr:hover {
            background-color: #f9fafb;
        }

        .dataTable tbody td {
            border-bottom: 1px solid #f3f4f6;
            padding: 0.75rem 1rem;
            vertical-align: middle;
        }

        .dataTable tbody tr:last-child td {
            border-bottom: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                text-align: left;
                margin-bottom: 1rem;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }

        /* Additional improvements */
        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            font-weight: 500;
            color: #374151;
        }

        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Better spacing for DataTable elements */
        .dataTables_wrapper .dataTables_length {
            margin-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_info {
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 1rem;
        }

        /* Improved table header styling */
        .dataTable thead th {
            position: relative;
            cursor: pointer;
        }

        .dataTable thead th.sorting:after,
        .dataTable thead th.sorting_asc:after,
        .dataTable thead th.sorting_desc:after {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            opacity: 0.5;
        }

        .dataTable thead th.sorting:after {
            content: "\f0dc";
        }

        .dataTable thead th.sorting_asc:after {
            content: "\f0de";
            opacity: 1;
        }

        .dataTable thead th.sorting_desc:after {
            content: "\f0dd";
            opacity: 1;
        }

        .dataTables_empty {
            text-align: center;
            padding: 2rem !important;
            color: #6b7280;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        @include('layouts.navigation')

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        @yield('header')
                    </h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-800">Welcome, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- FontAwesome Icon Picker JS -->
    <script src="https://cdn.jsdelivr.net/npm/fontawesome-iconpicker@3.2.0/dist/js/fontawesome-iconpicker.min.js"></script>

    @stack('scripts')
</body>
</html>
