<?php
session_start();
require 'php/config.php';
$conn = new mysqli($host, $user, $pass, $db);
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php"); exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $garden_id = $_POST["garden_id"];
    $item_name = $_POST["item_name"];
    $category = $_POST["category"];
    $planting_date = $_POST["planting_date"];
    $harvest_date = $_POST["harvest_date"] ?: null;
    $quantity = $_POST["quantity"];
    $unit = $_POST["unit"];
    $cost = $_POST["cost"];
    $sale_price = $_POST["sale_price"];
    $fertilizer_cost = $_POST["fertilizer_cost"];
    $labor_cost = $_POST["labor_cost"];
    $other_cost = $_POST["other_cost"];
    $status = $_POST["status"];
    $notes = $_POST["notes"];

    $total_cost = $cost + $fertilizer_cost + $labor_cost + $other_cost;
    $profit_loss = $sale_price - $total_cost;
    $duration = ($harvest_date && $planting_date) ? (strtotime($harvest_date) - strtotime($planting_date)) / (60 * 60 * 24) : 0;

    $stmt = $conn->prepare("INSERT INTO garden_inventory (garden_id, item_name, category, planting_date, harvest_date, quantity, unit, cost, sale_price, fertilizer_cost, labor_cost, other_cost, total_cost, profit_loss, status, duration, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssddddddddsis", $garden_id, $item_name, $category, $planting_date, $harvest_date, $quantity, $unit, $cost, $sale_price, $fertilizer_cost, $labor_cost, $other_cost, $total_cost, $profit_loss, $status, $duration, $notes);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <?php include('adminHeader.php'); ?>
    <meta charset="UTF-8">
    <title>বাগান ইনভেন্টরি</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e6f4f1; font-family: 'Noto Sans Bengali', sans-serif; }
        .teal-header { background-color: #008080; color: white; }
        .teal-btn { background-color: #008080; color: white; }
        .teal-btn:hover { background-color: #006666; }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="text-center mb-4">
        <h4 class="teal-header p-3 rounded">🍇 বাগান ইনভেন্টরি ফর্ম</h4>
    </div>

    <form method="POST" class="row g-3 bg-white p-4 rounded shadow">
        <div class="col-md-4">
            <label>আইডি</label>
            <input type="text" name="garden_id" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>আইটেম নাম</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>শ্রেণী</label>
            <select name="category" class="form-select" required>
                <option value="ফল">ফল</option>
                <option value="শাকসবজি">শাকসবজি</option>
                <option value="ফসল">ফসল</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>রোপণের তারিখ</label>
            <input type="date" name="planting_date" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>ফসল কাটার তারিখ</label>
            <input type="date" name="harvest_date" class="form-control">
        </div>
        <div class="col-md-4">
            <label>পরিমাণ</label>
            <input type="number" step="0.01" name="quantity" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>একক</label>
            <select name="unit" class="form-select">
                <option value="কেজি">কেজি</option>
                <option value="মণ">মণ</option>
                <option value="লিটার">লিটার</option>
                <option value="পিস">পিস</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>প্রাথমিক খরচ (৳)</label>
            <input type="number" step="0.01" name="cost" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>বিক্রয় মূল্য (৳)</label>
            <input type="number" step="0.01" name="sale_price" class="form-control">
        </div>
        <div class="col-md-4">
            <label>সার / কীটনাশক খরচ (৳)</label>
            <input type="number" step="0.01" name="fertilizer_cost" class="form-control">
        </div>
        <div class="col-md-4">
            <label>শ্রমিক ব্যয় (৳)</label>
            <input type="number" step="0.01" name="labor_cost" class="form-control">
        </div>
        <div class="col-md-4">
            <label>অন্যান্য খরচ (৳)</label>
            <input type="number" step="0.01" name="other_cost" class="form-control">
        </div>
        <div class="col-md-4">
            <label>অবস্থা</label>
            <select name="status" class="form-select">
                <option value="ফলপ্রসূ">ফলপ্রসূ</option>
                <option value="চলমান">চলমান</option>
                <option value="ব্যর্থ">ব্যর্থ</option>
            </select>
        </div>
        <div class="col-md-12">
            <label>মন্তব্য</label>
            <textarea name="notes" class="form-control" rows="2"></textarea>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <a href="garden_inventory_list.php" class="btn btn-secondary">📄 তালিকা দেখুন</a>
            <button type="submit" class="btn teal-btn">✅ সংরক্ষণ করুন</button>
        </div>
    </form>
</div>
</body>
</html>
