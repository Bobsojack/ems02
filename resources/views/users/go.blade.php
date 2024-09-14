<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(Auth::check())
    <h1>{{ Auth::user_id()->id}}</h1>
    @else
    <h1>goga</h1>
    
@endif
</body>
</html>