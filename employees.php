<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include 'adminHeader.php';
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>কর্মচারী ব্যবস্থাপনা</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8f8;
        }
        .card {
            transition: 0.3s;
            border: 2px solid teal;
        }
        .card:hover {
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            transform: scale(1.03);
        }
        .card img {
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h3 class="text-success mb-4 text-center">কর্মচারী ব্যবস্থাপনা</h3>
    <div class="row g-4">

        <!-- Employee Information -->
        <div class="col-md-3">
            <a href="employee_info.php" class="text-decoration-none">
                <div class="card text-center p-3">
                    <img src="images/employee_info.png" alt="Employee Info" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title text-dark">কর্মচারীর তথ্য</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Salary Information -->
        <div class="col-md-3">
            <a href="employee_salary.php" class="text-decoration-none">
                <div class="card text-center p-3">
                    <img src="images/salary.png" alt="Salary Info" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title text-dark">বেতন তথ্য</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Attendance/Absence -->
        <div class="col-md-3"> 
            <a href="attendance_entry.php" class="text-decoration-none">
                <div class="card text-center p-3">
                    <img src="images/attendance.png" alt="Attendance" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title text-dark">উপস্থিতি / অনুপস্থিতি</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Monthly Salary Disbursement -->
        <div class="col-md-3">
            <a href="salary_disbursement.php" class="text-decoration-none">
                <div class="card text-center p-3">
                    <img src="images/disburse.png" alt="Disbursement" class="mx-auto">
                    <div class="card-body">
                        <h5 class="card-title text-dark">বেতন পরিশোধ</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

</body>
</html>
