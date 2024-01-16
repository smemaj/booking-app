<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $flights = [];
        return view('user.search_flights_tab', ['flights' => $flights]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'date' => 'required|after_or_equal:'
        ]);

        $flights = DB::select("call search_flight(?, ?, ?)", [$request['origin'], $request['destination'], $request['date']]);
      
        return view('user.search_flights_tab', ['flights' => $flights]);
    }

}