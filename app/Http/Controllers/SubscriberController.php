<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{

    public function index(){
        $this->authorize('do-admin-operations');
        return view('dashboard.subscribers.index',[
            'user'=> Auth::user(),
            'subscribers' => Subscriber::all()
        ]);
    }

    public function generate(){
        return view('dashboard.subscribers.generate',[
            'subscribers' => Subscriber::all()
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'email' => 'required|email',
        ]);
        

        Subscriber::create(['email' => $request->input('email')]);

        return response()->json([
            'message' => 'subscribed'
        ]);

    }

    public function destroy(Subscriber $subscriber){
        $this->authorize('do-admin-operations');
        $success = $subscriber->delete();
        if($success){
            return back()->with('action-success','Subscriber Deleted');
        }
        return back()->with('action-fail','Something went wrong, Try again.');
    }
}
