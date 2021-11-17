@extends('layouts.app')

@section('content')


    <h1>Testss</h1>

    <ul>
        @foreach($tests as $test)
            <li>{{$test->id}}</li>
        @endforeach
    </ul>



@endsection
