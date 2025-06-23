<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/">Главная</a>
    <p>Объявление:</p>
    <p>Фрилансер <a href="/users/{{ $owner_id }}">{{$owner_name}} {{$owner_lastname}}</a> *ава*</p>
    <p>Название: {{ $name }}</p>
    <p>Описание: {{ $lore }}</p>
    <p>Примерная цена: {{ $minprice }}-{{ $maxprice }}</p>
</body>
</html>