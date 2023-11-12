<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Personnel;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index(){
        return view('meeting',[
            'personnels' => Personnel::all()
        ]);
    }

    public function show($slug){
        $personnel = Personnel::where('slug',$slug)->first();
        return view('personnel-meeting', [
            'personnel' => $personnel
        ]);
    }

    public function store(Request $request){

         $request->validate([
            'personnel_id' => 'required',
            'requester_name' => 'required|max:99',
            'requester_phone' => 'required|15'
        ]);

        $appointment = new Appointment;
        $appointment->personnel_id = $request->input('personnel_id');
        $appointment->requester_name = $request->input('requester_name');
        $appointment->requester_email = $request->input('requester_email', 'Nil');
        $appointment->requester_phone = $request->input('requester_phone');
        $appointment->start = $request->input('start');
        $appointment->duration = $request->input('duration');
        $appointment->end = $request->input('end');

        $success = $appointment->save();
        if($success){return back()->with('action-success', 'Meeting Booked Successfuly.');}
        return back()->with('action-fail', 'Something went wrong, Please try again.');

    }
}
