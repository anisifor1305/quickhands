<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Отклики на эту заявку</h3>
    @if($replies)
    @foreach ($replies as $reply)
    <article class="job-listing type-webdesign">
        <p>{{$reply->price}}</p>
        <p>{{$reply->text}}</p>

    </article>
    @endforeach
    @endif
</body>
</html>