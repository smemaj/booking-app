{{-- <!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <div class="container py-4 px-3 mx-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="fname" class="form-label" value="{{old('fname')}}"> {{ __('First Name') }}</label>
                <input type="text" class="form-control" id="fname" name="fname">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label" value="{{old('lname')}}"> {{ __('Last Name') }}</label>
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label" value="{{old('email')}}"> {{ __('E-Mail Address') }}</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> {{ __('Password') }}</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label"> {{ __('Confirm Password') }}</label>
                <input type="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>

</html>

---------------------------------------------------------------------------- --}}

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('app.css') }}" rel="stylesheet">

</head>

<body>
    <section class="vh-200 gradient-custom">
        <div class="container py-5 h-100">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please enter your personal information!</p>
                                <div class="form-outline form-white mb-4">
                                    <label for="fname" class="form-label" value="{{old('fname')}}"> {{ __('First Name') }}</label>
                                    <input type="text" class="form-control form-control-lg" id="fname" name="fname">
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <label for="lname" class="form-label" value="{{old('lname')}}"> {{ __('Last Name') }}</label>
                                    <input type="text" class="form-control form-control-lg" id="lname" name="lname">
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <label for="email" class="form-label" value="{{old('email')}}"> {{ __('E-Mail Address') }}</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email">
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <label for="password" class="form-label"> {{ __('Password') }}</label>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password">
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <label for="password_confirmation" class="form-label"> {{ __('Password Confirmation') }}</label>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password_confirmation">
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

