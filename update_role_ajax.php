<?php
session_start();
require 'php/config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    echo json_encode(['status' => 'error', 'message' => 'আপনার অনুমতি নেই।']);
    exit();
}

if(isset($_POST['user_id'], $_POST['role'])) {
    $user_id = intval($_POST['user_id']);
    $role = $_POST['role'];

    if($user_id == 1) {
        echo json_encode(['status' => 'error', 'message' => 'Main admin role পরিবর্তন করা যাবে না।']);
        exit();
    }

    $allowed_roles = ['user', 'admin'];
    if(!in_array($role, $allowed_roles)) {
        echo json_encode(['status' => 'error', 'message' => 'অবৈধ রোল।']);
        exit();
    }

    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    if($stmt->execute([$role, $user_id])) {
        echo json_encode(['status' => 'success', 'message' => 'Role updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Role update failed.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Data missing.']);
}
