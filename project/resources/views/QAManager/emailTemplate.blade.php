<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(session('flash'))
    <p style = "color:blue">{{session('flash')}}</p>
    @endif
    <p><strong>Department: </strong>{{$dataReceived['department']}}</p>
    <p><strong>Staff: </strong>{{$dataReceived['user']}}</p>
    <br>
    <h2>Report reasons</h2>
    {{$dataReceived['reason']}}

</body>
</html>