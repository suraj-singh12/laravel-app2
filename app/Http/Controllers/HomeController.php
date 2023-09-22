<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard() {
        return "<h1>Welcome to Dashboard!!</h1>";
    }
    function users() {
        return ['user1', 'user2', 'user3'];
    }
    function settings() {
        return "<button>Click here for settings</button>";
    }
}
