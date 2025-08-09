<?php
session_start();
require 'php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $stmt = $conn->prepare("INSERT INTO notifications (title, message) VALUES (?, ?)");
    $stmt->execute([$title, $message]);
    header("Location: notifications.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required class="form-control mb-2">
    <textarea name="message" placeholder="Message" required class="form-control mb-2" rows="4"></textarea>
    <button type="submit" class="btn btn-success">Post Notification</button>
</form>
