<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Hi {{$user->name}}</h3>
    <p>Here are the list of prodcuts you purchased</p>
    <ul>
        @foreach($product as $p)
        <li>{{$product->name}}</li>
        @endforeach
    </ul>
    
</body>
</html>