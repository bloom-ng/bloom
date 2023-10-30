<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <title>Bloom Subscribers</title>
</head>
<body>
    <h3>Bloom Subscribers</h3>
    <table class="table">
    <thead>
    <tr>
        <th>Emails</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($subscribers as $subscriber )
    <tr>
        <td>{{$subscriber->email}}</td>
    </tr>
    @endforeach
    
    </tbody>
    </table>
    <script src="/js/mdb.min.js"></script>
</body>
</html>