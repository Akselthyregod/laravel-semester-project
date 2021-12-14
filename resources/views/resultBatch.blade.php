@extends('layouts.app')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batch report</title>
    <link rel="stylesheet" href="{{URL::asset('css/styling.css')}}">
</head>
<body>
@section('content')
<h1>Batch report</h1>
<a href="/batch">Back</a>

<table class="table">
    <thead>
    <th scope="col">ID</th>
    <th scope="col">Created at</th>
    <th scope="col">Updated at</th>
    <th scope="col">Processed</th>
    <th scope="col">Defective</th>
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
            <td>{{$batch->prod_processed_count}}</td>
            <td>{{$batch->prod_defective_count}}</td>
            <td>{{$batch->mach_speed}}</td>
            <td>{{$batch->humidity}}</td>
            <td>{{$batch->temperature}}</td>
            <td>{{$batch->vibration}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
@endsection
</html>
