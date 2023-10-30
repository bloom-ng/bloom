<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <title>Bloom Contacts</title>
</head>
<body>
    <h3>Bloom Contacts</h3> <hr> <br>
    <table class="table" >
    <thead>
    <tr>
    <tr>
                                    <th>#</th>
                                   <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Received</th>
                                    
                                
    </tr>
    </thead>

    <tbody>
    @foreach ($contacts as $contact )
    <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td>{{date_format( date_create($contact->created_at),'D, d M Y  ')}}</td>
    </tr>
    @endforeach
    
    </tbody>
    </table>

    <script src="/js/mdb.min.js"></script>
</body>
</html>