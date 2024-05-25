<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "school";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL UNIQUE,
    role VARCHAR(20) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS enrollments (
    enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    course_id INT NOT NULL,
    grade VARCHAR(5)
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS assignments (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    assignment_name VARCHAR(100) NOT NULL,
    deadline DATE NOT NULL,
    file_path VARCHAR(255)
)";
$conn->query($sql);

$courses = ['Digital Forensics', 'Cryptography', 'Network Security', 'Cloud Security', 'Risk Management'];
foreach ($courses as $course) {
    $conn->query("INSERT INTO courses (course_name) VALUES ('$course')");
}

$conn->close();
?>
