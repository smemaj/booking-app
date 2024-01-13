<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{

    public function main()
    {
        return view('home');
    }

    public function show()
    {
        return view('tabs.bookings_tab');
    }

    public function book()
    {
        //
        return view('tabs.bookings_tab');
    }

}