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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{--
    <script type="text/javascript">
        $(document).ready(function() {
            $('#input1').change(function () {
                $('#input2').val($(this).val());
            });
        });
    </script>
    --}}
</head>
@section('content')
<body>
<h1>Create batch</h1>
<a href="/">Back</a>
<form action="/batch/create" method="post">
    @csrf
    <div class ="dropdown-show">
        <label for="product_id">Choose a beer</label>
            <select name="product_id" id="product_id">
                <option value="0">Pilsner</option>
                <option value="1">Wheat</option>
                <option value="2">IPA</option>
                <option value="3">Stout</option>
                <option value="4">Ale</option>
                <option value="5">Alcohol Free</option>
            </select>
    </div>
    <div>
        <label>Amount of bottles:</label>
        <input type="number" name="amount"> <br>
        @if($errors->has('amount'))
            <div class="form-text text-danger">{{ $errors->first('amount') }}</div>
        @endif
    </div>
    <div>
        <label>Speed:</label>
        <input type="number" id="input1" name="speed"> <br>
        @if($errors->has('speed'))
            <div class="form-text text-danger">{{ $errors->first('speed') }}</div>
        @endif
    </div>
    {{--
    <div class="hidden">
        <input type="hidden" name="prod_processed_count" value="0">
        <input type="hidden" name="prod_defective_count" value="0">
        <input type="hidden" name="humidity" value="0">
        <input type="hidden" id="input2" name="mach_speed" value="">
        <input type="hidden" name="temperature" value="0">
        <input type="hidden" name="vibration" value="0">
    </div>
    --}}
    <div class="btn-group-vertical">
        <button type="submit" name="batch" class="btn btn-primary btn-lg">Create</button>
    </div>
</form>
</body>
@endsection
</html>
