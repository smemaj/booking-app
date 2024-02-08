<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="vh-100 gradient-custom">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="container py-5 h-100 mx-auto bg-light">
            <nav class="navbar nav-tabs navbar-expand-lg navbar-light bg-light bg-opacity-15">
                <a class="navbar-brand" href="{{ route('home') }}">Flight Booking</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-tabs mr-auto" id="myNavBar">
                        @if (Auth::user()->checkAdmin() == 2)
                            <li class="nav-item active">
                                <a class="nav-link active" href="{{ route('showForUser') }}">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('searchFlights') }}">Search Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('showAll') }}">Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('showAllUsers') }}">Users</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link active" href="{{ route('showAllBookings') }}">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('showAllFlights') }}">Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        @endif
                    </ul>

                </div>
            </nav>
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <h3 class="text-dark">{{ $user->first_name . ' ' . $user->last_name }}</h3>
            </div>
            <div class="mb-3">
                <label for="flight" class="form-label">Flight</label>
                <h3 class="text-dark">{{ $flight->origin . ' to ' . $flight->destination }}</h3>
            </div>
            <div class="mb-3">
                <label for="booking_status" class="form-label">Booking Status</label>
                <h3 class="text-dark">{{ $booking->booking_status }}</h3>
            </div>
            <div class="mb-3">
                <label for="booking_time" class="form-label">Booking Time</label>
                <h3 class="text-dark">{{ $booking->booking_time }}</h3>
            </div>

            @if (Auth::user()->checkAdmin() == 2)
                <a href="{{ route('showForUser') }}" class="btn btn-secondary">Back</a>
            @else
                <a href="{{ route('showAllBookings') }}" class="btn btn-secondary">Back</a>
            @endif
        </div>
    </div>
</body>

</html>
