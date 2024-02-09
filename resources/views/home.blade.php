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
                        @if (Auth::user()->checkAdmin() == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAllUsers') }}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAllBookings') }}">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAllFlights') }}">Flights</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showForUser') }}">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('searchFlights') }}">Search Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAll') }}">Flights</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
           
        </div>
    </div>
</body>

</html>



