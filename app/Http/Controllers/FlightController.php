<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public function showAllFlights()
    {
        if(Auth::user()->checkAdmin()==1){
        $flights = Flight::all();
        return view('admin.flights_tab', [ 'flights' => $flights ]);
    }
    }

    public function showAll()
    {
        
        $flights = Flight::all();
        return view('user.flights_tab', [ 'flights' => $flights ]);
    
    }

    public function edit(Flight $flight)
    {
        $flights = Flight::all();
        return view('flights.edit_flight', [ 'flights' => $flights, 'flight' => $flight ]);
    }

    public function searchFlights()
    {
        return view('user.search_flights_tab');
    }

    public function search (Flight $flight){
        return null;
    }

}