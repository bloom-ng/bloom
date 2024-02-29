<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

class MailchimpController extends Controller
{
    // public function pingMailchimpAPI()
    // {
    //     // Create a new instance of the Mailchimp API client
    //     $mailchimp = new ApiClient();

    //     // Set the configuration for the Mailchimp API client
    //     $mailchimp->setConfig([
    //         'apiKey' => config('services.mailchimp.key'),
    //         'server' => 'us10'
    //     ]);

    //     // Ping the Mailchimp API to check if it's accessible
    //     // $response = $mailchimp->lists->getListMembersInfo("8de1a05acc");    this is to get list items
    //     // $response = $mailchimp->lists->addListMember("8de1a05acc", [
    //     //     "email_address" => "olusanu.White93@hotmail.com",
    //     //     "status" => "pending",
    //     // ]);
    //     // $response = $mailchimp->ping->get(); this to ping the Mailchimp API


    //     // Return the response
    //     return response()->json($response);
    //     // ddd($response);
    // }

    public function addToMailchimpList(Request $request)
    {
        // Retrieve email address from the request
        $email = $request->input('email');

        // Use Mailchimp API to add the user to the list
        // Assuming you have set up the Mailchimp API client and configured it in your constructor

        // Example Mailchimp API usage
        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us10',
        ]);

        $response = $client->lists->addListMember("8de1a05acc", [
            "email_address" => $email,
            "status" => "subscribed", // You can change status to 'pending' or other as needed
        ]);

        // Return a response (e.g., JSON response, redirect)
        // return response()->json($response);
        // ddd($response);
        return redirect('/')->with('success', 'Thank you for subscribing!');
    }
}
