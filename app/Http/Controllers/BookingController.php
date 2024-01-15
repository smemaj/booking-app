<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{

    public function main()
    {
        return view('home');
    }


    public function showAllBookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings_tab', [ 'bookings' => $bookings ]);
    }

    public function showForUser()
    {
        
        $user = Auth::user();
        $bookings = DB::select("call show_bookings_for_user(".$user->id.")");
        return view('user.bookings_tab', [ 'bookings' => $bookings ]);
    }

    public function book(Flight $flight)
    {
        $user = Auth::user();
        // $status = $flight->flightDetails()->first()->flight_status;
        $status = 'BOOKED';
        // $time_clicked = date('Y-m-d H:i:s');
        $time_clicked='2024-01-14 21:12:30';
        // dd($status);
        DB::select("call book_flight(?, ?, ?, ?)", [$user->id, $flight->id, $status, $time_clicked]);
        // dd($time_clicked);
        return redirect()->route('bookings');
    }

}