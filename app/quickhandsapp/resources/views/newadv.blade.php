<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Ваш баланс {{ $balance }}</p>
    <a href="/">Главная</a>
    <h1>Создать объявление</h1>
    
    <form action="#" method="post">
        @csrf
        
        <!-- Название -->
        <label for="title">Название:</label><br>
        <input type="text" id="title" name="name" maxlength="80" required placeholder="Максимум 80 символов"><br><br>
        
        <!-- Описание -->
        <label for="description">Описание:</label><br>
        <textarea id="description" name="lore" rows="5" cols="50" maxlength="1000" required></textarea><br><br>
        
        <!-- Категория -->
        <label for="category">Категория:</label><br>
        <select id="type" name="type" required>
            <option value="">Выберите категорию...</option>
            <option value="web-development">Веб-разработка</option>
            <option value="mobile-app">Разработка мобильных приложений</option>
            <option value="design-ui">Дизайн интерфейсов</option>
            <option value="seo">SEO-продвижение</option>
            <option value="content-marketing">Контент-маркетинг</option>
            <option value="server-administration">Администрирование серверов</option>
            <option value="testing">Тестирование ПО</option>
            <option value="api-integration">Программирование API / Интеграция</option>
            <option value="cybersecurity">Кибербезопасность</option>
            <option value="data-analysis">Аналитика данных</option>
            <option value="tech-consulting">Консалтинг в сфере технологий</option>
            <option value="other">Другое</option>
        </select><br><br>
        
        <!-- Цена -->
        <!-- <label for="price-type">Тип цены:</label><br>
        <input type="radio" id="fixed-price" name="price_type" value="fixed" required>
        <label for="fixed-price">Фиксированная сумма</label><br>
        <input type="radio" id="hourly-rate" name="price_type" value="hourly" required>
        <label for="hourly-rate">Почасовая ставка</label><br><br>
         -->
        <label for="price">Стоимость:</label><br>
        <input type="number" id="price" name="price" min="0" step="0.01" required placeholder="Сумма в рублях"><br><br>
        
        <!-- Отправка -->
        <button type="submit">Опубликовать объявление</button>
    </form>
</body>
</html>