<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Models\User;

class DashboardSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    

    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = Auth::user();
        return view('components.dashboard-sidebar',['user' => $user]);
    }
}
