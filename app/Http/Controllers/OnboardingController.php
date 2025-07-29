<?php

namespace App\Http\Controllers;

use App\Models\Onboarding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMeetingNotification;
use App\Mail\MeetingConfirmation;

class OnboardingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'requester_name' => 'required|string|max:99',
            'requester_phone' => 'required|string|max:16',
            'requester_email' => 'required|email',
            'date' => 'required|date',
            'meeting_duration' => 'required|in:15,30,60,90',
            'meeting_with' => 'required|in:Johanna,Emma,Tseyi',
            'additional_info' => 'nullable|string|max:1000'
        ]);
        
        // Verify if it's a working day
        if (!$this->isWorkingDay($validated['date'])) {
            return back()->with('action-fail', 'Sorry, this is not a working day. Please book a weekday between Monday and Friday.'); 
        }
        
        // Verify if it's within working hours (10am - 4pm)
        if (!$this->isWorkingHour($validated['date'])) {
            return back()->with('action-fail', 'Sorry, working hours are from 10:00 AM to 4:00 PM. Please select a time within this range.'); 
        }
        
        // Check for existing bookings within 2 hours of the requested time
        $existingBooking = Onboarding::whereBetween('date', [
            Carbon::parse($validated['date'])->subHours(2),
            Carbon::parse($validated['date'])->addHours(2)
        ])->exists();
        
        if ($existingBooking) {
            return back()->with('action-fail', 'Sorry, this time slot is already booked or too close to another meeting. Please choose a different time.');
        }
        
        try {
            $onboarding = Onboarding::create([
                'meeting_with' => $validated['meeting_with'],
                'requester_name' => $validated['requester_name'],
                'requester_phone' => $validated['requester_phone'],
                'requester_email' => $validated['requester_email'],
                'date' => $validated['date'],
                'meeting_duration' => $validated['meeting_duration'],
                'additional_info' => $validated['additional_info'] ?? ''
            ]);
            
            // Prepare data for emails
            $data = [
                'name' => $validated['requester_name'],
                'phone' => $validated['requester_phone'],
                'email' => $validated['requester_email'],
                'time' => Carbon::parse($validated['date'])->format('l, F j, Y \a\t g:i A'),
                'duration' => $validated['meeting_duration'] . ' minutes',
                'additional_info' => $validated['additional_info'] ?? 'None provided',
                'personnel_name' => $validated['meeting_with']
            ];
            
            // Send notification to admin team
            $adminEmails = [
                'segun8427@gmail.com',
                'segun8428@gmail.com',
                'davidaremu@bloomdigitmedia.com',
            ];
            
            // Send notification to admin team
            foreach ($adminEmails as $email) {
                Mail::to($email)->queue(new AdminMeetingNotification($data));
            }
            
            // Send confirmation to the requester
            Mail::to($validated['requester_email'])->queue(new MeetingConfirmation($data));
            
            return redirect()->back()->with('success', 'Your meeting has been scheduled successfully! We\'ve sent a confirmation to your email.');
            
        } catch (\Exception $e) {
            \Log::error('Error scheduling meeting: ' . $e->getMessage());
            return back()->with('action-fail', 'Something went wrong while scheduling your meeting. Please try again.');
        }
    }
    
    /**
     * Check if the given date/time is within working hours (10 AM - 4 PM)
     * 
     * @param string $date Date string to check
     * @return bool
     */
    
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
