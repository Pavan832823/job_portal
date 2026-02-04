<?php
include "db.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email='$email'");
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['username'] = $user['firstname'];
    $_SESSION['photo'] = $user['photo'];
    $_SESSION['resume'] = $user['resume'];

    header("Location: ../index.php");
} else {
    echo "Invalid login credentials";
}
?>
