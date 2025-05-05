<?php
session_start();

$conn = new mysqli("localhost", "root", "", "login_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, full_name, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $full_name, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = $full_name;

            header("Location: home.php");
            exit();
        } else {
            echo "❌ Wrong Password!";
        }
    } else {
        echo "❌ Username not found!";
    }

    $stmt->close();
}

$conn->close();
?>
