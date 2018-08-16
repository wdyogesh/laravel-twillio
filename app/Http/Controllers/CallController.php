<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\Twiml;


require_once('Twilio/autoload.php'); // Loads the library
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;

class CallController extends Controller
{
    /*
     * Process a new call
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newCall(Request $request)
    {
        $response = new Twiml();
        $callerIdNumber = config('services.twilio')['number'];

        $dial = $response->dial(['callerId' => $callerIdNumber]);

        $phoneNumberToDial = $request->input('phoneNumber');

        if (isset($phoneNumberToDial)) {
            $dial->number($phoneNumberToDial);
        } else {
            $dial->client('support_agent');
        }
        
        return $response;
    }

    public function videoCall()
    {
        return view('supportDashboard');
    }
    // New ticket details goes here.
    public function newTicket(Request $request)
    {
        $messages = [
            'required' => 'The :attribute is mandatory',
            'phone_number.regex' => 'The phone number must be in E.164 format'
        ];

        $this->validate(
            $request, [
            'name' => 'required',
            // E.164 format
            'phone_number' => 'required|regex:/^\+[1-9]\d{1,14}$/',
            'description' => 'required'
        ], $messages
        );

        $newTicket = new Ticket($request->all());
        $newTicket->save();

        $request->session()->flash(
            'status',
            "We've received your support ticket. We'll be in touch soon!"
        );

        return redirect()->route('home');
    }


    public function token(Request $request){


// Required for all Twilio access tokens
        $twilioAccountSid = 'ACcf91af329cfa8fc79de66c426c5d7b62';
        $twilioApiKey = 'SK192815418196e4709ede386fa6fdf611';
        $twilioApiSecret = 'wV9fG3Ng7fxcLnjIafJ72jl4o9wLz4TA';

// Required for Chat grant
        $serviceSid = 'IS79f2e633d8e343b6ae2764fdc5f78920';
// choose a random username for the connecting user
        $identity = "john_doe";

// Create access token, which we will serialize and send to the client
        $token = new AccessToken(
            $twilioAccountSid,
            $twilioApiKey,
            $twilioApiSecret,
            3600,
            $identity
        );

     // render token to string
        echo $token->toJWT();

    }
}
