<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'SupportHub') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.min.css">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">



    @vite(['resources/css/argon-dashboard.css', 'resources/css/nucleo-icons.css', 'resources/css/nucleo-svg.css'])
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
        id="sidenav-main">
        <div class="sidenav-header text-center d-flex justify-content-center align-items-center">
            <span class="font-weight-bold">SupportHub</span>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ticket.submit.form') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Create Ticket</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ticket.status.form') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Check Ticket Status</span>
                        </a>
                    </li>
                @endguest
                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agents.index') }}">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-trophy text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Tickets</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            @guest
                <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ route('agents.login.form') }}">
                    <i class="ni ni-key-25 text-info text-sm opacity-10 me-2"></i>Sign In
                </a>
            @endguest
            @auth
                <a class="btn btn-danger btn-sm mb-0 w-100" href="{{ route('agents.logout') }}">
                    <i class="ni ni-user-run  text-sm opacity-10 me-2"></i>Sign Out
                </a>
            @endauth
        </div>
    </aside>

    <main class="main-content position-relative border-radius-lg ">
        <div class="container-fluid py-4">
            @yield('content')
            @if(session('status'))
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('status') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
        </div>
    </main>

    @yield('script')
    @vite(['resources/js/argon-dashboard.js', 'resources/js/core/popper.min.js', 'resources/js/core/bootstrap.min.js', 'resources/js/argon-dashboard.min.js',])

</body>

</html>