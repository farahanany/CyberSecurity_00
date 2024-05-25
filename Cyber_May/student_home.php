<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM enrollments JOIN courses ON enrollments.course_id = courses.course_id WHERE user_id='$user_id'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, Student</h2>
        <h3>Your Courses</h3>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li><?php echo $row['course_name']; ?> - Grade: <?php echo $row['grade']; ?></li>
            <?php endwhile; ?>
        </ul>
        <a href="change_password.php">Change Password</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
