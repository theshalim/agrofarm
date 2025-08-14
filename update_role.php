<?php
session_start();
require 'php/config.php';

header('Content-Type: application/json');

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin'){
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'], $_POST['role'])){
    $user_id = (int)$_POST['user_id'];
    $role = $_POST['role'];

    if($user_id == 1){ // main admin
        echo json_encode(['error' => 'Main admin role cannot be changed']);
        exit();
    }

    $stmt = $conn->prepare("UPDATE users SET role=? WHERE id=?");
    if($stmt->execute([$role, $user_id])){
        echo json_encode(['success' => 'Role updated successfully']);
    } else {
        echo json_encode(['error' => 'Role update failed']);
    }
    exit();
}

echo json_encode(['error' => 'Invalid request']);
