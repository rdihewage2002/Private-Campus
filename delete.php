<?php
$conn = new mysqli('localhost', 'root', '', 'private_campus');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];

    $stmt = $conn->prepare("DELETE FROM students WHERE nic=?");
    $stmt->bind_param("s", $nic);
    if ($stmt->execute()) {
        $success = "Student deleted successfully.";
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Student</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="container">
                <h1>Horizon Valley University</h1>
                <nav>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                    <a href="search.php">Search</a>
                    <a href="update.php">Update</a>
                    <a href="delete.php">Delete</a>
                </nav>
            </div>
        </header>
        <form method="post" action="delete.php">
            <h2>Delete Student</h2>
            <?php if (isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
            <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required>
            <button type="submit" class="button">Delete</button>
        </form>
    </div>
   
</body>
</html>
