<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

require 'php/config.php';
include 'adminHeader.php';
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>কর্মচারীর বেতন তালিকা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8f5;
        }
        .table thead {
            background-color: teal;
            color: white;
        }
        .table tfoot {
            background-color: #e6f2ef;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h4 class="text-center text-success mb-4">কর্মচারীর বেতন তালিকা</h4>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ক্রমিক</th>
                <th>নাম</th>
                <th>ফোন</th>
                <th>বেতন (টাকা)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->prepare("SELECT full_name, phone, salary FROM employee_info ORDER BY full_name ASC");
            $stmt->execute();
            $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sl = 1;
            $total_salary = 0;
            foreach ($employees as $row):
                $total_salary += $row['salary'];
            ?>
                <tr>
                    <td><?= $sl++; ?></td>
                    <td><?= htmlspecialchars($row['full_name']); ?></td>
                    <td><?= htmlspecialchars($row['phone']); ?></td>
                    <td><?= number_format($row['salary'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end">মোট বেতন:</td>
                <td><?= number_format($total_salary, 2); ?> ৳</td>
            </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
