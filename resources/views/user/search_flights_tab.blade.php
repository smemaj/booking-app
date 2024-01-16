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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showForUser') }}">Bookings</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link active" href="{{ route('searchFlights') }}">Search Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAll') }}">Flights</a>
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
            <form method="POST" action="{{ route('search') }}">
                @csrf
                <div class="container py-5 bg-light">
                    <div class="row">
                        <div class="col-sm">
                            <label for="origin" class="form-label">Origin</label>
                            <input type="text" class="form-control" name="origin" id="origin">
                        </div>
                        <div class="col-sm">
                            <label for="destination" class="form-label">Destination</label>
                            <input type="text" class="form-control" name="destination" id="destination">
                        </div>
                        <div class="col-sm">
                            <div class="row align-items-end">
                                <div class="col-auto">
                                    <label for="date" class="form-label">Flight Date</label>
                                    <input type="date" class="form-control" name="date" id="date">

                                </div>
                                <div class="col-sm">
                                    <button class="btn btn-primary" name="action"
                                        value="search">{{ __('Search') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
            <div class="container py-2 bg-light">
                <div class="row">
                    @foreach ($flights as $flight)
                    <div class="col-sm col-lg-4 pt-5">
                        <div class="card text-dark card-has-bg click-col"
                            style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
                            <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street"
                                alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="card-body">
                                </div>
                                <div class="card-footer">
                                    <div class="media">
                                        <img class="mr-3 rounded-circle"
                                            src="https://assets.codepen.io/460692/internal/avatars/users/default.png?format=auto&version=1688931977&width=80&height=80"
                                            alt="Generic placeholder image" style="max-width:50px">
                                        <div class="media-body">
                                            <h6 class="my-0 text-light d-block">{{ $flight->origin}}</h6>
                                            <small class="text-light">Traveller</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
        @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
