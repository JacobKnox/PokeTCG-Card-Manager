<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function getUser(){
        return Auth::user();
    }

    public static function register(Request $request)
    {
        if(!$request->has('username')){
            return view('register');
        }

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

    public static function decks(){
        if(Auth::check()){
            return view('decks', ['decks' => Auth::user()->decks]);
        }
        else{
            return redirect('/')->withInput(['session_expired' => true]);
        }
    }

    public static function collections(){
        if(Auth::check()){
            return view('collections', ['collections' => Auth::user()->collections]);
        }
        else{
            return redirect('/')->withInput(['session_expired' => true]);
        }
    }
}