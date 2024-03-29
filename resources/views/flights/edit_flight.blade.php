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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('showForUser') }}">Bookings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('searchFlights') }}">Search Flights</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link active" href="{{ route('showAll') }}">Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('showAllUsers') }}">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('showAllBookings') }}">Bookings</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link active" href="{{ route('showAllFlights') }}">Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
                            @endif
                    </ul>

                </div>
            </nav>
            <form method="POST" action="{{ route('bookFlight', $flight) }}">
                @csrf
                <div class="container py-4 px-4">
                <div class="mb-3">
                    <label for="origin" class="form-label">Origin</label>
                    <h6 class="text-dark">{{ $flight->origin }}</h6>
                </div>
                <div class="mb-3">
                    <label for="destination" class="form-label">Destination</label>
                    <h6 class="text-dark">{{ $flight->destination }}</h6>
                </div>
                <div class="mb-3">
                    <label for="flight_date" class="form-label">Flight Date</label>
                    <h6 class="text-dark">{{ $flight->flight_date }}</h6>
                </div>
                <div class="mb-3">
                    <label for="departure_time" class="form-label">Departure Time</label>
                    <h6 class="text-dark">{{ $flight->departure_time }}</h6>
                </div>

                <div class="mb-3">
                    <label for="airline_code" class="form-label">Airline Code</label>
                    <h6 class="text-dark">{{ $flight->flightDetails()->first()->airline_code }}</h6>
                </div>
                <div class="mb-3">
                    <label for="flight_number" class="form-label">Flight Number</label>
                    <h6 class="text-dark">{{ $flight->flightDetails()->first()->flight_number }}</h6>
                </div>
                <div class="mb-3">
                    <label for="aircraft_type" class="form-label">Aircraft</label>
                    <h6 class="text-dark">{{ $flight->flightDetails()->first()->aircraft_type }}</h6>
                </div>
                <div class="mb-3">
                    <label for="flight_status" class="form-label">Status</label>
                    <h6 class="text-dark">{{ $flight->flightDetails()->first()->flight_status }}</h6>
                </div>

                <!-- Add icon library -->

                @if (Auth::user()->checkAdmin() == 2)
                    @if ($flight->flightDetails()->first()->flight_status != 'canceled')
                        <button class="btn btn-primary" name="action" value="book">Book</button>
                    @endif
                    <a href="{{ route('showAll') }}" class="btn btn-secondary">Back</a>
                @else
                    <a href="{{ route('export', $flight) }}" class="btn btn-info">Export</a>
                    <a href="{{ route('showAllFlights') }}" class="btn btn-secondary">Back</a>
                    @if ($flight->flightDetails()->first()->flight_status != 'canceled')
                        <a href="{{ route('cancel', $flight) }}" class="btn btn-danger">Cancel</a>
                    @endif
                @endif
                <!--jo per userin-->
                </div>
            </form>
        </div>
    </div>
</body>

</html>
