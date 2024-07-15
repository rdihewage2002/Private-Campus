<?php
$conn = new mysqli('localhost', 'root', '', 'private_campus');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];
    $result = $conn->query("SELECT * FROM students WHERE nic='$nic'");
    $student = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Student</title>
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
        <form method="post" action="search.php">
            <h2>Search Student</h2>
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required>
            <button type="submit" class="button">Search</button>
        </form>
        <?php if (isset($student)) { ?>
            <h3>Student Details:</h3>
            <p>Name: <?php echo $student['name']; ?></p>
            <p>Address: <?php echo $student['address']; ?></p>
            <p>Tel. no: <?php echo $student['tel_no']; ?></p>
            <p>Course: <?php echo $student['course']; ?></p>
        <?php } ?>
    </div>
    
</body>
</html>
