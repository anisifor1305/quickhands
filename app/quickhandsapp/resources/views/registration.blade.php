<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <a href="/">Главная</a>
        <div class="main">
        <h2>Регистрация</h2>
        <form action="" method='POST'>
            @csrf
            <label for="first">Имя:</label>
            <input type="text" id="first" name="firstname" required />

            <label for="last">Фамилия</label>
            <input type="text" id="last" name="lastname" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
            @if($invalidDataPWD)
                <p>Пароль ненадежный</p>
            @endif
            @if($invalidDataLogin)
                <p>Логин введен в неверном формате</p>
            @endif
            @if($error)
                <p>Ошибка: {{ $error }}</p>
            @endif
            <label for="repassword">Имя пользователя:</label>
            <input id="login" name="login" required />
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password"
                   pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" 
                   title="Password must contain at least one number, 
                           one alphabet, one symbol, and be at 
                           least 8 characters long" required />
            <!-- <input type="password" id="password" name="password" required /> -->


            <label for="gender">Пол:</label>
            <select id="gender" name="gender" required>
                <option value="male">
                    Мужской
                </option>
                <option value="female">
                    Женский
                </option>
            </select>

            <button type="submit">
                Submit
            </button>
                    <p>Аккаунт уже существует?        <a href="/auth" style="text-decoration: none;">Log in</a></p>
        </p>
        </form>
    </div>
</body>
</html>