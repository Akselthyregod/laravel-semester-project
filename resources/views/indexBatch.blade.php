@extends('layouts.app')
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
@section('content')
<h1>Batch</h1>
<a href="/">Back</a>

<table class="table">
    <thead>
    <th scope="col">ID</th>
    <th scope="col">Created at</th>
    <th scope="col">Updated at</th>
    <th scope="col">Speed</th>
    <th scope="col">Humidity</th>
    <th scope="col">Temperature</th>
    <th scope="col">Vibration</th>
    </thead>
    <tbody>
    @foreach($batch as $batch)
        <tr>
            <th scope="row">{{$batch->id}}</th>
            <td>{{$batch->created_at}}</td>
            <td>{{$batch->updated_at}}</td>
            <td>{{$batch->mach_speed}}</td>
            <td>{{$batch->humidity}}</td>
            <td>{{$batch->temperature}}</td>
            <td>{{$batch->vibration}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="controls">
<form action="/batch" method="post">
    @csrf
<div class="btn-group-vertical">
    <button type="submit" name="cmd" value="1" class="btn btn-secondary btn-lg">Reset</button>
    <button type="submit" name="cmd" value="2" class="btn btn-success btn-lg">Start</button>
    <button type="submit" name="cmd" value="3" class="btn btn-warning btn-lg">Stop</button>
    <button type="submit" name="cmd" value="4" class="btn btn-danger btn-lg">Abort</button>
    <button type="submit" name="cmd" value="5" class="btn btn-dark btn-lg">Clear</button>
</div>
</form>
</div>
<br>
    @foreach($ingredient as $ingredient)
        <h4>{{$ingredient->product}}</h4>
        <div class="progressBar">
            <div class="progress-bar" role="progressbar" style="width: {{$ingredient->amount}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{$ingredient->amount}}</div>
        </div>
    @endforeach
<br>
<div>
    <a href="/batch/result">View batch report</a>
</div>
</body>
@endsection
</html>
