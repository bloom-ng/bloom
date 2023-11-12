<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMade;
use App\Mail\YourMeetingHasBeenScheduled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


use App\Models\Personnel;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index(){
        $this->authorize('do-admin-operations');
        return view('dashboard.appointments.index',[
            'user' => Auth::user(),
            'appointments' =>Appointment::all()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'requester_name' => 'required|max:99',
            'requester_phone' => 'required',
            'requester_email' => 'required',
        ]);
        
        //Verify if its working day
        if(!$this->isWorkingDay($request->input('start'))){
           return back()->with('action-fail', 'Sorry, this is not a working day. Consider booking weekdays.'); 
        }
        
        //Verify if its working hour
        if(!$this->isWorkingHour($request->input('start'))){
           return back()->with('action-fail', 'Sorry, working hours start from 10am - 4pm .'); 
        }
        
        
        //Test if request is from Personnel booking page
        if($request->input('personnel_id')){
            
            //verify if date time is available
            $count = Appointment::where('personnel_id', $request->input('personnel_id'))
                        ->whereBetween('start',
                    [
                        Carbon::parse($request->input('start'))->subHours(2), 
                        Carbon::parse($request->input('start'))->addHours(2)
                    ] )->count();
            if($count>0){
                return back()->with('action-fail', 'Sorry, date and time already booked. Please consider another day or time. Thanks ');
            }
            $appointment = new Appointment;   
            $appointment->personnel_id = $request->input('personnel_id');
            $appointment->requester_name =$request->input('requester_name');
            $appointment->requester_phone =$request->input('requester_phone');
            $appointment->requester_email =$request->input('requester_email');
            $appointment->start =$request->input('start');
            $appointment->duration =$request->input('duration',15);
            $success = $appointment->save();
            
           
            

            if($success){
                 $personnel = Personnel::find($request->input('personnel_id'));
                 $data = ['name' => $request->input('requester_name'),
                        'phone' => $request->input('requester_phone'),
                        'email' => $request->input('requester_email'),
                        'time' => $request->input('start'),
                        'duration' => $request->input('duration',15),
                        'personnel_name' => $personnel->user->name ,
                    ];
                    
                $this->sendMail($personnel->user->email,$data,$request->input('requester_email'));
                
                return back()->with('action-success', 'Meeting booked successfully');
            }
            return back()->with('action-fail', 'Something went wrong. Try again');
        }
        //For Main Booking page
        //Verify if the date time is available
        $count = Appointment::whereBetween('start',
                    [
                        Carbon::parse($request->input('start'))->subHours(2), 
                        Carbon::parse($request->input('start'))->addHours(2)
                    ] )->count();
        if($count>0){
                return back()->with('action-fail', 'Sorry, date and time already booked. Please consider another day or time. Thanks. ');
        }
        $personnels = Personnel::where('featured',1)->get();
        $appointment = new Appointment;
        foreach($personnels as $personnel){
            
            
            
            $appointment->personnel_id = $personnel->id;
            $appointment->requester_name =$request->input('requester_name');
            $appointment->requester_phone =$request->input('requester_phone');
            $appointment->requester_email =$request->input('requester_email');
            $appointment->start =$request->input('start');
            $appointment->duration =$request->input('duration',15);
            $success = $appointment->save();
            if($success){
                $personnel_record = Personnel::find($personnel->id);
                $data = ['name' => $request->input('requester_name'),
                            'phone' => $request->input('requester_phone'),
                            'email' => $request->input('requester_email'),
                            'time' => $request->input('start'),
                            'extra' => $personnel->user->email,
                            'duration' => $request->input('duration',15),
                            'personnel_name' => $personnel->user->name,
                        ];
                        
                $this->sendMail($personnel_record->user->email,$data,$request->input('requester_email'));
            }
        }
        
        
        
        if($success){
            return back()->with('action-success', 'Meeting booked successfully');
        }
        return back()->with('action-fail', 'Something went wrong. Try again');
    }

    public function myAppointment($id){
        $appointments = Appointment::where('personnel_id',$id)->get();

        return view('dashboard.appointments.my-appointment',[
            'user' => Auth::user(),
            'appointments' => $appointments

        ]);

    }

    public function destroy(Appointment $appointment){
        $success = $appointment->delete();
        if($success){
            return back()->with('action-success','Appointment Cancelled');
        }
        return back()->with('action-fail','Something went wrong, Try again.');
    }
    
    public function sendMail($to,$data,$requester_mail){
        Mail::to($to)
            ->send(new AppointmentMade($data) );
            
        Mail::to($requester_mail)
            ->send(new YourMeetingHasBeenScheduled($data) );
        
    }
    
    public function isWorkingHour($date){
        $hour = Carbon::parse($date)->format('H');
        if($hour<10 OR $hour>15){
            return false;
        }
        return true;
    }
    
    public function isWorkingDay($date){
        $day = Carbon::parse($date)->dayOfWeekIso;
        if($day<1 or $day>5){
            return false;
        }
        return true;
    }
}
