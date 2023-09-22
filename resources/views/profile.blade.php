<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Welcome to your profile, {{ $username }}</p>
    @if($isAdmin)
        <p>You are the administrator</p>
    @else 
        <p>You are not an administrator</p>
    @endif

    <ul>
        @foreach($items as $item) 
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <hr>

    @unless($isAdmin)
        <p>You don't have admin rights</p>
    @endunless

    @empty($additionalData)
        <p>No additional data provided</p>
    @endempty

    <h3>Looping with for</h3>
    <ul>
        @for($i = 0; $i <= 3; $i++) 
            <li>Iteration {{$i}} </li>
        @endfor
    </ul>
    
</body>
</html>