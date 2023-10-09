<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestDemoController extends Controller
{
    public function showForm() {
        return view('formView');
    }
    public function processForm(Request $request) {
        // Retrive input data
        $name = $request->input('name');
        $email = $request->input('email');
        $allData = $request->all();

        // Display the data io the confirmation page
        return view('confirmationView', compact('name', 'email', 'allData'));
    }
}
