<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\AdminController;

class UserController extends Controller
{
    /**
     * Attempts to authenticate/login the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // Get the credentials (username and password) from the request
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt the authentication with the credentials
        if (Auth::attempt($credentials)) {
            // Regenerate the session and redirect the user to the index page
            $request->session()->regenerate();
            return redirect('/');
        }

        // If the authentication fails, return to the previous page without the password
        return back()->withInput($request->except('password'));
    }

    /**
     * Show the form for logging in.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        // Returns the login.blade.php view
        return view('login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all of the users
        $users = User::all();

        // Returns the users.blade.php view with all of the users
        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for registering.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Returns the register.blade.php view
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Checks the input against validation rules, bails as soon as one requirement isn't met
        $validated = $request->validate([
            // Email is required, must be a valid email format, and must not already exist in the users table
            'email' => ['bail', 'required', 'email', 'unique:users'],
            // Username is required and must not already exist in the user table
            'username' => ['bail', 'required', 'unique:users'],
            // Password is required and must be different than both the email and the username
            'password' => ['bail', 'required', 'different:username', 'different:email'],
        ]);

        // Create a new User (and, thus, new database row) with the input
        User::create([
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
        ]);

        // Authenticate the new user
        return UserController::authenticate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Returns the user.blade.php view with the User model associated with $id
        return view('user', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Gets the User associated with $id
        $user = User::findOrFail($id);

        // If the currently authenticated user is the user
        if(Auth::user() == $user){
            // Return the edit-user.blade.php view, passing in the user
            return view('edit-user', ['user' => $user]);
        }
        
        // Otherwise, take the user to admin-override-user.blade.php with $id (only available in the case an admin needs to edit the user)
        return view('admin-override-user', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Gets the User associated with $id
        $user = User::findOrFail($id);

        // If the user is the user to be edited or if the admin has overrode it
        if($user == Auth::user() || AdminController::authenticate($request->validate(['overridepassword']))){
            // Update the user with the inputted fields
            $user->update([
                'email' => $request->filled('email') ? $request->validate(['email' => ['bail', 'email', 'unique:users']]) : $user->email,
                'username' => $request->filled('username') ? $request->validate(['username' => ['bail', 'unique:users']]) : $user->username,
                'password' => $request->filled('password') ? bcrypt($request->validate(['password' => ['bail', 'different:email', 'different:username']])) : $user->password
            ]);
        }

        // Show the user
        return UserController::show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the User associated with $id
        $user = User::findOrFail($id);

        // If the user is the currently authenticated user
        if($user == Auth::user()){
            // Delete the user
            $user->delete();
            // Redirect them to the users index page
            return UserController::index();
        }

        // Otherwise, take them to the user's page
        return UserController::show($id);
    }
}
