<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$full_name = $_SESSION['full_name'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
            background: url('cat1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .glass-box {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 20px 30px;
            border-radius: 20px;
            margin: auto;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            color: #000;
        }

        .header, .footer {
            text-align: center;
            padding: 15px;
            font-weight: bold;
            color: #fff;
        }

        .header {
            background: rgba(0, 0, 0, 0.4);
            border-bottom: 2px solid rgba(255,255,255,0.3);
        }

        .footer {
            background: rgba(0, 0, 0, 0.4);
            border-top: 2px solid rgba(255,255,255,0.3);
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .home-box {
            margin-top: 100px;
            max-width: 500px;
            text-align: center;
        }

        .btn {
            border-radius: 50px;
            background-color: white;
            color: black;
            font-weight: bold;
            border: 2px solid black;
            transition: 0.3s;
            padding: 10px 25px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: black;
            color: white;
        }

        h2 {
            font-weight: bold;
        }

        strong {
            color: #333;
        }
    </style>
</head>
<body>

    <div class="header glass-box">
        🐾 CatZone | Home Page
    </div>

    <div class="home-box glass-box">
        <h2>Welcome, <?= htmlspecialchars($full_name) ?>!</h2>
        <p>You are logged in as <strong><?= htmlspecialchars($username) ?></strong>.</p>
        <a href="logout.php" class="btn">Logout</a>
    </div>

    <div class="footer glass-box">
        &copy; <?= date("Y") ?> CatZone.
    </div>

</body>
</html>
