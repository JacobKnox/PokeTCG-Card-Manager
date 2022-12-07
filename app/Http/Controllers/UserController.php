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
            return redirect('/register')->withInput([$e, $request->except('password')]);
        }
        return UserController::login($request);
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
            return back();
        }
 
        return back()->withInput(['error' => 'The provided credentials do not match our records.', $request->all()]);
    }

    public static function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}