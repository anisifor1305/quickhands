<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Ваш баланс: {{ $balance }}</p>
    <a href="/">Главная</a>
    <p>Объявление:</p>
    <p>Разместил <a href="/users/{{ $owner_id }}">{{$owner_name}}</a> *ава*</p>
    <p>Название: {{ $name }}</p>
    <p>Описание: {{ $lore }}</p>
    <p>Цена {{ $price }}</p>
    <a href="/replies/{{$id}}/new"><button>Откликнуться</button></a>
</body>
</html>