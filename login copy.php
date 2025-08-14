<?php
session_start();
require 'php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        $_SESSION['admin_logged_in'] = true;// ✅ এই লাইনটি যোগ করা হয়েছে
        echo "<p class='success-msg'>লগইন সফল! কিছুক্ষণের মধ্যে আপনি রিডিরেক্ট হবেন...</p>";
        echo "<script>
            setTimeout(function() {
                window.location.href = 'dashboard.php';
            }, 1500);
        </script>";
    } else {
        echo "<p class='error-msg'>ইমেইল অথবা পাসওয়ার্ড ভুল!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>লগইন</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #e0f2f1, #f1f8f6);
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 400px;
            width: 90%;
            margin: 70px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 150, 136, 0.2);
        }

        .page-heading {
            text-align: center;
            font-size: 26px;
            color: #00695c;
            margin-bottom: 25px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .login-form label {
            font-weight: 600;
            color: #333;
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .login-form input[type="email"]:focus,
        .login-form input[type="password"]:focus {
            border-color: #26a69a;
            outline: none;
            box-shadow: 0 0 6px rgba(38, 166, 154, 0.3);
        }

        .login-btn {
            display: block;
            margin: 0 auto;
            background-color: #00796b;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background-color: #004d40;
        }

        .login-extra {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-extra a {
            color: #00796b;
            text-decoration: none;
        }

        .login-extra a:hover {
            text-decoration: underline;
        }

        .success-msg, .error-msg {
            max-width: 400px;
            margin: 20px auto;
            padding: 12px;
            text-align: center;
            border-radius: 6px;
        }

        .success-msg {
            background-color: #c8e6c9;
            color: #2e7d32;
        }

        .error-msg {
            background-color: #ffcdd2;
            color: #c62828;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="page-heading">লগইন পোর্টাল</h1>
        <form class="login-form" action="#" method="post" autocomplete="off">
            <label for="email">ইমেইল</label>
            <input type="email" id="email" name="email" required>

            <label for="password">পাসওয়ার্ড</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="login-btn">লগইন</button>
        </form>
        <div class="login-extra">
            <p>নতুন সদস্য? <a href="register.php">নতুন রেজিস্ট্রেশন করুন</a></p>
            <p>পাসওয়ার্ড ভুলে গেছেন? <a href="contact.php">অ্যাডমিনের সাথে যোগাযোগ করুন</a></p>
        </div>
    </div>

</body>
</html>
