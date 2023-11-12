<h2>Appointment has been booked with you via (bloomdigitmedia.com).</h2>

<p>Please see details below.</p>

<div> 
    <h4>This Appointment was booked with the following details.</h4>
    <p>Name: {{$data['name']}}</p> <br>
    <p>Email: {{$data['email']}}</p> <br>
    <p>Phone: {{$data['phone']}}</p> <br>
    <p>Time: {{date_format( date_create($data['time']),'D, d M Y, h:i a. ')}}</p> <br> 
    
    
    

</div>

<p>Please check your Bloom Dashboard for details. Thanks.</p>