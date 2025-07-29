<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Meeting Scheduled - Bloom Digital Media</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #2B2B2B; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #2B2B2B; padding: 20px; text-align: center; }
        .header img { max-width: 200px; height: auto; }
        .content { padding: 20px; background-color: #FFF7EB; }
        .footer { background-color: #2B2B2B; color: #FFF7EB; padding: 20px; text-align: center; font-size: 14px; }
        .button { display: inline-block; padding: 12px 24px; background-color: #FF9501; color: #FFF7EB; text-decoration: none; border-radius: 4px; font-weight: bold; margin: 15px 0; }
        .meeting-details { background: #fff; padding: 20px; border-radius: 4px; margin: 20px 0; }
        .meeting-details p { margin: 5px 0; }
        .meeting-details strong { display: inline-block; width: 150px; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ url('/images/bloom-logo1.png') }}" alt="Bloom Digital Media">
    </div>
    
    <div class="content">
        <h2>New Meeting Scheduled</h2>
        
        <div class="meeting-details">
            <p><strong>Client Name:</strong> {{ $meetingData['name'] }}</p>
            <p><strong>Email:</strong> {{ $meetingData['email'] }}</p>
            <p><strong>Phone:</strong> {{ $meetingData['phone'] }}</p>
            <p><strong>Meeting With:</strong> {{ $meetingData['personnel_name'] }}</p>
            <p><strong>Scheduled Time:</strong> {{ $meetingData['time'] }}</p>
            <p><strong>Duration:</strong> {{ $meetingData['duration'] }}</p>
            <p><strong>Additional Information:</strong></p>
            <p>{{ $meetingData['additional_info'] ?? 'No additional information provided.' }}</p>
        </div>
        
        <p>This meeting was scheduled through the Bloom Digital Media website.</p>
    </div>
    
    <div class="footer">
        <p> {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</body>
</html>
