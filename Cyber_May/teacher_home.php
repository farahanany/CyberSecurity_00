<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM enrollments JOIN courses ON enrollments.course_id = courses.course_id WHERE courses.course_id IN (SELECT course_id FROM enrollments WHERE user_id='$user_id')";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, Teacher</h2>
        <h3>Your Courses</h3>
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
