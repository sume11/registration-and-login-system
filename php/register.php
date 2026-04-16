<?php

$conn = new mysqli("localhost", "root", "", "test_db", 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$department = $_POST['department'];
$gender = $_POST['gender'];
$others = $_POST['others'];
$username = $_POST['username'];
$password = $_POST['password'];

$hobbies = "";
if (isset($_POST['hobbies'])) {
    $hobbies = implode(",", $_POST['hobbies']);
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users 
(firstname, lastname, department, gender, hobbies, others, username, password)
VALUES 
('$firstname','$lastname','$department','$gender','$hobbies','$others','$username','$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registered successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>