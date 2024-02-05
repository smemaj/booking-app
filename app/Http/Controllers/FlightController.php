<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
        return view('flights.search', ['flights' => $flights]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'date' => 'required|after_or_equal:'
        ]);
        $flights = Flight::all()->where('origin', $request['origin'])->where('destination', $request['destination'])->where('flight_date', $request['date']);
      
        return view('flights.search', ['flights' => $flights]);
    }

    public function editFlight(){
        if(Auth::user()->checkAdmin()==1){

            return view('admin.edit_flight');
        }
    }

    public function updateFlight(){
        return true;
    }


    public function export(Flight $flight)
{
    $bookings = DB::select("call get_bookings_for_flight(?)", [$flight->id]);
    $csvFileName = 'bookings.csv';
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
    ];

    $handle = fopen('php://output', 'w');
    fputcsv($handle, ['User', 'Flight', 'Status', 'Time']);

    foreach ($bookings as $booking) {
        fputcsv($handle, [$booking->user_id, $booking->flight_id, $booking->booking_status, $booking->booking_time]);
    }

    fclose($handle);

    return Response::make('', 200, $headers);
}

}