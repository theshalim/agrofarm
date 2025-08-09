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
    <title>ছাগল তালিকা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7f7;
        }
        .container {
            margin-top: 30px;
        }
        .btn-custom {
            background-color: teal;
            color: white;
        }
        .btn-custom:hover {
            background-color: #00796b;
        }
        .summary-box {
            background-color: #ffffff;
            border: 1px solid #00bfa5;
            border-radius: 10px;
            padding: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-success">ছাগল ইনভেন্টরি তালিকা</h4>
        <a href="goat_inventory.php" class="btn btn-secondary">⟵ নতুন এন্ট্রি</a>
    </div>

    <div class="row">
        <!-- List Table -->
        <div class="col-md-8">
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-success">
                    <tr>
                        <th>নাম</th>
                        <th>জাত</th>
                        <th>বয়স</th>
                        <th>ওজন</th>
                        <th>ক্রয় মূল্য</th>
                        <th>বিক্রয় মূল্য</th>
                        <th>অবস্থান</th>
                        <th>তারিখ</th>
                        <th>অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $goats = $conn->query("SELECT * FROM goat_inventory ORDER BY id DESC");
                    if ($goats->rowCount() > 0):
                        foreach ($goats as $row):
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['breed']) ?></td>
                        <td><?= htmlspecialchars($row['age']) ?> মাস</td>
                        <td><?= htmlspecialchars($row['weight']) ?> কেজি</td>
                        <td><?= $row['buy_price'] ?>৳</td>
                        <td><?= $row['sell_price'] ?>৳</td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                        <td><?= $row['date'] ?></td>
                        <td>
                            <a href="goat_inventory.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-custom">এডিট</a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">কোনো ডাটা পাওয়া যায়নি</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Summary Section -->
        <div class="col-md-4">
            <div class="summary-box shadow-sm">
                <h5 class="text-center text-success">সারাংশ</h5>
                <?php
                $summary = $conn->query("SELECT 
                    COUNT(*) as total,
                    SUM(buy_price) as total_buy,
                    SUM(sell_price) as total_sell
                    FROM goat_inventory
                ")->fetch();

                $food_cost = 2500; // Placeholder
                $maintain_cost = 3000; // Placeholder
$profit = $summary['total_sell'] - ($summary['total_buy'] + $maintain_cost + $food_cost);
?>
<ul class="list-group list-group-flush mt-3">
    <li class="list-group-item">মোট ছাগল: <?= $summary['total'] ?? 0 ?></li>
    <li class="list-group-item">ক্রয় মূল্য: <?= $summary['total_buy'] ?? 0 ?> টাকা</li>
    <li class="list-group-item">বিক্রয় মূল্য: <?= $summary['total_sell'] ?? 0 ?> টাকা</li>
    <li class="list-group-item">রানিং সংখ্যা: <?= $summary['total'] ?? 0 ?></li>
    <li class="list-group-item">রক্ষণাবেক্ষণ খরচ: <?= $maintain_cost ?> টাকা</li>
    <li class="list-group-item">খাদ্য খরচ: <?= $food_cost ?> টাকা</li>
    <li class="list-group-item fw-bold text-success">আর্থিক আয়: <?= $profit ?> টাকা</li>
</ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
