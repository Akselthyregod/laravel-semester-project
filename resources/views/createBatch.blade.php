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
<form action="/batch/create" method="post">
    @csrf
    <div class ="dropdown-show">
        <label for="beers">Choose a beer</label>
            <select name="beers" id="beers">
                <option value="1">Pilsner</option>
                <option value="2">Wheat</option>
                <option value="3">IPA</option>
                <option value="4">Stout</option>
                <option value="5">Ale</option>
                <option value="6">Alcohol Free</option>
            </select>
    </div>
    <div class="form-check">
        <input type="radio" id="liter1" name="amount" value="1">
        <label for="liter1">1 litre</label><br>
        <input type="radio" id="liter2" name="amount" value="2">
        <label for="liter2">2 litres</label><br>
        <input type="radio" id="liter3" name="amount" value="3">
        <label for="liter3">3 litres</label><br>
        <input type="radio" id="liter4" name="amount" value="4">
        <label for="liter4">4 litres</label><br>
    </div>
    <div class="btn-group-vertical">
        <button type="submit" name="batch" class="btn btn-primary btn-lg">Create</button>
    </div>
</form>
</body>
@endsection
</html>
