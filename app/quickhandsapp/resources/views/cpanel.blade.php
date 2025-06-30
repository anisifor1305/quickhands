<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPanel QuickHands</title>
</head>
<body>
    <h1>Панель модератора</h1>
    <h2>Объявления, поступишвие на проверку:</h2>
    <p>...</p>
    <h1>Контроль вывода средств</h1>
    <p>...</p>
    <h2>Назначение прав пользователю</h2>
    <h3>Снять лимит объявлений</h3>
    <p>....</p>
    <h1>Забанить пользователя</h1>
    <form action="/banuser" method="post">
        @csrf
        <label for="userid">ID пользователя:</label><br>
        <input type="number" id="userid" name="userid"><br><br>
        <button type="submit">Забанить</button>
    </form>
    <h1>Разбанить пользователя</h1>
    <form action="/unbanuser" method="post">
        @csrf
        <label for="userid">ID пользователя:</label><br>
        <input type="number" id="userid" name="userid"><br><br>
        <button type="submit">Разбанить</button>
    </form>
</body>
</html>