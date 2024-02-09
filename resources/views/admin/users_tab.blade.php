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
                        <li class="nav-item active">
                            <a class="nav-link active" href="{{ route('showAllUsers') }}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAllBookings') }}">Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showAllFlights') }}">Flights</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                   
                </div>
            </nav>
                <div class="container py-2 bg-light">
                    <form method="POST" action="{{ route('searchUser')}}">
                        @csrf
                        <div class="mb-3">
                                <label for="search" class="form-label">Search</label>
                                <input type="text" class="form-control" name="searchString" id="searchString">
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" value="search">Search</button>
                    </form>
                   
                    <div class="row">
                        @if ($searchUser != null)
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
                                            {{-- <img class="mr-3 rounded-circle"
                                                src="https://assets.codepen.io/460692/internal/avatars/users/default.png?format=auto&version=1688931977&width=80&height=80"
                                                alt="Generic placeholder image" style="max-width:50px"> --}}
                                            <div class="media-body">
                                                <h6 class="my-0 text-light d-block">{{ $searchUser->first_name.' '.$searchUser->last_name }}</h6>
                                                <a href="{{route('editUser', $searchUser->id)}}">{{$searchUser->first_name.' '.$searchUser->last_name}}</a>
                                                <small class="text-light">Traveller</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        @foreach ($users as $user)
                        <div class="col-sm col-lg-4 pt-5">
                            <div class="card text-dark card-has-bg click-col"
                            style="background-image:url('/images/{{$user->first_name}}.jpg');">
                            <img class="card-img d-none" src="{{asset('images/'.$user->first_name.'.jpg')}}"
                                    alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                    </div>
                                    <div class="card-footer">
                                        <div class="media">
                                            <img class="mr-3 rounded-circle"
                                                src="{{ asset('images/'.$user->id.'.jpg')}}"
                                                alt="Generic placeholder image" style="max-width:50px">
                                            <div class="media-body">
                                                <h6 class="my-0 text-light d-block">{{ $user->first_name.' '.$user->last_name }}</h6>
                                                <a href="{{route('editUser', $user->id)}}">User Profile</a>
                                                @if($user->user_role_id==1)
                                                <small class="text-light">Admin</small>
                                                @else
                                                <small class="text-light">Traveller</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
            @endforeach
            @endif
                    </div>
                </div>
        </div>
    </div>
</body>

</html>



