<?php
session_start();
include 'php/config.php'; // PDO connection
include 'adminHeader.php';
$report_data = [];
$message = "";

// Handle report generation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];
    $report_type = $_POST['report_type'];

    if (empty($start_date) || empty($end_date) || empty($report_type)) {
        $message = "❌ Please select a date range and report type.";
    } else {
        if ($report_type == 'attendance') {
            $sql = "SELECT ea.*, ei.full_name 
                    FROM employee_attendance ea
                    JOIN employee_info ei ON ea.employee_id = ei.id
                    WHERE CONCAT(year,'-',LPAD(month,2,'0'),'-01) BETWEEN ? AND ?
                    ORDER BY year DESC, month DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$start_date, $end_date]);
            $report_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } elseif ($report_type == 'salary') {
            $sql = "SELECT es.*, ei.full_name 
                    FROM employee_salary es
                    JOIN employee_info ei ON es.employee_id = ei.id
                    WHERE es.payment_date BETWEEN ? AND ?
                    ORDER BY es.payment_date DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$start_date, $end_date]);
            $report_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } elseif ($report_type == 'employees') {
            $sql = "SELECT * FROM employee_info 
                    WHERE join_date BETWEEN ? AND ?
                    ORDER BY join_date DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$start_date, $end_date]);
            $report_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f1fdfd; }
        .container {
            margin-top: 40px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 8px #ccc;
        }
        h2 { color: teal; }
        table { font-size: 14px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Generate Reports</h2>
    <?php if ($message) echo "<div class='alert alert-info'>$message</div>"; ?>

    <form method="POST" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" required value="<?= $_POST['start_date'] ?? '' ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" required value="<?= $_POST['end_date'] ?? '' ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Report Type</label>
            <select name="report_type" class="form-select" required>
                <option value="">-- Select --</option>
                <option value="attendance" <?= (($_POST['report_type'] ?? '') == 'attendance') ? 'selected' : '' ?>>Attendance Report</option>
                <option value="salary" <?= (($_POST['report_type'] ?? '') == 'salary') ? 'selected' : '' ?>>Salary Report</option>
                <option value="employees" <?= (($_POST['report_type'] ?? '') == 'employees') ? 'selected' : '' ?>>New Employees</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Generate</button>
        </div>
    </form>

    <?php if (!empty($report_data)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <?php if ($_POST['report_type'] == 'attendance'): ?>
                    <tr>
                        <th>Employee</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Attendance Days</th>
                        <th>Leave Days</th>
                        <th>Absent Days</th>
                        <th>Remarks</th>
                    </tr>
                <?php elseif ($_POST['report_type'] == 'salary'): ?>
                    <tr>
                        <th>Employee</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                    </tr>
                <?php elseif ($_POST['report_type'] == 'employees'): ?>
                    <tr>
                        <th>Full Name</th>
                        <th>Join Date</th>
                        <th>Designation</th>
                        <th>Salary</th>
                    </tr>
                <?php endif; ?>
                </thead>
                <tbody>
                <?php foreach ($report_data as $row): ?>
                    <?php if ($_POST['report_type'] == 'attendance'): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['full_name']) ?></td>
                            <td><?= $row['year'] ?></td>
                            <td><?= $row['month'] ?></td>
                            <td><?= $row['attendance_days'] ?></td>
                            <td><?= $row['leave_days'] ?></td>
                            <td><?= $row['absent_days'] ?></td>
                            <td><?= htmlspecialchars($row['remarks']) ?></td>
                        </tr>
                    <?php elseif ($_POST['report_type'] == 'salary'): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['full_name']) ?></td>
                            <td><?= $row['payment_date'] ?></td>
                            <td><?= $row['amount'] ?></td>
                            <td><?= htmlspecialchars($row['remarks']) ?></td>
                        </tr>
                    <?php elseif ($_POST['report_type'] == 'employees'): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['full_name']) ?></td>
                            <td><?= $row['join_date'] ?></td>
                            <td><?= htmlspecialchars($row['designation']) ?></td>
                            <td><?= $row['salary'] ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div class="alert alert-warning">No data found for the selected criteria.</div>
    <?php endif; ?>
</div>

</body>
</html>
