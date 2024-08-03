<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'SupportHub') }}</title>

    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.min.css">

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.min.js"></script>

    
    @vite(['resources/css/argon-dashboard.css', 'resources/css/nucleo-icons.css', 'resources/css/nucleo-svg.css'])
</head>

<body class="bg-gray-100">

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'SupportHub') }}
            </a>
        </div>
    </nav>
    

    <main class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-sm" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h4 class="font-weight-bolder text-center">Sign Up</h4>
                <p class="text-center mb-4">Create a new account</p>
                <form id="registrationForm" role="form" method="POST" action="{{ route('agents.register') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="Full Name" aria-label="Full Name" required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Confirm Password" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-lg btn-primary w-100">Sign up</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p class="text-sm mb-0">
                        Already have an account?
                        <a href="{{ route('agents.login.form') }}" class="text-primary font-weight-bold">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    @section('script')
    @vite(['resources/js/argon-dashboard.js', 'resources/js/core/popper.min.js', 'resources/js/core/bootstrap.min.js','resources/js/agents/register.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js"></script>
    
    @endsection

</body>

</html>
