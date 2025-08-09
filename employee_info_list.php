<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include 'adminHeader.php';
require 'php/config.php';

// Fetch all employee records
$stmt = $conn->prepare("SELECT * FROM employee_info ORDER BY id DESC");
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee List | আমাদের এগ্রো ফার্ম</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h4 class="mb-4 text-center text-success">কর্মচারীর তালিকা</h4> 
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>আইডি</th>
                <th>কর্মচারীর নাম</th>
                <th>পদবি</th>
                <th>যোগদানের তারিখ</th>
                <th>ফোন</th>
                <th>স্ট্যাটাস</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $emp): ?>
                <tr>
                    <td><?= $emp['id'] ?></td>
                    <td><?= htmlspecialchars($emp['full_name']) ?></td>
                    <td><?= htmlspecialchars($emp['designation']) ?></td>
                    <td><?= $emp['join_date'] ?></td>
                    <td><?= $emp['phone'] ?></td>
                    <td>
                        <span class="badge <?= $emp['status'] == 'Active' ? 'bg-success' : 'bg-danger' ?>">
                            <?= $emp['status'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="employee_info_edit.php?id=<?= $emp['id'] ?>" class="btn btn-sm btn-primary">এডিট করুন</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (count($employees) == 0): ?>
                <tr>
                    <td colspan="7" class="text-center text-danger">কোনো কর্মচারীর তথ্য পাওয়া যায়নি!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<div class="text-end">
        <a href="employee_info.php" class="btn btn-success">নতুন কর্মচারী অ্যাড করুন</a>
    </div>

</div>
</body>
</html>
