<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMeetingNotification extends Mailable
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
        return $this->subject('New Meeting Scheduled: ' . $this->meetingData['name'])
                    ->view('emails.admin-meeting-notification')
                    ->with(['meetingData' => $this->meetingData]);
    }
}
