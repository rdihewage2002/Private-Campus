<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tel_no = $_POST['tel_no'];
    $course = $_POST['course'];

    $conn = new mysqli('localhost', 'root', '', 'private_campus');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO students (nic, name, address, tel_no, course) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nic, $name, $address, $tel_no, $course);
    if ($stmt->execute()) {
        $success = "Student registered successfully.";
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="container">
                <h1>Horizon Valley University</h1>
                <nav>
                    <a href="login.php">Login</a>
                    
                </nav>
            </div>
        </header>
        <form method="post" action="register.php">
            <h2>Student Registration</h2>
            <?php if (isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
            <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <label for="tel_no">Tel. no:</label>
            <input type="tel" id="tel_no" name="tel_no" required>
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required>
            <button type="submit" class="button">Register</button>
        </form>
    </div>
    
</body>
</html>
