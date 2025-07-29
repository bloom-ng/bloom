<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $meetingData;

    /**
     * Create a new message instance.
     *
     * @param array $meetingData
     * @return void
     */
    public function __construct($meetingData)
    {
        $this->meetingData = $meetingData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Meeting with Bloom Digital Media Has Been Confirmed')
                    ->view('emails.meeting-confirmation')
                    ->with(['meetingData' => $this->meetingData]);
    }
}
