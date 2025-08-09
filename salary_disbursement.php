<?php
session_start();
$conn = new mysqli("localhost", "root", "", "agrofarm"); // <-- Update DB name
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

include 'adminHeader.php';

// Default filter to current year and month
$selected_year = date('Y');
$selected_month = date('n');

if (isset($_GET['year']) && isset($_GET['month'])) {
    $selected_year = intval($_GET['year']);
    $selected_month = intval($_GET['month']);
}

// Get total days in the selected month
$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $selected_month, $selected_year);

// Fetch attendance with salary data
$sql = "SELECT ei.id, ei.full_name, ei.phone, ei.salary_amount, 
               IFNULL(ea.attendance_days, 0) AS attendance_days, 
               IFNULL(ea.leave_days, 0) AS leave_days, 
               IFNULL(ea.absent_days, 0) AS absent_days
        FROM employee_info ei
        LEFT JOIN employee_attendance ea
        ON ei.id = ea.employee_id 
           AND ea.year = $selected_year 
           AND ea.month = $selected_month
        ORDER BY ei.full_name";

$result = $conn->query($sql);

// Check query error
if (!$result) {
    die("SQL Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Salary Disbursement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f9fdfd;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            color: teal;
            margin-bottom: 30px;
        }
        .table thead {
            background: #008080;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Salary Disbursement</h2>

    <!-- Filter Form -->
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
    </form>

    <!-- Salary Table -->
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Year</th>
            <th>Month</th>
            <th>Employee</th>
            <th>Phone</th>
            <th>Basic Salary</th>
            <th>Days in Month</th>
            <th>Attendance</th>
            <th>Leave</th>
            <th>Absent</th>
            <th>Per Day</th>
            <th>Payable Salary</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $grand_total = 0;
    $months = [
        1=>"January", 2=>"February", 3=>"March", 4=>"April", 5=>"May", 6=>"June",
        7=>"July", 8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December"
    ];
    while ($row = $result->fetch_assoc()) {
        $basic_salary = $row['salary_amount'];
        $attendance = (int)$row['attendance_days'];
        $leave = (int)$row['leave_days'];
        $absent = (int)$row['absent_days'];

        $total_working_days = $attendance + $leave;
        $per_day_salary = ($basic_salary > 0 && $total_days_in_month > 0) 
            ? ($basic_salary / $total_days_in_month) : 0;
        $payable_salary = round($per_day_salary * $total_working_days);

        $grand_total += $payable_salary;

        echo "<tr>
            <td>{$i}</td>
            <td>{$selected_year}</td>
            <td>{$months[$selected_month]}</td>
            <td>{$row['full_name']}</td>
            <td>{$row['phone']}</td>
            <td>৳{$basic_salary}</td>
            <td>{$total_days_in_month}</td>
            <td>{$attendance}</td>
            <td>{$leave}</td>
            <td>{$absent}</td>
            <td>৳" . round($per_day_salary, 2) . "</td>
            <td><strong>৳{$payable_salary}</strong></td>
        </tr>";
        $i++;
    }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="11" class="text-end">Total Payable Salary:</th>
            <th>৳<?php echo $grand_total; ?></th>
        </tr>
    </table>
</div>

</body>
</html>
