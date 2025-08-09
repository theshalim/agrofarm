<?php
// employee_info.php
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
    <title>কর্মচারী তথ্য</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8f5;
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
    <h4 class="text-center text-success">কর্মচারীর বিস্তারিত তথ্য</h4>
    <form action="employee_info_process.php" method="POST" enctype="multipart/form-data">

        <!-- Personal Info -->
        <div class="section-title">ব্যক্তিগত তথ্য</div>
        <div class="row">
            <div class="col-md-6">
                <label>পুরো নাম:</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>পিতার/স্বামীর নাম:</label>
                <input type="text" name="guardian_name" class="form-control">
            </div>
            <div class="col-md-6">
                <label>মাতার নাম:</label>
                <input type="text" name="mother_name" class="form-control">
            </div>
            <div class="col-md-3">
                <label>জন্ম তারিখ:</label>
                <input type="date" name="dob" class="form-control">
            </div>
            <div class="col-md-3">
                <label>লিঙ্গ:</label>
                <select name="gender" class="form-control">
                    <option value="পুরুষ">পুরুষ</option>
                    <option value="মহিলা">মহিলা</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>বৈবাহিক অবস্থা:</label>
                <select name="marital_status" class="form-control">
                    <option value="অবিবাহিত">অবিবাহিত</option>
                    <option value="বিবাহিত">বিবাহিত</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>জাতীয় পরিচয়পত্র / জন্ম সনদ:</label>
                <input type="text" name="nid" class="form-control">
            </div>
            <div class="col-md-4">
                <label>ফোন নম্বর:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>বর্তমান ঠিকানা:</label>
                <input type="text" name="present_address" class="form-control">
            </div>
            <div class="col-md-6">
                <label>স্থায়ী ঠিকানা:</label>
                <input type="text" name="permanent_address" class="form-control">
            </div>
        </div>

        <!-- Employment Details -->
        <div class="section-title">কর্মসংস্থান তথ্য</div>
        <div class="row">
            <div class="col-md-4">
                <label>পদবী:</label>
                <input type="text" name="designation" class="form-control">
            </div>
            <div class="col-md-4">
                <label>সেকশন:</label>
                <select name="department" class="form-control">
                    <option value="গরু">গরু</option>
                    <option value="ছাগল">ছাগল</option>
                    <option value="মাছ">মাছ</option>
                    <option value="বাগান">বাগান</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>চাকরির ধরন:</label>
                <select name="service_type" class="form-control">
                    <option value="নিয়মিত">নিয়মিত</option>
                    <option value="চুক্তিভিত্তিক">চুক্তিভিত্তিক</option>
                    <option value="দৈনিক">দৈনিক</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>চাকরি শুরু:</label>
                <input type="date" name="join_date" class="form-control">
            </div>
            <div class="col-md-4">
                <label>চাকরি শেষ (যদি থাকে):</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <div class="col-md-4">
                <label>অবস্থা:</label>
                <select name="status" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Left">Left</option>
                </select>
            </div>
        </div>

        <!-- Salary Info -->
        <div class="section-title">বেতন ও আর্থিক তথ্য</div>
        <div class="row">
            <div class="col-md-4">
                <label>মাসিক বেতন:</label>
                <input type="number" name="salary" class="form-control">
            </div>
            <div class="col-md-4">
                <label>পেমেন্ট ধরণ:</label>
                <select name="pay_structure" class="form-control">
                    <option value="মাসিক">মাসিক</option>
                    <option value="দৈনিক">দৈনিক</option>
                    <option value="ঘণ্টা">ঘণ্টা</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>ওভারটাইম রেট:</label>
                <input type="number" name="overtime_rate" class="form-control">
            </div>
        </div>

        <!-- Documents -->
        <div class="section-title">ডকুমেন্টস</div>
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
    <button type="submit" class="btn btn-success">সংরক্ষণ করুন</button>
    <a href="employee_info_list.php" class="btn btn-secondary">কর্মচারী তালিকা দেখুন</a>
</div>



    </form>
</div>
</body>
</html>
