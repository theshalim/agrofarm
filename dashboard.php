<?php
session_start();

// ✅ Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// ✅ Check if user is admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Normal users cannot access admin dashboard
    header("Location: user_dashboard.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .dashboard-heading {
            text-align: center;
            color: teal;
            margin-bottom: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            background-color: #e0f2f1;
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card a {
            text-decoration: none;
            color: teal;
            font-size: 1.1em;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php include 'adminHeader.php'; ?>

<div class="dashboard-container">
    <div class="grid">
        <div class="card"><a href="inventory.php">ইনভেন্টরি ম্যানেজমেন্ট</a></div>
        <div class="card"><a href="counts.php">হোম পেজের কাউন্ট</a></div>
        <div class="card"><a href="accounting.php">অ্যকাউন্টিং ম্যানেজমেন্ট</a></div>
        <div class="card"><a href="employees.php">ইম্প্লয়ী ম্যানেজমেন্ট</a></div>
        <div class="card"><a href="reports.php">রিপোর্ট দেখুন</a></div>
        <div class="card"><a href="e-commerce-dashboard.php">ইকমার্স পণ্যসমূহ</a></div>
        <div class="card"><a href="users.php">ইউজার ম্যানেজমেন্ট</a></div>
        <div class="card"><a href="notifications.php">ম্যাসেজ দেখুন</a></div>
        <div class="card"><a href="backup.php">ব্যাকআপ/রিস্টোর নিন</a></div>
        <div class="card"><a href="settings.php">সেটিংস ঠিক করুন</a></div>
    </div>
</div>

</body>
</html>
<?php include 'footer.php'; ?>