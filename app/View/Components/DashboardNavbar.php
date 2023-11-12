<?php

namespace App\View\Components;

use App\Models\Task;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class DashboardNavbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = Auth::user();
        
        $unfinished_tasks = count(
                                        Task::where('personnel_id','=',$user->personnel->id)
                                        ->where('status','=',0)
                                        ->get()
                                    );

        $upcoming_appointments = count(
                                        Appointment::where('personnel_id','=',$user->personnel->id)
                                        ->where('start','>',now())
                                        ->get()
                                    );

        return view('components.dashboard-navbar', [
            'user' => $user,
            'no_unfinished_tasks' => $unfinished_tasks,
            'no_upcoming_appointments' => $upcoming_appointments
            ]);
    }
}
