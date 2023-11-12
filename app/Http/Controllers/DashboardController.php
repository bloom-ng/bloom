<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Task;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index(){
        
        $unfinished_tasks = count(
                                Task::where('status','=',0)->get()
                            );

        $upcoming_appointments = count(
                                    Appointment::where('start','>',now())->get()
                                );
        $tasks = Task::where('status',0)->get();

        return view('dashboard.home',
            [
                'user'=> Auth::user(),
                'subscriber_no' => count(Subscriber::all()),
                'contact_no' => count(Contact::all()),
                'unfinished_tasks' => $unfinished_tasks,
                'upcoming_appointments' => $upcoming_appointments,
                'tasks' => $tasks
                
            ]);
    }
}
