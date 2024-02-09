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
                    <div class="row">
                        <form method="POST" action="{{ route('updateUser', $user->id) }}">
                            @csrf
                            <div class="container py-4 px-4">
                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <h3 class="text-dark">{{ $user->first_name }}</h3>
                                {{-- <input class="form-control" type="text" name="fname" id="fname" placeholder="{{ $user->first_name }}" value="{{ $user->first_name }}" readonly> --}}
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <h3 class="text-dark">{{ $user->last_name }}</h3>
                            </div>
                            <div class="mb-3">
                                <label for="oldun" class="form-label">Old Username</label>
                                <h3 class="text-dark">{{ $user->userLogin()->first()->username }}</h3>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">New Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="{{old('username', $user->userLogin()->first()->username)}}">
                            </div> 
                            <button class="btn btn-primary" name="update" value="save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

{{-- <div class="card1">
  <img src="{{ asset('images/'.$user->id.'.jpg')}}" alt="John" style="width:100%">
  <h1>{{ $user->first_name.' '.$user->last_name  }}</h1>
  <p class="title1">CEO & Founder, Example</p>
  <p>Harvard University</p>
  <a href="#"><i class="fa fa-dribbble"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-facebook"></i></a>
  <p><button>Contact</button></p>
</div> --}}
        </div>
    </div>
</body>

</html>