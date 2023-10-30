<html>
    
<body LINK=\"#ff8080\" VLINK=\"#ff0000\" ALINK=\"a05050\" STYLE=\"background: #000000; color: #ff5500\">
             
<h3>Hello {{$data['name']}},</h3>
<br>

<p>Your meeting was successfully scheduled for {{date_format( date_create($data['time']),'D, d M Y, h:i a. ')}} 
with {{$data['personnel_name']}}.</p>

<br>
<p>Thanks. We would be in touch.</p>


</body>
    
</html>

