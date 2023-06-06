<!-- login.php (View) -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <!-- Create a login form -->
    <form action="<?= site_url('login/authenticate') ?>" method="POST">
        <!-- Add form fields for username and password -->
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <!-- Add a submit button -->
        <button type="submit">Login</button>
    </form>
</body>
</html>
