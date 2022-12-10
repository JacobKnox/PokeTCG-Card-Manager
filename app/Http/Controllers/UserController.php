<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function register(Request $request)
    {
        $input = $request->all();

        try{
            DB::table('users')->insert(
                ['email' => $input['email'],
                'username' => $input['username'],
                'password' => bcrypt($input['password'])
            ]);
        }
        catch(\Exception $e){
            return redirect('/register')->withInput($request->except('password'));
        }
        UserController::login($request);
        return redirect('/');
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withInput($request->except('password'));
    }

    public static function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}