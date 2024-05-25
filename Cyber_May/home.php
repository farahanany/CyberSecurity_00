<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SESSION['role'] == 'student') {
    header("Location: student_home.php");
} elseif ($_SESSION['role'] == 'teacher') {
    header("Location: teacher_home.php");
} elseif ($_SESSION['role'] == 'admin') {
    header("Location: admin_home.php");
}
?>
