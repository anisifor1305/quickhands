<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!-- Заголовок -->
    <header>
        <h1>Quickhands</h1>
    </header>
    <p>Ваш баланс: {{ $balance }}</p>
    <a href="/profile">Профиль</a>
    <!-- Описание биржи -->
    <a href="/logout" style="text-decoration: none;">
            Logout
    </a>
    <p> <a href="/adverts">Предложения заказчиков</a>   <a href="/employer">Найти исполнителя</a></p>
    <section id="description">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae ante a tellus malesuada convallis eu in est.</p>
    </section>
    
    <!-- Подразделения -->
    <main>
        <div class="services">
            <a href="/employer">Я заказчик</a>
            <a href="/adverts">Я фрилансер</a>
        </div>
        
        <!-- Контент заказчика -->
        <section id="employer">
            <h2>Заказчикчикам</h2>
            <p>Vestibulum tincidunt leo vel sapien fringilla, et blandit justo congue. Sed ultrices efficitur lacus non rutrum.</p>
            <h2>Исполнителям</h2>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus pharetra nulla quis nisl rhoncus accumsan.</p>
        </section>
    </main>
    
    <!-- Юридическая информация внизу страницы -->
    <footer>
        <small>&copy; 2025 Lorem Ipsum Freelance Marketplace. Все права защищены.</small>
    </footer>
</body>
</html>