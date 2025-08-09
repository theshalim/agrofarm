<?php
session_start();
require 'php/config.php';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php"); exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fish_id = $_POST["fish_id"];
    $name = $_POST["name_description"];
    $purchase_date = $_POST["purchase_date"];
    $purchase_price = $_POST["purchase_price"];
    $initial_weight = $_POST["initial_weight"];
    $status = $_POST["status"];
    $sale_date = $_POST["sale_date"] ?: null;
    $sale_price = $_POST["sale_price"] ?: 0;
    $feed_cost = $_POST["feed_cost"];
    $medicine_cost = $_POST["medicine_cost"];
    $labor_cost = $_POST["labor_cost"];
    $other_cost = $_POST["other_cost"];
    $notes = $_POST["notes"];

    $total_cost = $purchase_price + $feed_cost + $medicine_cost + $labor_cost + $other_cost;
    $profit_loss = $sale_price - $total_cost;
    $total_days = ($sale_date && $purchase_date) ? (strtotime($sale_date) - strtotime($purchase_date)) / (60 * 60 * 24) : 0;

    $stmt = $conn->prepare("INSERT INTO fish_inventory (fish_id, name_description, purchase_date, purchase_price, initial_weight, status, sale_date, sale_price, total_days, feed_cost, medicine_cost, labor_cost, other_cost, total_cost, profit_loss, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssddssdddddddds", $fish_id, $name, $purchase_date, $purchase_price, $initial_weight, $status, $sale_date, $sale_price, $total_days, $feed_cost, $medicine_cost, $labor_cost, $other_cost, $total_cost, $profit_loss, $notes);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include('adminHeader.php'); ?>
    <meta charset="UTF-8">
    <title>মাছ ইনভেন্টরি</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e6f4f1; font-family: 'Noto Sans Bengali', sans-serif; }
        .teal-header { background-color: #008080; color: white; }
        .teal-btn { background-color: #008080; color: white; }
        .teal-btn:hover { background-color: #006666; }
        .table thead { background-color: #008080; color: white; }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="text-center mb-4">
        <h4 class="teal-header p-3 rounded">মাছ ইনভেন্টরি ফর্ম</h4>
    </div>

    <form method="POST" class="row g-3 bg-white p-4 rounded shadow">
        <div class="col-md-4">
            <label>মাছের আইডি</label>
            <input type="text" name="fish_id" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>নাম / বর্ণনা</label>
            <input type="text" name="name_description" class="form-control">
        </div>
        <div class="col-md-4">
            <label>ক্রয় তারিখ</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>ক্রয় মূল্য (৳)</label>
            <input type="number" step="0.01" name="purchase_price" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>ওজন (কেজি)</label>
            <input type="number" step="0.01" name="initial_weight" class="form-control">
        </div>
        <div class="col-md-4">
            <label>অবস্থা</label>
            <select name="status" class="form-select">
                <option value="জীবিত">জীবিত</option>
                <option value="বিক্রি">বিক্রি</option>
                <option value="মৃত্যু">মৃত্যু</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>বিক্রয় তারিখ</label>
            <input type="date" name="sale_date" class="form-control">
        </div>
        <div class="col-md-4">
            <label>বিক্রয় মূল্য (৳)</label>
            <input type="number" step="0.01" name="sale_price" class="form-control">
        </div>
        <div class="col-md-4">
            <label>খাবারের খরচ (৳)</label>
            <input type="number" step="0.01" name="feed_cost" class="form-control">
        </div>
        <div class="col-md-4">
            <label>চিকিৎসা খরচ (৳)</label>
            <input type="number" step="0.01" name="medicine_cost" class="form-control">
        </div>
        <div class="col-md-4">
            <label>শ্রমিক ব্যয় (৳)</label>
            <input type="number" step="0.01" name="labor_cost" class="form-control">
        </div>
        <div class="col-md-4">
            <label>অন্যান্য খরচ (৳)</label>
            <input type="number" step="0.01" name="other_cost" class="form-control">
        </div>
        <div class="col-md-12">
            <label>মন্তব্য</label>
            <textarea name="notes" class="form-control" rows="2"></textarea>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <a href="fish_inventory_list.php" class="btn btn-secondary">📄 তালিকা দেখুন</a>
            <button type="submit" class="btn teal-btn">✅ সংরক্ষণ করুন</button>
        </div>
    </form>
</div>
</body>
</html>
