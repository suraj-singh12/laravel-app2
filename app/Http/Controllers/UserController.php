<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // constructor of UserController
    public function __construct() {
        // defining middlewares to be used by UserController
        // $this->middleware('auth');
        $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');
    }
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
    function getInfo(Request $request, $id) {
        return "Information of " .$id;
    }

    function currentUrl() {
        return view('current-url');
    }
}
