<?php
session_start();
include 'php/config.php'; // PDO connection
include 'adminHeader.php';
$message = "";

// Get attendance record by ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid attendance ID.");
}

$attendance_id = intval($_GET['id']);

// Fetch existing attendance record
$stmt = $conn->prepare("SELECT * FROM employee_attendance WHERE id = ?");
$stmt->execute([$attendance_id]);
$attendance = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$attendance) {
    die("Attendance record not found.");
}

// Fetch employee list for dropdown
$employee_list = $conn->query("SELECT id, full_name FROM employee_info ORDER BY full_name ASC")
                      ->fetchAll(PDO::FETCH_ASSOC);

// Update attendance record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = intval($_POST['employee_id']);
    $year = intval($_POST['year']);
    $month = intval($_POST['month']);
    $attendance_days = intval($_POST['attendance_days']);
    $leave_days = intval($_POST['leave_days']);
    $absent_days = intval($_POST['absent_days']);
    $remarks = trim($_POST['remarks']);

    $update = $conn->prepare("UPDATE employee_attendance 
        SET employee_id = ?, year = ?, month = ?, attendance_days = ?, leave_days = ?, absent_days = ?, remarks = ?
        WHERE id = ?");
    
    if ($update->execute([$employee_id, $year, $month, $attendance_days, $leave_days, $absent_days, $remarks, $attendance_id])) {
        $message = "✅ Attendance updated successfully!";
        // Refresh attendance data
        $stmt->execute([$attendance_id]);
        $attendance = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $message = "❌ Error updating attendance!";
    }
}

$months = [
    1=>"January", 2=>"February", 3=>"March", 4=>"April", 5=>"May", 6=>"June",
    7=>"July", 8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December"
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f1fdfd; }
        .container {
            margin-top: 50px;
            max-width: 900px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 8px #ccc;
        }
        h2 { color: teal; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Attendance</h2>
    <?php if ($message) echo "<div class='alert alert-info'>$message</div>"; ?>

    <form method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Year</label>
                <select name="year" class="form-select" required>
                    <?php
                    for ($y = 2023; $y <= date('Y') + 1; $y++) {
                        $sel = ($y == $attendance['year']) ? 'selected' : '';
                        echo "<option value='$y' $sel>$y</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Month</label>
                <select name="month" class="form-select" required>
                    <?php
                    foreach ($months as $num => $name) {
                        $sel = ($num == $attendance['month']) ? 'selected' : '';
                        echo "<option value='$num' $sel>$name</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Employee</label>
            <select name="employee_id" class="form-select" required>
                <?php foreach ($employee_list as $emp): 
                    $sel = ($emp['id'] == $attendance['employee_id']) ? 'selected' : '';
                ?>
                    <option value="<?= $emp['id'] ?>" <?= $sel ?>><?= htmlspecialchars($emp['full_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Attendance Days</label>
                <input type="number" name="attendance_days" class="form-control" value="<?= $attendance['attendance_days'] ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Leave Days</label>
                <input type="number" name="leave_days" class="form-control" value="<?= $attendance['leave_days'] ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Absent Days</label>
                <input type="number" name="absent_days" class="form-control" value="<?= $attendance['absent_days'] ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Remarks (Optional)</label>
                <input type="text" name="remarks" class="form-control" value="<?= htmlspecialchars($attendance['remarks']) ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Attendance</button>
        <a href="attendance_list.php" class="btn btn-secondary ms-2">Back to List</a>
    </form>
</div>

</body>
</html>
