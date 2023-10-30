<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\AgencyContacted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        $this->authorize('do-admin-operations');
        return view('dashboard.contacts.index',[
            'user'=> Auth::user(),
            'contacts' => Contact::all()
        ]);
    }

    public function generate(){
        return view('dashboard.contacts.generate',[
            'contacts' => Contact::all()
        ]);
    }

    public function store(Request $request){
        // validate form
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:14',
            'subject' => 'max:250',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        $this->sendMail('bloomdigitmedia@gmail.com',$request->all());

        return back()->with('contact-success', 'We have received your message and our team is currently on it. Thanks');
    }

    public function sendMail($to,$data){
        Mail::to($to)
            ->send(new AgencyContacted($data) );
        
    }

    public function destroy(Contact $contact){
        $success = $contact->delete();
        if($success){
            return back()->with('action-success','Contact Deleted');
        }
        return back()->with('action-fail','Something went wrong, Try again.');
    }
}
