<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include 'adminHeader.php';
require 'php/config.php';

// File uploads
function uploadFile($fieldName, $targetDir = "uploads/") {
    if (!empty($_FILES[$fieldName]['name'])) {
        $fileName = basename($_FILES[$fieldName]["name"]);
        $targetFile = $targetDir . time() . '_' . $fileName;
        move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFile);
        return $targetFile;
    }
    return "";
}

// Get form data
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

$photo = uploadFile('photo');
$nid_doc = uploadFile('nid_doc');
$appointment_letter = uploadFile('appointment_letter');

try {
    $sql = "INSERT INTO employee_info (
        full_name, guardian_name, mother_name, dob, gender, marital_status, nid, phone,
        present_address, permanent_address, designation, department, service_type, join_date,
        end_date, status, salary, pay_structure, overtime_rate, photo, nid_doc, appointment_letter
    ) VALUES (
        :full_name, :guardian_name, :mother_name, :dob, :gender, :marital_status, :nid, :phone,
        :present_address, :permanent_address, :designation, :department, :service_type, :join_date,
        :end_date, :status, :salary, :pay_structure, :overtime_rate, :photo, :nid_doc, :appointment_letter
    )";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':full_name' => $full_name,
        ':guardian_name' => $guardian_name,
        ':mother_name' => $mother_name,
        ':dob' => $dob,
        ':gender' => $gender,
        ':marital_status' => $marital_status,
        ':nid' => $nid,
        ':phone' => $phone,
        ':present_address' => $present_address,
        ':permanent_address' => $permanent_address,
        ':designation' => $designation,
        ':department' => $department,
        ':service_type' => $service_type,
        ':join_date' => $join_date,
        ':end_date' => $end_date,
        ':status' => $status,
        ':salary' => $salary,
        ':pay_structure' => $pay_structure,
        ':overtime_rate' => $overtime_rate,
        ':photo' => $photo,
        ':nid_doc' => $nid_doc,
        ':appointment_letter' => $appointment_letter
    ]);

    echo "<script>alert('✅ কর্মচারীর তথ্য সফলভাবে সংরক্ষণ হয়েছে।'); window.location.href='employee_info.php';</script>";

} catch (PDOException $e) {
    echo "<script>alert('❌ সংরক্ষণ ব্যর্থ হয়েছে: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
}
?>
