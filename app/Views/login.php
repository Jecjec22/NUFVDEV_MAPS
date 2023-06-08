<!-- login.php (View) -->
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to MAPS</title>
    <style>
        /* Apply basic styling to the form */
        form {
            width: 300px;
            margin: 0 auto;
        }

        /* Style the labels */
        label {
            display: block;
            margin-bottom: 10px;
        }

        /* Style the input fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        /* Style the submit button */
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
        h1 {
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <h1>Welcome to MAPS</h1>
    
    <!-- Display error message if available -->
    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    
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
