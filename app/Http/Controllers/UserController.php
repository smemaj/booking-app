<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

   
    public function show()
    {
        $users = User::all();
        return view('admin.users_tab', [ 'users' => $users ]);
    }


    public function listUsers()
    {
        //here you get array of users
        $users = DB::select("call list_users()");
        dd($users);
        return redirect()->route('home');
    }

    public function checkAdmin()
    {
        $user = Auth::user();
        //result is 1 or 0
        DB::select("call check_admin(".$user->id.", @checking)");
        $check =  DB::select("select @checking as checking");
        dd($check);
        return redirect()->route('home');
    }

}