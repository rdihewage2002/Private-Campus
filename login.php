<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'password') {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
    } else {
        $error = 'Invalid credentials';
    }
}
?>
<html>
<head>
<style>
      .form-container {
    background: rgba(178, 68, 124, 0.8); 
   
}

    </style>

    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-image: url('images/background.png'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            background-position: center; 
        }
        
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="container">
                <h1>Horizon Valley University</h1>
                <nav>
                    <a href="register.php">Register</a>
                </nav>
            </div>
        </header>
        <form method="post" action="login.php">
            <h2>Login</h2>
            <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="button">Login</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Horizon Valley University. All rights reserved.</p>
        <p>123, University Avenue, Sri Lanka. </p>
        <p>Contact us: info@hvu.edu | +94 714 567 890</p>
    </footer>
</body>
</html>
