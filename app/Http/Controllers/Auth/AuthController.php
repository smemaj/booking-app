<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'user_role_id' => 2,
        ]);
        $user->save();


        $userLogin = new UserLogin([
            'id' => $user->id,
            'username' => $request->fname . '_' . $request->lname,
            'password' => Hash::make($request->password),
        ]);
        $userLogin->save();

        $user->userLogin()->save($userLogin);

        return redirect()->route('loginView')->withSuccess('Registration completed successfully. You can now login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request['email'])->first();
        if ($user == null)
            return redirect()->route('loginView')->withErrors('user does not exist');
        $userlogin = $user->userLogin()->first();

        if (Hash::check($request['password'], $userlogin->password)) {
            Auth::login($user);
            return redirect()->route('home');
        } else
            return redirect()->route('loginView')->withErrors('email or password are incorrect');

    }

    // protected function hasTooManyLoginAttempts(Request $request)
    // {
    //     return $this->limiter()->tooManyAttempts(
    //         $this->throttleKey($request), 3, 1
    //     );
    // }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginView');
    }
}
