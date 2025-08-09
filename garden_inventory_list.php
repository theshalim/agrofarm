<?php
session_start();
require 'php/config.php';
$conn = new mysqli($host, $user, $pass, $db);
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php"); exit();
}

// Fetch data
$result = $conn->query("SELECT * FROM garden_inventory ORDER BY planting_date DESC");

// Summary calculations
$summary = [
    'total_items' => 0,
    'total_cost' => 0,
    'total_sale' => 0,
    'total_profit' => 0,
];
while ($row = $result->fetch_assoc()) {
    $summary['total_items']++;
    $summary['total_cost'] += $row['total_cost'];
    $summary['total_sale'] += $row['sale_price'];
    $summary['total_profit'] += $row['profit_loss'];
    $records[] = $row;
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include('adminHeader.php'); ?>
    <meta charset="UTF-8">
    <title>বাগান ইনভেন্টরি তালিকা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e6f4f1; font-family: 'Noto Sans Bengali', sans-serif; }
        .teal-header { background-color: #008080; color: white; }
        .teal-btn { background-color: #008080; color: white; }
        .teal-btn:hover { background-color: #006666; }
        .summary-box {
            background-color: #fff;
            border-left: 5px solid teal;
            padding: 20px;
            margin-top: 10px;
            box-shadow: 0 0 10px #ccc;
        }
    </style>
</head>
<body>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="teal-header p-2 rounded">বাগান ইনভেন্টরি তালিকা</h4>
        <a href="garden_inventory.php" class="btn btn-secondary">⬅️ এন্ট্রি পেইজ</a>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="table-responsive bg-white p-3 rounded shadow">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-success text-center">
                        <tr>
                            <th>আইডি</th>
                            <th>নাম</th>
                            <th>শ্রেণী</th>
                            <th>রোপণ</th>
                            <th>ফসল</th>
                            <th>পরিমাণ</th>
                            <th>একক</th>
                            <th>মোট খরচ</th>
                            <th>বিক্রি মূল্য</th>
                            <th>লাভ/ক্ষতি</th>
                            <th>অবস্থা</th>
                            <th>✏️</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($records)) {
                        foreach ($records as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['garden_id']) ?></td>
                                <td><?= htmlspecialchars($row['item_name']) ?></td>
                                <td><?= $row['category'] ?></td>
                                <td><?= $row['planting_date'] ?></td>
                                <td><?= $row['harvest_date'] ?: '-' ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= $row['unit'] ?></td>
                                <td><?= $row['total_cost'] ?> ৳</td>
                                <td><?= $row['sale_price'] ?> ৳</td>
                                <td><?= $row['profit_loss'] ?> ৳</td>
                                <td><?= $row['status'] ?></td>
                                <td><a href="garden_inventory.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a></td>
                            </tr>
                        <?php endforeach;
                    } else { ?>
                        <tr><td colspan="12" class="text-center text-danger">কোন তথ্য পাওয়া যায়নি</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="summary-box">
                <h5>📊 সারাংশ</h5>
                <p><strong>মোট আইটেম:</strong> <?= $summary['total_items'] ?></p>
                <p><strong>মোট খরচ:</strong> <?= number_format($summary['total_cost'], 2) ?> ৳</p>
                <p><strong>মোট বিক্রি:</strong> <?= number_format($summary['total_sale'], 2) ?> ৳</p>
                <p><strong>মোট লাভ/ক্ষতি:</strong> <?= number_format($summary['total_profit'], 2) ?> ৳</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
