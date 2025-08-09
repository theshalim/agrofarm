<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

require 'php/config.php';
include 'adminHeader.php';

// Handle insert/update
$name = $breed = $age = $weight = $buy_price = $sell_price = $location = $date = $remarks = "";
$update = false;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM goat_inventory WHERE id=?");
    $stmt->execute([$id]);
    $data = $stmt->fetch();
    $update = true;

    $name = $data['name'];
    $breed = $data['breed'];
    $age = $data['age'];
    $weight = $data['weight'];
    $buy_price = $data['buy_price'];
    $sell_price = $data['sell_price'];
    $location = $data['location'];
    $date = $data['date'];
    $remarks = $data['remarks'];
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ছাগল ইনভেন্টরি</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7f7;
        }
        .container {
            margin-top: 30px;
        }
        .form-section {
            border: 1px solid #00bfa5;
            border-radius: 10px;
            padding: 20px;
            background-color: #ffffff;
        }
        .form-section h4 {
            color: teal;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: teal;
            color: white;
        }
        .btn-custom:hover {
            background-color: #00796b;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Form Section -->
        <div class="col-md-8 offset-md-2">
            <div class="form-section">
                <h4><?= $update ? 'ছাগল ইনভেন্টরি আপডেট করুন' : 'নতুন ছাগল যুক্ত করুন' ?></h4>
                <form action="goat_inventory_process.php" method="POST">
                    <?php if ($update): ?>
                        <input type="hidden" name="id" value="<?= $id ?>">
                    <?php endif; ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">নাম</label>
                            <input type="text" name="name" value="<?= $name ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">জাত</label>
                            <input type="text" name="breed" value="<?= $breed ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">বয়স (মাস)</label>
                            <input type="number" name="age" value="<?= $age ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">ওজন (কেজি)</label>
                            <input type="number" name="weight" value="<?= $weight ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">অবস্থান</label>
                            <input type="text" name="location" value="<?= $location ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ক্রয় মূল্য</label>
                            <input type="number" name="buy_price" value="<?= $buy_price ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">বিক্রয় মূল্য</label>
                            <input type="number" name="sell_price" value="<?= $sell_price ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">তারিখ</label>
                            <input type="date" name="date" value="<?= $date ?>" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">মন্তব্য</label>
                            <input type="text" name="remarks" value="<?= $remarks ?>" class="form-control">
                        </div>
                        <div class="col-12 text-end">
                            <?php if ($update): ?>
                                <button type="submit" name="update" class="btn btn-custom">আপডেট</button>
                            <?php else: ?>
                                <button type="submit" name="save" class="btn btn-custom">সংরক্ষণ করুন</button>
                            <?php endif; ?>
                            <a href="goat_inventory_list.php" class="btn btn-secondary">তালিকা দেখুন</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
