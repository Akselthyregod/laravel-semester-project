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
<div class="links">
    <a href="/create">Create batch</a> <br>
</div>
{{-- <img class="beer" src="{{URL::asset('/images/beer2.jpg')}}" alt="..."> --}}
@if(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif
<br>

<h3>Batches: {{DB::table('newbatches')->count()}}</h3>

<div class="createtable">
<table class="table">
    <thead>
    <th scope="col">ID</th>
    <th scope="col">Type</th>
    <th scope="col">Bottles</th>
    <th scope="col">Speed</th>
    <th scope="col">Batch ID</th>
    <th scope="col"> - </th>
    </thead>
    <tbody>
    @foreach($newbatch as $newbatch)
        <tr>
            <th scope="row">{{$newbatch->id}}</th>
            <td>@if($newbatch->product_id == 0)
                    Pilsner
                @elseif($newbatch->product_id == 1)
                    Wheat
                @elseif($newbatch->product_id == 2)
                    IPA
                @elseif($newbatch->product_id == 3)
                    Stout
                @elseif($newbatch->product_id == 4)
                    Ale
                @elseif($newbatch->product_id == 5)
                    Alcohol Free
            @endif</td>
            <td>{{$newbatch->amount}}</td>
            <td>{{$newbatch->speed}}</td>
            <td>{{$newbatch->batchID}}</td>

            @if(DB::table('batch_report')->where('batchID', $newbatch->batchID)->exists())
                <td><a href="/report/{{$newbatch->batchID}}"> Report</a></td>
            @else
                <td><a href="/batch/{{$newbatch->batchID}}"> Details</a></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</body>
@endsection
</html>
