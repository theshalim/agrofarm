<?php
// employee_info_edit.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require 'php/config.php';
include 'adminHeader.php';

$id = $_GET['id'] ?? '';
if (!$id) {
    echo "<script>alert('❌ কোনো কর্মচারী নির্ধারণ করা হয়নি।'); window.location.href='employee_info_list.php';</script>";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM employee_info WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    echo "<script>alert('❌ তথ্য পাওয়া যায়নি।'); window.location.href='employee_info_list.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>কর্মচারী তথ্য সম্পাদনা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fff8;
        }
        .section-title {
            background-color: teal;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h4 class="text-center text-primary">👤 কর্মচারী তথ্য সম্পাদনা</h4>
    <form action="employee_info_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <!-- Personal Info -->
        <div class="section-title">✅ ব্যক্তিগত তথ্য</div>
        <div class="row">
            <div class="col-md-6">
                <label>পুরো নাম:</label>
                <input type="text" name="full_name" class="form-control" value="<?= $data['full_name'] ?>" required>
            </div>
            <div class="col-md-6">
                <label>পিতার/স্বামীর নাম:</label>
                <input type="text" name="guardian_name" class="form-control" value="<?= $data['guardian_name'] ?>">
            </div>
            <div class="col-md-6">
                <label>মাতার নাম:</label>
                <input type="text" name="mother_name" class="form-control" value="<?= $data['mother_name'] ?>">
            </div>
            <div class="col-md-3">
                <label>জন্ম তারিখ:</label>
                <input type="date" name="dob" class="form-control" value="<?= $data['dob'] ?>">
            </div>
            <div class="col-md-3">
                <label>লিঙ্গ:</label>
                <select name="gender" class="form-control">
                    <option value="পুরুষ" <?= ($data['gender'] == 'পুরুষ') ? 'selected' : '' ?>>পুরুষ</option>
                    <option value="মহিলা" <?= ($data['gender'] == 'মহিলা') ? 'selected' : '' ?>>মহিলা</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>বৈবাহিক অবস্থা:</label>
                <select name="marital_status" class="form-control">
                    <option value="অবিবাহিত" <?= ($data['marital_status'] == 'অবিবাহিত') ? 'selected' : '' ?>>অবিবাহিত</option>
                    <option value="বিবাহিত" <?= ($data['marital_status'] == 'বিবাহিত') ? 'selected' : '' ?>>বিবাহিত</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>জাতীয় পরিচয়পত্র:</label>
                <input type="text" name="nid" class="form-control" value="<?= $data['nid'] ?>">
            </div>
            <div class="col-md-4">
                <label>ফোন নম্বর:</label>
                <input type="text" name="phone" class="form-control" value="<?= $data['phone'] ?>" required>
            </div>
            <div class="col-md-6">
                <label>বর্তমান ঠিকানা:</label>
                <input type="text" name="present_address" class="form-control" value="<?= $data['present_address'] ?>">
            </div>
            <div class="col-md-6">
                <label>স্থায়ী ঠিকানা:</label>
                <input type="text" name="permanent_address" class="form-control" value="<?= $data['permanent_address'] ?>">
            </div>
        </div>

        <!-- Employment Details -->
        <div class="section-title">✅ কর্মসংস্থান তথ্য</div>
        <div class="row">
            <div class="col-md-4">
                <label>পদবী:</label>
                <input type="text" name="designation" class="form-control" value="<?= $data['designation'] ?>">
            </div>
            <div class="col-md-4">
                <label>সেকশন:</label>
                <select name="department" class="form-control">
                    <option value="গরু" <?= ($data['department'] == 'গরু') ? 'selected' : '' ?>>গরু</option>
                    <option value="ছাগল" <?= ($data['department'] == 'ছাগল') ? 'selected' : '' ?>>ছাগল</option>
                    <option value="মাছ" <?= ($data['department'] == 'মাছ') ? 'selected' : '' ?>>মাছ</option>
                    <option value="বাগান" <?= ($data['department'] == 'বাগান') ? 'selected' : '' ?>>বাগান</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>চাকরির ধরন:</label>
                <select name="service_type" class="form-control">
                    <option value="নিয়মিত" <?= ($data['service_type'] == 'নিয়মিত') ? 'selected' : '' ?>>নিয়মিত</option>
                    <option value="চুক্তিভিত্তিক" <?= ($data['service_type'] == 'চুক্তিভিত্তিক') ? 'selected' : '' ?>>চুক্তিভিত্তিক</option>
                    <option value="দৈনিক" <?= ($data['service_type'] == 'দৈনিক') ? 'selected' : '' ?>>দৈনিক</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>চাকরি শুরু:</label>
                <input type="date" name="join_date" class="form-control" value="<?= $data['join_date'] ?>">
            </div>
            <div class="col-md-4">
                <label>চাকরি শেষ:</label>
                <input type="date" name="end_date" class="form-control" value="<?= $data['end_date'] ?>">
            </div>
            <div class="col-md-4">
                <label>অবস্থা:</label>
                <select name="status" class="form-control">
                    <option value="Active" <?= ($data['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                    <option value="Inactive" <?= ($data['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                    <option value="Left" <?= ($data['status'] == 'Left') ? 'selected' : '' ?>>Left</option>
                </select>
            </div>
        </div>

        <!-- Salary Info -->
        <div class="section-title">✅ বেতন ও আর্থিক তথ্য</div>
        <div class="row">
            <div class="col-md-4">
                <label>বেতন:</label>
                <input type="number" name="salary" class="form-control" value="<?= $data['salary'] ?>">
            </div>
            <div class="col-md-4">
                <label>পেমেন্ট ধরণ:</label>
                <select name="pay_structure" class="form-control">
                    <option value="মাসিক" <?= ($data['pay_structure'] == 'মাসিক') ? 'selected' : '' ?>>মাসিক</option>
                    <option value="দৈনিক" <?= ($data['pay_structure'] == 'দৈনিক') ? 'selected' : '' ?>>দৈনিক</option>
                    <option value="ঘণ্টা" <?= ($data['pay_structure'] == 'ঘণ্টা') ? 'selected' : '' ?>>ঘণ্টা</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>ওভারটাইম রেট:</label>
                <input type="number" name="overtime_rate" class="form-control" value="<?= $data['overtime_rate'] ?>">
            </div>
        </div>

        <!-- File Uploads -->
        <div class="section-title">✅ ডকুমেন্টস (আপডেট করতে চাইলে নতুন ফাইল নির্বাচন করুন)</div>
        <div class="row">
            <div class="col-md-4">
                <label>ফটো:</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="col-md-4">
                <label>জাতীয় পরিচয়পত্র:</label>
                <input type="file" name="nid_doc" class="form-control">
            </div>
            <div class="col-md-4">
                <label>চাকরির নিয়োগপত্র:</label>
                <input type="file" name="appointment_letter" class="form-control">
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">🔄 আপডেট করুন</button>
            <a href="employee_info_list.php" class="btn btn-secondary">⬅️ ফিরে যান</a>
        </div>
    </form>
</div>
</body>
</html>
