<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function showAllUsers()
    {
        if (Auth::user()->checkAdmin() == 1){
            $users = DB::select("call list_users()");
            return view('admin.users_tab', [ 'users' => $users ]);
        }else
        return abort(401);
    }

}