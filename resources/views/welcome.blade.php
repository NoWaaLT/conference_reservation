<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to My Laravel App</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="mb-4">Welcome to the Conference Reservation Web Page!</h1>
                    <p class="lead">Make sure you register for the conferences that interest you.</p>

                    <!-- Buttons for Login and Register -->
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
