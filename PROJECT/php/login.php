<?php

session_start();

$conn = new mysqli("localhost", "root", "", "test_db",3307);

if ($conn->connect_error) {
    die("Connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        echo "Login successful!";
    } else {
        header("Location: ../login.html");
        exit();
    } 
} else {
    echo "User not found!";
}

$conn->close();
?>