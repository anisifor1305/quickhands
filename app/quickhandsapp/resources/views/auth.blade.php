<!DOCTYPE html>
<html>

<head>
    <title>HTML Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="/">Главная</a>
    <div class="main">
        <h1>QuickHands</h1>
        <h3>Enter your login credentials</h3>

        <form action="" method='POST'>
            @csrf
            @if($invalidData)
                <p>Неверный логин или пароль</p>
            @endif
            <label for="first">
                Username:
            </label>
            <input type="text" id="first" name="login" 
                placeholder="Enter your Username" required>

            <label for="password">
                Password:
            </label>
            <input type="password" id="password" name="password" 
                placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">
                    Submit
                </button>
            </div>
        </form>
        
        <p>Not registered?
            <a href="/reg" style="text-decoration: none;">
                Create an account
            </a>
        </p>
    </div>
</body>

</html>