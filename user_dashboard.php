<?php
session_start();

// ✅ check if user is logged in
if (!isset($_SESSION['user']) || !isset($_SESSION['user_role'])) {
    header("Location: login.php");
    exit();
}

// ✅ check if the user is NOT admin
if ($_SESSION['user_role'] === 'admin') {
    header("Location: dashboard.php"); // redirect admin to admin dashboard
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f1f8f6;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 900px;
            width: 95%;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,150,136,0.2);
        }
        h1 {
            text-align: center;
            color: #00695c;
        }
        .welcome {
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
        }
        .logout-btn {
            display: block;
            margin: 30px auto;
            padding: 12px 25px;
            font-size: 16px;
            background-color: #00796b;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .logout-btn:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>নরমাল ইউজার ড্যাশবোর্ড</h1>
    <p class="welcome">স্বাগতম, <?php echo htmlspecialchars($user['name']); ?>!</p>

    <a href="logout.php" class="logout-btn">লগআউট</a>
</div>

</body>
</html>
