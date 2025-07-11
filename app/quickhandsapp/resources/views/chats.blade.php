<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Чаты</h3>
    @foreach ($dialogs as $dialog)
        <a href="/chats/{{$dialog}}" class="job-link">
            <article class="job-listing type-webdesign">
                <h2>{{$dialog}}</h2>
            </article>
        </a>
    @endforeach
</body>
</html>