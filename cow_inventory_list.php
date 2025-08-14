<?php
session_start();
require 'php/config.php';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM cow_inventory ORDER BY id DESC");

// Summary calculations
$total_cows = 0;
$total_buy = 0;
$total_sell = 0;
$total_running = 0;
$total_feed = 0;
$total_medicine = 0;
$total_labor = 0;
$total_other = 0;
$total_profit = 0;

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
    $total_cows++;
    $total_buy += $row['purchase_price'];
    $total_sell += $row['sale_price'];
    if ($row['status'] == 'জীবিত') $total_running++;
    $total_feed += $row['feed_cost'];
    $total_medicine += $row['medicine_cost'];
    $total_labor += $row['labor_cost'];
    $total_other += $row['other_cost'];
    $total_profit += $row['profit_loss'];
}

$total_maintain = $total_feed + $total_medicine + $total_labor + $total_other;
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include('adminHeader.php'); ?>
    <meta charset="UTF-8">
    <title>গরু ইনভেন্টরি তালিকা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e6f4f1; font-family: 'Noto Sans Bengali', sans-serif; }
     
        .summary-box { background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.1); }
        .back-btn { background-color: #008080; color: white; }
        .back-btn:hover { background-color: #006666; }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="teal-header p-3 rounded">গরুর তালিকা</h4>
        <a href="cow_inventory.php" class="btn back-btn">← নতুন গরু এন্ট্রি</a>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="table-responsive bg-white rounded shadow">
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th>আইডি</th>
                            <th>বর্ণনা</th>
                            <th>ক্রয় মূল্য</th>
                            <th>বিক্রয় মূল্য</th>
                            <th>অবস্থা</th>
                            <th>মোট দিন</th>
                            <th>মোট খরচ</th>
                            <th>লাভ/ক্ষতি</th>
                            <th>মন্তব্য</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <td><?= $row['cow_id'] ?></td>
                                <td><?= $row['name_description'] ?></td>
                                <td><?= $row['purchase_price'] ?>৳</td>
                                <td><?= $row['sale_price'] ?>৳</td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['total_days'] ?> দিন</td>
                                <td><?= $row['total_cost'] ?>৳</td>
                                <td style="color:<?= ($row['profit_loss'] >= 0 ? 'green' : 'red') ?>"><?= $row['profit_loss'] ?>৳</td>
                                <td><?= $row['notes'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-3">
            <div class="summary-box">
                <h5 class="text-center text-success">📊 সারাংশ</h5>
                <p>মোট গরু: <?= $total_cows ?></p>
                <p>ক্রয় মূল্য: <?= $total_buy ?>৳</p>
                <p>বিক্রয় মূল্য: <?= $total_sell ?>৳</p>
                <p>চলমান গরু: <?= $total_running ?></p>
                <p>রেগুলার মেইন্টেনেন্স: <?= $total_maintain ?>৳</p>
                <p>খাবার খরচ: <?= $total_feed ?>৳</p>
                <p>আয় / ক্ষতি: <span style="color:<?= ($total_profit >= 0 ? 'green' : 'red') ?>"><?= $total_profit ?>৳</span></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php include 'footer.php'; ?>
