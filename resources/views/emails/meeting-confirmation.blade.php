<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Meeting is Confirmed - Bloom Digital Media</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #2B2B2B; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #2B2B2B; padding: 30px 20px; text-align: center; }
        .header img { max-width: 200px; height: auto; }
        .content { padding: 30px 20px; background-color: #FFF7EB; }
        .footer { background-color: #2B2B2B; color: #FFF7EB; padding: 20px; text-align: center; font-size: 14px; }
        .button { display: inline-block; padding: 12px 24px; background-color: #FF9501; color: #FFF7EB !important; text-decoration: none; border-radius: 4px; font-weight: bold; margin: 15px 0; }
        .meeting-card { background: #fff; padding: 25px; border-radius: 8px; margin: 25px 0; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #2B2B2B; margin-top: 0; }
        h2 { color: #2B2B2B; margin-top: 25px; font-size: 18px; }
        p { margin: 10px 0; }
        .divider { border-top: 1px solid #e0e0e0; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ url('/images/bloom-logo1.png') }}" alt="Bloom Digital Media">
    </div>
    
    <div class="content">
        <h1>Your Meeting is Confirmed!</h1>
        
        <p>Hello {{ $meetingData['name'] }},</p>
        <p>Thank you for scheduling a meeting with Bloom Digital Media. We're excited to connect with you!</p>
        
        <div class="meeting-card">
            <h2>Meeting Details</h2>
            <p><strong>With:</strong> {{ $meetingData['personnel_name'] }}</p>
            <p><strong>Date & Time:</strong> {{ $meetingData['time'] }}</p>
            <p><strong>Duration:</strong> {{ $meetingData['duration'] }}</p>
            <p><strong>Location:</strong> Online (A meeting link will be shared prior to the meeting)</p>
        </div>
        
        <h2>Need to make any changes?</h2>
        <p>If you need to reschedule or cancel your meeting, please contact us at <a href="mailto:support@bloomdigitmedia.com">support@bloomdigitmedia.com</a> at least 24 hours in advance.</p>
        
        <h2>What to expect</h2>
        <ol>
            <li>You'll receive a reminder email 24 hours before the meeting</li>
            <li>A meeting link will be sent to you 1 hour before the scheduled time</li>
            <li>Please be ready 5 minutes before the meeting starts</li>
        </ol>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="https://bloomdigitmedia.com/contact" class="button">Contact Us</a>
        </div>
        
        <div class="divider"></div>
        
        <p>We look forward to speaking with you soon!</p>
        <p>Best regards,<br>The Bloom Digital Media Team</p>
    </div>
    
    <div class="footer">
        <p>© {{ date('Y') }} Bloom Digital Media. All rights reserved.</p>
        <p style="margin-top: 10px; font-size: 12px;">
            <a href="{{ url('/privacy-policy') }}" style="color: #FF9501; text-decoration: none;">Privacy Policy</a> | 
            <a href="{{ url('/terms') }}" style="color: #FF9501; text-decoration: none;">Terms of Service</a>
        </p>
    </div>
</body>
</html>
