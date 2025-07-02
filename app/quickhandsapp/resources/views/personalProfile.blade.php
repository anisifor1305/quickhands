<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваш профиль</title>
</head>
<body>
    <h2>Ваш профиль</h2>
    <h1>Quickhands</h1>
    <a href="/">Главная</a>
    <a href="/logout" style="text-decoration: none;">
            Logout
    </a>
    </header>
    <p>Ваш баланс: {{ $balance }}</p>
    <img src="{{asset('images/bfl.jpg')}}" alt="Image">
    <p>Имя: {{$firstname}}</p>
    <p>Фамилия: {{$lastname}}</p>
    @if($passport_data)
        <p>Паспортные данные: верифицированы</p>
    @else
        <p>Паспортные данные: верификация не пройдена</p>
    @endif
    @if($about)
        <p>О вас: {{$about}}</p>
    @else
        <p>О вас: информация отсутствует</p>
    @endif
    <h3>Ваши заявки:</h3>
    @if($advs)
        @foreach ($advs as $adv)
            <a href="/adverts/{{$adv->id}}" class="job-link">
                <article class="job-listing type-webdesign" type="{{$adv->type}}">
                    <h2>{{$adv->name}}</h2>
                    <p>{{$adv->price}}</p>
                    <a href="profile/advdelete/{{$adv->id}}">Удалить</a>
                </article>
            </a>
        @endforeach
    @endif
    <h3>Ваши объявления:</h3>
    @if($FLPubs)
    @foreach ($FLPubs as $FLPub)
    <a href="/freelancers/{{$FLPub->id}}" class="job-link">
        <article class="job-listing type-webdesign" type="{{$FLPub->type}}">
            <h2>{{$FLPub->name}}</h2>
            <p>{{$FLPub->minprice}} - {{$FLPub->maxprice}}</p>
            <a href="profile/flpubdelete/{{$FLPub->id}}">Удалить</a>
        </article>
    </a>
    @endforeach
    @endif
    
</body>
</html>