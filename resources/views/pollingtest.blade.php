<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="ingredients">
    @foreach($ingredient as $ingredient)
        <h4>{{$ingredient->product}}: {{$ingredient->amount}}</h4>
        <div class="progressBar">
            <div class="progress-bar" role="progressbar" style="width: calc({{$ingredient->amount}}% / 350)">{{$ingredient->amount}}</div>
        </div>
    @endforeach
</div>
</body>
</html>
