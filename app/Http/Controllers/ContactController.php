<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    public function send(Request $request){

        $data = array(
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone, 
                        'messagetext'=>$request->message
                    );
        
        Mail::send('contact', $data, function ($message) use ($request){

            /* Config ********** */
            $to_email = "alexisdu54180@gmail.com";
            $to_name  = "Alexis";
            $subject  = "BDE Contact Form";

            $message->subject ($subject);
            $message->from ($request->email, $request->name);
            $message->to ($to_email, $to_name);
        });

        if(count(Mail::failures()) > 0){
            $status = 'error';
        } else {
            $status = 'success';
        }

        return response()->json(['response' => $status]);
    }

}