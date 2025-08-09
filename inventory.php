<?php
session_start(); // ✅ Always at the top

// Session check: Only admin can access
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

require 'php/config.php';
include('adminHeader.php');
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ইনভেন্টরি ম্যানেজমেন্ট</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7f7;
        }
        .card {
            transition: 0.3s;
            border: none;
            border-radius: 15px;
        }
        .card:hover {
            box-shadow: 0 8px 20px rgba(0, 128, 128, 0.3);
            transform: translateY(-5px);
        }
        .card img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        h2 {
            color: teal;
            text-align: center;
            margin: 40px 0 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>ইনভেন্টরি ম্যানেজমেন্ট</h2>
    <div class="row g-4">
        <!-- Cow Inventory -->
        <div class="col-md-6 col-lg-3">
            <a href="cow_inventory.php" class="text-decoration-none">
                <div class="card">
                    <img src="Gallery/cow.jpg" class="card-img-top" alt="গরু">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">গরু ইনভেন্টরি</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Goat Inventory -->
        <div class="col-md-6 col-lg-3">
            <a href="goat_inventory.php" class="text-decoration-none">
                <div class="card">
                    <img src="Gallery/goat.jpg" class="card-img-top" alt="ছাগল">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">ছাগল ইনভেন্টরি</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Fish Inventory -->
        <div class="col-md-6 col-lg-3">
            <a href="fish_inventory.php" class="text-decoration-none">
                <div class="card">
                    <img src="Gallery/fish.jpg" class="card-img-top" alt="মাছ">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">মাছ ইনভেন্টরি</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Garden Inventory -->
        <div class="col-md-6 col-lg-3">
            <a href="garden_inventory.php" class="text-decoration-none">
                <div class="card">
                    <img src="Gallery/garden.jpg" class="card-img-top" alt="বাগান">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark">বাগান ইনভেন্টরি</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>
