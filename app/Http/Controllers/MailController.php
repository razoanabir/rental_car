<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
        ]);
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        Mail::to('demo@domain.com')->send(new SendMail($name, $email, $subject, $message));
        
        return response()->json([
            'msg' => 'Mail has been sent successfully!',
        ]);
    }
}
