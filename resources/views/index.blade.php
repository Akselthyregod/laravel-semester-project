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
@section('content')
<body>
<h1>Beer brewing machine</h1>
<a href="/batch/create">Create batch</a> <br>
<a href="/batch">View batch</a>
</body>
@endsection
</html>
