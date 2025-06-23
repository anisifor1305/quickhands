<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Объявление:
    <p>Разместил <a href="/users/{{ $owner_id }}">{{$owner_name}}</a></p>
    <p>Название: {{ $name }}</p>
    <p>Описание: {{ $lore }}</p>
    <p>Цена {{ $price }}</p>
</body>
</html>