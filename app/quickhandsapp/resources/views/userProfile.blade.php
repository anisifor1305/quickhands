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
    <p>Страница исполнителя:</p>
     <p>ФИ: {{ $firstname}} {{$lastname}}</p>
     <p>Здесь еще ава где-то</p>
     <p>Статус на площадке: {{ $status }}</p>
     <p>О себе: {{ $lore }}</p>
</body>
</html>