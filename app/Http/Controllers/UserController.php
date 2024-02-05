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
            $searchUser=null;
            return view('admin.users_tab', [ 'users' => $users, 'searchUser' => $searchUser]);
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
       
        DB::select("UPDATE user_logins SET username = ? WHERE user_id = ?", [$request['username'], $id]);
        $user=User::find($id);
        // dd($user);
        return redirect()->route('editUser', $user);
    }

    public function searchUser(Request $request){
        $request->validate([
            'searchString' => 'required',
           
        ]);
        $searchUser = DB::select("call search_users(?)", [$request['searchString']]);
        $suser=null;
        if(count($searchUser)!=0)
        $suser=$searchUser[0];
        $users = DB::select("call list_users()");
        
        return  view('admin.users_tab', ['users' => $users, 'searchUser' => $suser]);
    }

}