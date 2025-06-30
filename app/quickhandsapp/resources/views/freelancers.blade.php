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
    <h2>Тысячи исполнителей. Найдите кого-угодно.</h2>
    <h3>По плану тут жесткая анимация отзывов.</h3>
    <p>У вас необычный заказ? -> <a href='/adverts/new'>Создать заявку</a></p>
    <h3>Здесь лучшие предложения от проверенных пользователей.</h3>
    @foreach ($FLPubs as $FLPub)
    <a href="/freelancers/{{$FLPub->id}}" class="job-link">
        <article class="job-listing type-webdesign" type="{{$FLPub->type}}">
            <h2>{{$FLPub->name}}</h2>
            <p>{{$FLPub->minprice}} - {{$FLPub->maxprice}}</p>
        </article>
    </a>
    @endforeach
</body>
</html>