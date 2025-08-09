<?php
session_start();
require 'php/config.php';
$conn = new mysqli($host, $user, $pass, $db);
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php"); exit();
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include('adminHeader.php'); ?>
    <meta charset="UTF-8">
    <title>মাছ তালিকা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e6f4f1; font-family: 'Noto Sans Bengali', sans-serif; }
        .teal-header { background-color: #008080; color: white; }
        .summary-box { background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="teal-header p-2 rounded">মাছ তালিকা</h4>
        <a href="fish_inventory.php" class="btn btn-secondary">← ফিরে যান</a>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="table-responsive bg-white rounded shadow">
                <table class="table table-bordered">
                    <thead style="background-color:#008080;color:#fff;">
                        <tr>
                            <th>আইডি</th><th>বর্ণনা</th><th>ক্রয়</th><th>বিক্রয়</th><th>অবস্থা</th>
                            <th>দিন</th><th>খরচ</th><th>লাভ/ক্ষতি</th><th>মন্তব্য</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $res = $conn->query("SELECT * FROM fish_inventory ORDER BY id DESC");
                        while ($row = $res->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['fish_id']}</td>
                                <td>{$row['name_description']}</td>
                                <td>{$row['purchase_price']}৳</td>
                                <td>{$row['sale_price']}৳</td>
                                <td>{$row['status']}</td>
                                <td>{$row['total_days']} দিন</td>
                                <td>{$row['total_cost']}৳</td>
                                <td style='color:" . ($row['profit_loss'] >= 0 ? "green" : "red") . "'>{$row['profit_loss']}৳</td>
                                <td>{$row['notes']}</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="summary-box">
                <h5>📊 সারসংক্ষেপ</h5>
                <?php
                $summary = $conn->query("SELECT 
                    COUNT(*) AS total, 
                    SUM(purchase_price) AS purchase, 
                    SUM(sale_price) AS sale, 
                    SUM(feed_cost) AS feed, 
                    SUM(medicine_cost) AS medicine,
                    SUM(labor_cost) AS labor,
                    SUM(other_cost) AS other,
                    SUM(profit_loss) AS profit
                    FROM fish_inventory");
                $row = $summary->fetch_assoc();
                ?>
                <p>মোট মাছ: <?= $row['total'] ?></p>
                <p>ক্রয় মূল্য: <?= $row['purchase'] ?>৳</p>
                <p>বিক্রয় মূল্য: <?= $row['sale'] ?>৳</p>
                <p>খাবার খরচ: <?= $row['feed'] ?>৳</p>
                <p>চিকিৎসা + শ্রমিক + অন্যান্য: <?= $row['medicine'] + $row['labor'] + $row['other'] ?>৳</p>
                <hr>
                <strong>মোট লাভ/ক্ষতি: <?= $row['profit'] ?>৳</strong>
            </div>
        </div>
    </div>
</div>
</body>
</html>
