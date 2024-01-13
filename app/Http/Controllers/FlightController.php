<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flight;

class FlightController extends Controller
{
    public function show()
    {
        $flights = Flight::all();
        return view('tabs.flights_tab', [ 'flights' => $flights ]);
    }

    public function edit(Flight $flight)
    {
        $flights = Flight::all();
        return view('flights.edit_flight', [ 'flights' => $flights, 'flight' => $flight ]);
    }

}