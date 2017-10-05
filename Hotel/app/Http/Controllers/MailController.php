<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    //
    public function sendTestEmail()
    {
        
        \Mail::to('arimoto@n-di.co.jp')->send(new TestMail());
        
        echo "Mail Send!!";
    }
}
