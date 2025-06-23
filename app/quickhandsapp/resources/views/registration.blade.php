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
        <h2>Registration Form</h2>
        <form action="" method='POST'>
            @csrf
            <label for="first">First Name:</label>
            <input type="text" id="first" name="firstname" required />

            <label for="last">Last Name:</label>
            <input type="text" id="last" name="lastname" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
                        
            <label for="repassword">Login:</label>
            <input id="login" name="login" required />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"
                   pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" 
                   title="Password must contain at least one number, 
                           one alphabet, one symbol, and be at 
                           least 8 characters long" required />

            <label for="mobile">Contact:</label>
            <input type="text" id="mobile" name="mobile" maxlength="10" required />

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">
                    Male
                </option>
                <option value="female">
                    Female
                </option>
            </select>

            <button type="submit">
                Submit
            </button>
                    <p>Account is exists?
            <a href="/auth" style="text-decoration: none;">
                Log in
            </a>
        </p>
        </form>
    </div>
</body>
</html>