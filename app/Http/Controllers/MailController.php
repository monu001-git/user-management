<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\appointmentBook;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
      
        Mail::to('vinam@yopmail.com')->send(new appointmentBook($mailData));
             
        dd("Email is sent successfully.");
    }
}
