<?php
session_start();
include 'php/config.php'; // PDO DB connection

// Insert attendance
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = intval($_POST['employee_id']);
    $year = intval($_POST['year']);
    $month = intval($_POST['month']);
    $attendance_days = intval($_POST['attendance_days']);
    $leave_days = intval($_POST['leave_days']);
    $absent_days = intval($_POST['absent_days']);
    $remarks = trim($_POST['remarks']);

    // Check if already exists for same month/year/employee
    $check = $conn->prepare("SELECT id FROM employee_attendance WHERE employee_id=? AND year=? AND month=?");
    $check->execute([$employee_id, $year, $month]);

    if ($check->rowCount() > 0) {
        $message = "❌ এই কর্মচারীর জন্য এই মাসে ইতিমধ্যেই উপস্থিতির ডাটা আছে!";
    } else {
        $stmt = $conn->prepare("INSERT INTO employee_attendance 
            (employee_id, year, month, attendance_days, leave_days, absent_days, remarks) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$employee_id, $year, $month, $attendance_days, $leave_days, $absent_days, $remarks])) {
            $message = "✅ Attendance added successfully!";
        } else {
            $message = "❌ Error inserting attendance!";
        }
    }
}

// Fetch employee list using PDO
$employee_list = $conn->query("SELECT id, full_name FROM employee_info ORDER BY full_name ASC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Attendance Entry</title>
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
    <h2>Attendance Entry</h2>
    <?php if ($message) echo "<div class='alert alert-info'>$message</div>"; ?>

    <form method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Year</label>
                <select name="year" class="form-select" required>
                    <?php
                    for ($y = 2023; $y <= date('Y') + 1; $y++) {
                        echo "<option value='$y'>$y</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Month</label>
                <select name="month" class="form-select" required>
                    <?php
                    $months = [
                        1=>"January", 2=>"February", 3=>"March", 4=>"April", 5=>"May", 6=>"June",
                        7=>"July", 8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December"
                    ];
                    foreach ($months as $num => $name) {
                        echo "<option value='$num'>$name</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Employee</label>
            <select name="employee_id" class="form-select" required>
                <option value="">-- Select Employee --</option>
                <?php foreach ($employee_list as $emp): ?>
                    <option value="<?= $emp['id'] ?>"><?= htmlspecialchars($emp['full_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Attendance Days</label>
                <input type="number" name="attendance_days" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Leave Days</label>
                <input type="number" name="leave_days" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Absent Days</label>
                <input type="number" name="absent_days" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Remarks (Optional)</label>
                <input type="text" name="remarks" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Save Attendance</button>
        <a href="attendance_list.php" class="btn btn-secondary ms-2">View List</a>
    </form>
</div>

</body>
</html>
