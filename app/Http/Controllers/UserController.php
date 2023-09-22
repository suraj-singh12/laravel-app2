<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()  {
        return 'Hello from UserController::index();';
    }

    function showProfile() {
        // return "User Profile Page";
        $username = "Tony Stark";
        $isAdmin = true;
        $items = ['item1', 'item2', 'item3'];
        return view('profile', compact('username', 'isAdmin', 'items'));
    }
}
