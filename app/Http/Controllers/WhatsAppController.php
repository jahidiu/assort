<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    public function sendWhatsAppMessage()
    {
        $twilioSid = config('services.twilio.sid');
        $twilioToken = config('services.twilio.auth_token');
        $twilioWhatsAppNumber = config('services.twilio.whatsapp_number');
        // Replace with the recipient's phone number in WhatsApp format (e.g., "whatsapp:+1234567890")
        $recipientNumber = '+8801745878754';
        $message = "Hello from Twilio WhatsApp API in Laravel!";
        // dd($twilioSid, $twilioToken);
        $twilio = new Client($twilioSid, $twilioToken);

        try {
            $twilio->messages->create(
                $recipientNumber,
                [
                    "from" => $twilioWhatsAppNumber,
                    "body" => $message,
                ]
            );

            return response()->json(['message' => 'WhatsApp message sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
