<?php
// শুধু হেডার ইনক্লুড করুন, হেডারেই সেশন চেক হবে
include 'adminHeader.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-hover:hover {
            transform: scale(1.05);
            transition: 0.3s ease-in-out;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.2);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-5 text-center">ই-কমার্স ড্যাশবোর্ড</h1>

    <div class="row justify-content-center g-4">
        <!-- Products Card -->
        <div class="col-md-5">
            <div class="card card-hover">
                <img src="Gallery/adminproductsmanage.jpg" class="card-img-top" alt="Products">
                <div class="card-body text-center">
                    <h4 class="card-title">পণ্য ব্যবস্থাপনা</h4>
                    <p class="card-text">পণ্য যোগ, আপডেট ও মুছুন ই-কমার্স পেজের জন্য।</p>
                    <a href="admin_products.php" class="btn btn-primary">পণ্য দেখুন</a>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-md-5">
            <div class="card card-hover">
                <img src="Gallery/adminordersmanage.jpg" class="card-img-top" alt="Orders">
                <div class="card-body text-center">
                    <h4 class="card-title">অর্ডার ব্যবস্থাপনা</h4>
                    <p class="card-text">গ্রাহকের অর্ডার দেখুন, অনুমোদন, বাতিল বা মুছুন।</p>
                    <a href="admin_orders.php" class="btn btn-success">অর্ডার দেখুন</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
