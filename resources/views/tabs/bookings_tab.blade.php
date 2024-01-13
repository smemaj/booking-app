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
                            <a class="nav-link " href="{{ route('users') }}">Users</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link active" href="{{ route('bookings') }}">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('flights') }}">Flights</a>
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
            {{-- <div class="col bg-light mr-auto">2 of 2</div>
                <div class="container bg-light">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                            <div class="card text-dark card-has-bg click-col"
                                style="background-image:url('https://source.unsplash.com/600x900/?tech,street');">
                                <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech,street"
                                    alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <small class="card-meta mb-2">Thought Leadership</small>
                                        <h4 class="card-title mt-0 "><a class="text-dark" herf="https://creativemanner.com">Web
                                                Developmet Lorem Ipsum Sit Amet Consectetur dipisi?</a></h4>
                                        <small><i class="far fa-clock"></i> October 15, 2020</small>
                                    </div>
                                    <div class="card-footer">
                                        <div class="media">
                                            <img class="mr-3 rounded-circle"
                                                src="https://assets.codepen.io/460692/internal/avatars/users/default.png?format=auto&version=1688931977&width=80&height=80"
                                                alt="Generic placeholder image" style="max-width:50px">
                                            <div class="media-body">
                                                <h6 class="my-0 text-dark d-block">Oz Coruhlu</h6>
                                                <small>Director of UI/UX</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
        </div>
    </div>
</body>

</html>



