<?php
// signupphp.php

$conn = new mysqli("localhost", "root", "", "login_system");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (full_name, email, username, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $email, $username, $password);

if ($stmt->execute()) {
    header("Location: login.html");
    exit();
} else {
    echo "❌ Gagal registrasi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
