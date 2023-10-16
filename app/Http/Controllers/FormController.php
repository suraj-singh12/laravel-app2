<?php

namespace App\Http\Controllers;

use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function store($request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => ['required', new PhoneNumber],       // Apply the custom validation rule (created using php artisan make:rule PhoneNumber)
            'message' => 'required|string',
        ], [
            'phone.required' => 'Phone No daal de yarr',    // custom error message for the phone field
        ]);
        // process the form data here
        return 'Your message has been sent.';
    }
}
