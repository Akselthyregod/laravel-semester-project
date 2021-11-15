<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beer brewer</title>
    <link rel="stylesheet" href="{{URL::asset('css/styling.css')}}">
</head>
<body>
<h1>Batch</h1>
<a href="/">Back</a>
@foreach($batch as $batch)
    <ul>
        <li>
            <span>Speed: {{$batch->mach_speed}}</span> <br>
            <span>Humidity: {{$batch->humidity}}</span> <br>
            <span>Temperature: {{$batch->temperature}}</span> <br>
            <span>Vibration: {{$batch->vibration}} </span> <br>
        </li>
    </ul>
@endforeach
<a href="/batch/result">View batch report</a>
</body>
</html>
