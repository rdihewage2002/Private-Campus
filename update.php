<?php
$conn = new mysqli('localhost', 'root', '', 'private_campus');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $nic = $_POST['nic'];
    $result = $conn->query("SELECT * FROM students WHERE nic='$nic'");
    $student = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $nic = $_POST['nic'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tel_no = $_POST['tel_no'];
    $course = $_POST['course'];

    $stmt = $conn->prepare("UPDATE students SET name=?, address=?, tel_no=?, course=? WHERE nic=?");
    $stmt->bind_param("sssss", $name, $address, $tel_no, $course, $nic);
    if ($stmt->execute()) {
        $success = "Student details updated successfully.";
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
    <title>Update Student</title>
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
        <form method="post" action="update.php">
            <h2>Update Student</h2>
            <?php if (isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
            <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required>
            <button type="submit" class="button">Search</button>
        </form>
        <?php if (isset($student)) { ?>
            <form method="post" action="update.php">
                <input type="hidden" name="nic" value="<?php echo $student['nic']; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $student['address']; ?>" required>
                <label for="tel_no">Tel. no:</label>
                <input type="tel" id="tel_no" name="tel_no" value="<?php echo $student['tel_no']; ?>" required>
                <label for="course">Course:</label>
                <input type="text" id="course" name="course" value="<?php echo $student['course']; ?>" required>
                <button type="submit" class="button">Update</button>
            </form>
        <?php } ?>
    </div>
    
</body>
</html>
