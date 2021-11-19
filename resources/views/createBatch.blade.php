@extends('layouts.app')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create batch</title>
    <link rel="stylesheet" href="{{URL::asset('css/styling.css')}}">
</head>
@section('content')
<body>
<h1>Create batch</h1>
<a href="/">Back</a>
<div class ="dropdown-show">
<form action="">
    <label for="beers">Choose a beer</label>
    <select name="beers" id="beers">
        @foreach($products as $product)
            <option value="product">{{$product->description}}</option>
        @endforeach
    </select>
</form>
</div>
</body>
@endsection
</html>
