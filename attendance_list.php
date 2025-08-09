<?php
session_start();
$conn = new mysqli("localhost", "root", "", "agrofarm");

$selected_year = date('Y');
$selected_month = date('n');

if (isset($_GET['year']) && isset($_GET['month'])) {
    $selected_year = $_GET['year'];
    $selected_month = $_GET['month'];
} 
include 'adminHeader.php';

// Fetch attendance records
$sql = "SELECT ea.*, ei.full_name AS name, ei.phone
        FROM employee_attendance ea
        JOIN employee_info ei ON ea.employee_id = ei.id
        WHERE ea.year = $selected_year AND ea.month = $selected_month
        ORDER BY ei.full_name";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7fefe;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            color: teal;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Employee Attendance List</h2>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">Year</label>
            <select name="year" class="form-select">
                <?php
                for ($y = 2023; $y <= date('Y') + 1; $y++) {
                    $sel = ($y == $selected_year) ? 'selected' : '';
                    echo "<option value='$y' $sel>$y</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Month</label>
            <select name="month" class="form-select">
                <?php
                $months = [
                    1=>"January", 2=>"February", 3=>"March", 4=>"April", 5=>"May", 6=>"June",
                    7=>"July", 8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December"
                ];
                foreach ($months as $num => $name) {
                    $sel = ($num == $selected_month) ? 'selected' : '';
                    echo "<option value='$num' $sel>$name</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-success">Filter</button>
        </div>
        <div class="col-md-3 align-self-end text-end">
            <a href="attendance_entry.php" class="btn btn-primary">➕ Add New Attendance</a>
        </div>
    </form>

    <?php if ($result === false): ?>
        <div class="alert alert-danger">
            ❌ Query Error: <?= $conn->error ?>
        </div>
    <?php else: ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Phone</th>
                    <th>Attendance</th>
                    <th>Leave</th>
                    <th>Absent</th>
                    <th>Remarks</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['attendance_days']}</td>
                        <td>{$row['leave_days']}</td>
                        <td>{$row['absent_days']}</td>
                        <td>{$row['remarks']}</td>
                        <td><a href='attendance_edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a></td>
                    </tr>";
                    $i++;
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No records found for selected month/year.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
