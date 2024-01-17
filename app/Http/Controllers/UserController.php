<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function editUser(User $user){
        if(Auth::user()->checkAdmin()==1){
            return view('admin.edit_user', ['user' => $user]);
        }
    }

    public function updateUser(Request $request, Int $id){
        $request->validate([
            'username' => 'required',
           
        ]);
        dd($id);
        $query = DB::select("select username from users inner join user_logins on users.id=user_logins.user_id where username = ?", [$request['username']]);
        dd($query[0]->username);
        $user = User::all()->userLogin()->get()->where('username', '=', $request['username']);
        dd($user);
        return true;
    }

}