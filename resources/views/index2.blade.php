@extends('layouts.app')

@section('content')


    <h1>Testss</h1>

    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Tests</th>
        </thead>
        <tbody>
            @foreach($tests as $test)
                <tr>
                    <th scope="row">{{$test->id}}</th>
                    <td>{{$test->created_at}}</td>
                    <td>{{$test->updated_at}}</td>
                    <td>{{$test->tests}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
