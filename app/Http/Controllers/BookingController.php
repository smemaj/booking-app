<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{

    public function main()
    {
        $bookings = Booking::all();
        if(Auth::user()->checkAdmin()==1){
           
            return view('admin.bookings_tab', [ 'bookings' => $bookings ]);
        }
        elseif(Auth::user()->checkAdmin()==2){
            return redirect()->route('showForUser', [ 'bookings' => $bookings ]);
            // return view('home');
        }
       
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
        
        DB::select("call book_flight(?, ?, ?, ?)", [$user->id, $flight->id, $status, $time_clicked]);
       
        return redirect()->route('showForUser');
    }

    public function showBooking(Int $uid, Int $fid)
    {
        $user = User::find($uid);
        $flight = Flight::find($fid);
       
        $booking = DB::select("SELECT * FROM bookings WHERE user_id = ? AND flight_id = ?", [$uid, $fid]);
        // dd($booking[0]);
        $booking = $booking[0];
        return view('admin.show_booking', ['booking' => $booking,'user' => $user, 'flight' => $flight ]);
    }

}