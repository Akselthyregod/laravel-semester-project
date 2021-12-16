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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jsdoc.js"></script>

    <script>

        function stateNotification(){
            $.get("<?php echo route ('ajaxStatus')?>")
                .done(function(result){

                  if(result['new']) {
                      console.log('new state');
                      document.getElementById("status").innerHTML = "State: " + result['state'];
                  }else{

                  }

                })
                .always(function (){
                    setTimeout(function (){
                        batchNotification();
                    }, 1000)
                })

        }

        function batchNotification(){
            $.get("<?php echo route ('ajaxNew')?>")
                .done(function(result){
                    if(result['new']) {
                        console.log('new Entry');

                        var body = document.getElementById("batch-body");
                        var row = body.insertRow(0);

                        var id                      = row.insertCell(0);
                      //  id.innerHTML                = result['data'].id;
                        var created_at              = row.insertCell(1);
                        //created_at.innerHTML                  = result['data'].created_at;
                        var updated_at              = row.insertCell(2);
                        //updated_at.innerHTML                  = result['data'].updated_at;
                        var prod_processed_count    = row.insertCell(3);
                        prod_processed_count.innerHTML        = result['data'].prod_processed_count;
                        var prod_defective_count    = row.insertCell(4);
                        prod_defective_count.innerHTML        = result['data'].prod_defective_count;
                        var mach_speed              = row.insertCell(5);
                        mach_speed.innerHTML                  = result['data'].mach_speed;
                        var humidity                = row.insertCell(6);
                        humidity.innerHTML      = result['data'].humidity;
                        var temperature             = row.insertCell(7);
                        temperature.innerHTML = result['data'].temperature;
                        var vibration               = row.insertCell(8);
                        vibration.innerHTML = result['data'].vibration;



                    }else{

                    }

                })
                .always(function (){
                    setTimeout(function (){
                        stateNotification();
                    }, 1000)
                })

        }
        stateNotification();

    </script>
</head>
<body>
@section('content')
<h1>Batch</h1>
<a href="/">Back</a>
<form action="/batch" method="post">
    @csrf
    <div class="btn-group">
        <button type="submit" name="cmd" value="1" class="btn btn-secondary btn-lg">Reset</button>
        <button type="submit" name="cmd" value="2" class="btn btn-success btn-lg">Start</button>
        <button type="submit" name="cmd" value="3" class="btn btn-warning btn-lg">Stop</button>
        <button type="submit" name="cmd" value="4" class="btn btn-danger btn-lg">Abort</button>
        <button type="submit" name="cmd" value="5" class="btn btn-dark btn-lg">Clear</button>
    </div>
</form>
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
    <tbody id="batch-body">
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
<button class="update" onClick="window.location.reload();">Update</button> <br> <br>
<div class="ingredients">
    @foreach($ingredient as $ingredient)
        <h4>{{$ingredient->product}}: {{$ingredient->amount}}</h4>
       <div class="progressBar">
            <div class="progress-bar" role="progressbar" style="width: calc({{$ingredient->amount}}% / 350)"><span class="testing">{{$ingredient->amount}}</span></div>
        </div>
    @endforeach
</div>
<span class="tester"></span>
<br>
<div>
    <a href="/batch/result">View batch report</a>
</div>
<h5 class="status" id="status">Status: {{$status}}</h5>


</body>
@endsection
</html>
