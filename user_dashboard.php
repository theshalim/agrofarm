<?php
session_start();

// ✅ check if user is logged in
if (!isset($_SESSION['user']) || !isset($_SESSION['user_role'])) {
    header("Location: login.php");
    exit();
}

// ✅ check if the user is admin
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
            text-align: center;
        }
        h1 {
            color: #00695c;
        }
        .welcome {
            margin-top: 20px;
            font-size: 18px;
        }
        .info-msg {
            margin-top: 15px;
            font-size: 16px;
            color: #444;
            background: #e0f2f1;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #b2dfdb;
        }
        .btn {
            display: inline-block;
            margin: 15px 10px 0 10px;
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
        .btn:hover {
            background-color: #004d40;
        }
        .logout-btn {
            display: block;
            margin: 30px auto 0 auto;
            padding: 12px 25px;
            font-size: 16px;
            background-color: #004d40;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .logout-btn:hover {
            background-color: #9f01cfff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>নরমাল ইউজার ড্যাশবোর্ড</h1>
    <p class="welcome">আপনাকে স্বাগতম, <?php echo htmlspecialchars($user['name']); ?>!</p>

    <div class="info-msg">
        শুধুমাত্র এডমিন থেকে নির্দিষ্ট রোলের অ্যাক্সেস পাওয়ার পর আপনি এডমিন ড্যাশবোর্ড ভিজিট করতে পারবেন।
        এর আগে আপনি শুধু হোম পেজ দেখতে পারবেন অথবা যোগাযোগ পৃষ্ঠায় গিয়ে এডমিনের সাথে যোগাযোগ করতে পারবেন।
    </div>

    <a href="index.php" class="btn">হোম পেজ ঘুরে দেখুন!</a>
    <a href="contact.php" class="btn">যোগাযোগ করুন!</a>

    <a href="logout.php" class="logout-btn">লগআউট করুন!</a>
</div>

</body>
</html>
