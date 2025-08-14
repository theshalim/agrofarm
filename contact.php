<?php
session_start();
require 'php/config.php';
include('header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $title = "Message from $name ($email)";
    $stmt = $conn->prepare("INSERT INTO notifications (title, message) VALUES (?, ?)");
    $stmt->execute([$title, $message]);

    $success = "আপনার মেসেজ পাঠানো হয়েছে!";
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>

    <meta charset="UTF-8">
    <title>যোগাযোগ করুন</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">অ্যাডমিনের যোগাযোগ করুন</h2>
        <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
        <form method="POST" class="bg-white p-4 rounded shadow">
            <div class="mb-3">
                <label>আপনার নাম</label>
                <input type="text" placeholder="আপনার নাম লিখুন...." name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>ইমেইল দিন</label>
                <input type="email" placeholder="আপনার ইমেইল লিখুন...." name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>ম্যাসেজ লিখুন</label>
                <textarea name="message" placeholder="ম্যাসেজ বক্সে বিস্তারিত লিখুন....." rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">ম্যাসেজ পাঠান!</button>
        </form>
    </div><br><br>
    
    <?php include('footer.php'); ?>

</body>
</html>

