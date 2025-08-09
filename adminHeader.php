<?php
// সেশন শুরু (যদি আগেই না হয়ে থাকে)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// লগইন চেক
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>আমাদের এগ্রো ফার্ম - অ্যাডমিন</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
        }

        .topbar {
            background-color: #00796b;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            position: relative;
        }

        .topbar .farm-name {
            font-size: 20px;
            font-weight: bold;
        }

        .topbar .dashboard-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 20px;
            font-weight: bold;
        }

        .topbar .actions a {
            text-decoration: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            margin-left: 10px;
            background-color: #009688;
            display: inline-block;
            font-weight: bold;
            transition: 0.3s;
        }

        .topbar .actions a:hover {
            background-color: #004d40;
        }

        .dashboard-title {
            color: white;
            text-decoration: none;
        }

        .dashboard-title:hover {
            text-decoration: underline;
            cursor: pointer;
        }
        .dashboard-title:hover {
        color: #007BFF;
        text-decoration: underline;
}
    </style>
</head>
<body>

<div class="topbar">
    <div class="farm-name">আমাদের এগ্রো ফার্ম🌾</div>


<a href="dashboard.php" class="dashboard-title" style="text-decoration: none; color: #ffffffff; border:#009688 solid 3px;  border-radius: 5px; padding: 5px 10px;">অ্যাডমিন ড্যাশবোর্ড</a>

    <div class="actions">
        <a href="index.php" target="_blank">পাবলিক সাইট দেখুন</a>
        <a href="logout.php">লগআউট</a>
    </div>
</div>
