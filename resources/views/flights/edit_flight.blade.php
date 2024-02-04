<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    </ul>
                    <form class="form-inline my-2 my-lg-0 justify-right">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <form method="POST" action="{{ route('bookFlight', $flight) }}">
                @csrf
                <div class="mb-3">
                    <label for="origin" class="form-label">Origin</label>
                    <h3 class="text-dark">{{ $flight->origin }}</h3>
                </div>
                <div class="mb-3">
                    <label for="destination" class="form-label">Destination</label>
                    <h3 class="text-dark">{{ $flight->destination }}</h3>
                </div>
                <div class="mb-3">
                    <label for="flight_date" class="form-label">Flight Date</label>
                    <h3 class="text-dark">{{ $flight->flight_date }}</h3>
                </div> 
                <div class="mb-3">
                    <label for="departure_time" class="form-label">Departure Time</label>
                    <h3 class="text-dark">{{ $flight->departure_time }}</h3>
                </div> 

                <div class="mb-3">
                    <label for="airline_code" class="form-label">Airline Code</label>
                    <h3 class="text-dark">{{ $flight->flightDetails()->first()->airline_code }}</h3>
                </div>
                <div class="mb-3">
                    <label for="flight_number" class="form-label">Flight Number</label>
                    <h3 class="text-dark">{{ $flight->flightDetails()->first()->flight_number }}</h3>
                </div>
                <div class="mb-3">
                    <label for="aircraft_type" class="form-label">Aircraft</label>
                    <h3 class="text-dark">{{ $flight->flightDetails()->first()->aircraft_type }}</h3>
                </div> 
                <div class="mb-3">
                    <label for="flight_status" class="form-label">Status</label>
                    <h3 class="text-dark">{{ $flight->flightDetails()->first()->flight_status }}</h3>
                </div> 
                @if(Auth::user()->checkAdmin() == 2)
                <button class="btn btn-primary" name="action" value="book">Book</button>
                @endif
            </form>
        </div>
    </div>
</body>

</html>



