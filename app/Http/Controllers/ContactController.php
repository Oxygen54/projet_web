<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{

    public function send(Request $request){

        // Define values
        $data = array(
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'message_text'=>$request->message
                    );

        // Create the send mail function
        Mail::send('contact_template', $data, function ($message) use ($request){

            /* Config ********** */
            $to_email = "contact@bde.fr";
            $to_name  = "BDE";
            $subject  = "BDE Contact Form";

            $message->subject ($subject);
            $message->from ($request->email, $request->name);
            $message->to ($to_email, $to_name);
        });

        // Check the result
        if(count(Mail::failures()) > 0){
            $status = 'error';
        } else {
            $status = 'success';
        }

        // Redirect view
        return redirect()->route('contact')->with('success', 'Mail sent !');
    }

}