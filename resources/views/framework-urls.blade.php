<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Framework URLs Example</title>
</head>
<body>
    @php
    use App\Http\Controllers\UserController;
    @endphp

    {{-- <p>Profile Url: <a href="{{ route('profile2') }}"> Profile </a></p> --}}
    <p>User Edit URL: <a href="{{ action([UserController::class, 'showProfile']) }}"> My Profile </a></p>
</body>
</html>