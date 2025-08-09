<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: ../admin/dashboard.php");
    } else {
        echo "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>লগইন | অ্যাগ্রো ফার্ম</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar (reuse from index.html) -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-left">অ্যাগ্রো ফার্ম</div>
            <div class="navbar-center">
                <ul>
                    <li><a href="index.html">হোম</a></li>
                    <li><a href="about.html">আমাদের সম্পর্কে</a></li>
                    <li><a href="services.html">সেবা</a></li>
                    <li><a href="virtual-tour.html">ভার্চুয়াল ট্যুর</a></li>
                    <li><a href="events.html">ইভেন্ট</a></li>
                    <li><a href="contact.html">যোগাযোগ</a></li>
                </ul>
            </div>
            <div class="navbar-right">
                <button class="login-btn" disabled>লগইন</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-heading">লগইন করুন</h1>
        <form class="login-form" action="#" method="post" autocomplete="off">
            <label for="username">ইউজারনেম</label>
            <input type="text" id="username" name="username" required>

            <label for="password">পাসওয়ার্ড</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="login-btn" style="width:100%;">লগইন</button>
        </form>
    </div>
</body>
</html>