<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/replies/{{$id}}/new" method="post">
        @csrf
        <label for="price">Цена:</label><br>
        <input type="number" id="price" name="price" required min="0"><br>
        
        <label for="response_text">Текст отклика:</label><br>
        <textarea id="text" name="text" rows="4" cols="50" required></textarea><br>
        
        <button type="submit">Отправить отклик</button>
    </form>
</body>
</html>