<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyMail;

class EmailController extends Controller
{
    public function sendMail() {
        $data = [
            'name' => 'John Doe',
            'body' => 'This is a test mail'
        ];

        Mail::to('rootuser4725@gmail.com')->send(new MyMail($data));
        dd('Mail sent successfully');
    }
}
