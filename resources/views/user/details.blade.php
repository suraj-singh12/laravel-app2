<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Name: {{ $name }}</h1>
    <h1>Occupation: {{ $occupation }}</h1>
    <h1>City: {{!empty($city) ? $city : '-'}}</h1>
</body>
</html>