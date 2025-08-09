<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
require 'php/config.php';
include 'adminHeader.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Sanitize input
    $full_name = $_POST['full_name'];
    $guardian_name = $_POST['guardian_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $nid = $_POST['nid'];
    $phone = $_POST['phone'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $service_type = $_POST['service_type'];
    $join_date = $_POST['join_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];
    $salary = $_POST['salary'];
    $pay_structure = $_POST['pay_structure'];
    $overtime_rate = $_POST['overtime_rate'];

    // File uploads (only update if new file uploaded)
    $photo = $_FILES['photo']['name'];
    $nid_doc = $_FILES['nid_doc']['name'];
    $appointment_letter = $_FILES['appointment_letter']['name'];

    $uploadDir = 'uploads/employees/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    function handleFileUpload($fileKey, $uploadDir) {
        if (!empty($_FILES[$fileKey]['name'])) {
            $filename = time() . '_' . basename($_FILES[$fileKey]['name']);
            $targetPath = $uploadDir . $filename;
            move_uploaded_file($_FILES[$fileKey]['tmp_name'], $targetPath);
            return $filename;
        }
        return null;
    }

    $photoFile = handleFileUpload('photo', $uploadDir);
    $nidFile = handleFileUpload('nid_doc', $uploadDir);
    $appointmentFile = handleFileUpload('appointment_letter', $uploadDir);

    // Build the update query
    $sql = "UPDATE employee_info SET 
        full_name = ?, guardian_name = ?, mother_name = ?, dob = ?, gender = ?, marital_status = ?, 
        nid = ?, phone = ?, present_address = ?, permanent_address = ?, 
        designation = ?, department = ?, service_type = ?, join_date = ?, end_date = ?, status = ?, 
        salary = ?, pay_structure = ?, overtime_rate = ?";

    $params = [
        $full_name, $guardian_name, $mother_name, $dob, $gender, $marital_status,
        $nid, $phone, $present_address, $permanent_address,
        $designation, $department, $service_type, $join_date, $end_date, $status,
        $salary, $pay_structure, $overtime_rate
    ];

    if ($photoFile) {
        $sql .= ", photo = ?";
        $params[] = $photoFile;
    }
    if ($nidFile) {
        $sql .= ", nid_doc = ?";
        $params[] = $nidFile;
    }
    if ($appointmentFile) {
        $sql .= ", appointment_letter = ?";
        $params[] = $appointmentFile;
    }

    $sql .= " WHERE id = ?";
    $params[] = $id;

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);

        echo "<script>
                alert('✅ তথ্য সফলভাবে আপডেট হয়েছে');
                window.location.href='employee_info_list.php';
              </script>";
    } catch (PDOException $e) {
        echo "<script>
                alert('❌ আপডেট ব্যর্থ: " . $e->getMessage() . "');
                window.history.back();
              </script>";
    }
} else {
    header("Location: employee_info_list.php");
    exit();
}
