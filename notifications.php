<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require 'php/config.php';
include 'adminHeader.php';

// Fetch notifications
$stmt = $conn->query("SELECT * FROM notifications ORDER BY created_at DESC");
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>নোটিফিকেশন তালিকা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f1f9f9; }
        .card-title { color: teal; }
        .notification-card {
            border-left: 5px solid teal;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-success">📢 নোটিফিকেশন তালিকা</h3>
        <a href="dashboard.php" class="btn btn-secondary">⬅️ ড্যাশবোর্ডে ফিরে যান</a>
    </div>

    <?php if (count($notifications) > 0): ?>
        <?php foreach ($notifications as $note): ?>
            <div class="card notification-card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($note['title']) ?></h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($note['message'])) ?></p>
                    <p class="text-muted small">🕒 <?= date('d M Y, h:i A', strtotime($note['created_at'])) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info">কোনো নোটিফিকেশন পাওয়া যায়নি।</div>
    <?php endif; ?>
</div>

</body>
</html>
