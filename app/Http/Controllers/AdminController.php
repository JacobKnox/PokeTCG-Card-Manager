<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function authenticate($password){
        return $password === env("ADMIN_PASSWORD");
    }
}
