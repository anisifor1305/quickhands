<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/">Главная</a>
       <h1>Объявления для фрилансеров</h1>
    <p>Хотите получать предложения без поиска? Создайте объявление ->    <a href="/freelancers/new">Написать о навыках</a></p>


    <!-- Категории -->
    <ul id="categories">
        <li><a href="#web-design">Web-дизайн</a></li>
        <li><a href="#programming">Программирование</a></li>
        <li><a href="#writing">Копирайтинг</a></li>
        <li><a href="#graphics">Графический дизайн</a></li>
    </ul>

    <!-- Объявления -->
    <!-- <section id="job-listings">
        <a href="/adverts/1" class="job-link">
            <article class="job-listing type-webdesign" data-id="1">
                <h2>Дизайнер интерфейсов</h2>
                <p>Требуется дизайнер интерфейсов для разработки мобильного приложения. Опыт работы с Figma обязателен.</p>
            </article>
        </a>
    </section> -->
    @foreach ($advs as $adv)
        <a href="/adverts/{{$adv->id}}" class="job-link">
            <article class="job-listing type-webdesign" type="{{$adv->type}}">
                <h2>{{$adv->name}}</h2>
                <p>{{$adv->price}}</p>
            </article>
        </a>
    @endforeach
</body>
</html>