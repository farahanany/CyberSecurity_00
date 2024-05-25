<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM enrollments JOIN courses ON enrollments.course_id = courses.course_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, Admin</h2>
        <h3>All Enrollments</h3>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li><?php echo $row['course_name']; ?> - Student ID: <?php echo $row['user_id']; ?> - Grade: <?php echo $row['grade']; ?></li>
            <?php endwhile; ?>
        </ul>
        <a href="change_password.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
