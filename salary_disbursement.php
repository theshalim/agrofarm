<?php
session_start();

// ✅ Database Connection (Error Handling সহ)
$conn = new mysqli("localhost", "root", "", "agrofarm");
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// ✅ Secure Include
require_once 'adminHeader.php';

// ✅ Default filter values (Current Year & Month)
$selected_year = date('Y');
$selected_month = date('n');

// ✅ Sanitize GET input
if (isset($_GET['year']) && isset($_GET['month'])) {
    $year = filter_var($_GET['year'], FILTER_VALIDATE_INT);
    $month = filter_var($_GET['month'], FILTER_VALIDATE_INT);

    if ($year && $month >= 1 && $month <= 12) {
        $selected_year = $year;
        $selected_month = $month;
    }
}

// ✅ Get total days in month safely
$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $selected_month, $selected_year);

// ✅ Prepare statement to prevent SQL injection
$sql = "SELECT ei.id, ei.full_name, ei.phone, ei.salary_amount, 
               IFNULL(ea.attendance_days, 0) AS attendance_days, 
               IFNULL(ea.leave_days, 0) AS leave_days, 
               IFNULL(ea.absent_days, 0) AS absent_days
        FROM employee_info ei
        LEFT JOIN employee_attendance ea
        ON ei.id = ea.employee_id 
           AND ea.year = ? 
           AND ea.month = ?
        ORDER BY ei.full_name";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $selected_year, $selected_month);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    die("SQL Error: " . $conn->error);
}

// ✅ Month array
$months = [
    1=>"January", 2=>"February", 3=>"March", 4=>"April", 5=>"May", 6=>"June",
    7=>"July", 8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December"
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Salary Disbursement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f9fdfd; }
        .container { margin-top: 50px; }
        h2 { color: teal; margin-bottom: 30px; }
        .table thead { background: #008080; color: white; }
    </style>
</head>
<body>

<div class="container">
    <h2>স্যালারী ডিসবার্সমেন্ট করুন!</h2>

    <!-- ✅ Filter Form -->
    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">সালঃ</label>
            <select name="year" class="form-select" required>
                <?php
                for ($y = 2023; $y <= date('Y') + 1; $y++) {
                    $sel = ($y == $selected_year) ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($y) . "' $sel>" . htmlspecialchars($y) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">মাসঃ</label>
            <select name="month" class="form-select" required>
                <?php
                foreach ($months as $num => $name) {
                    $sel = ($num == $selected_month) ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($num) . "' $sel>" . htmlspecialchars($name) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-success">ফিল্টার করুন</button>
        </div>
    </form>

    <!-- ✅ Salary Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>আইডি</th>
                <th>সাল</th>
                <th>মাস</th>
                <th>কর্মচারী</th>
                <th>ফোন</th>
                <th>বেসিক বেতন</th>
                <th>মাসে দিন</th>
                <th>উপস্থিতি</th>
                <th>ছুটি</th>
                <th>অনুপস্থিত</th>
                <th>প্রতিদিন</th>
                <th>পে করার জন্য বেতন</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $grand_total = 0;
        while ($row = $result->fetch_assoc()) {
            $basic_salary = (float)$row['salary_amount'];
            $attendance = (int)$row['attendance_days'];
            $leave = (int)$row['leave_days'];
            $absent = (int)$row['absent_days'];

            $total_working_days = $attendance + $leave;
            $per_day_salary = ($basic_salary > 0 && $total_days_in_month > 0) 
                ? ($basic_salary / $total_days_in_month) : 0;
            $payable_salary = round($per_day_salary * $total_working_days);

            $grand_total += $payable_salary;

            echo "<tr>
                <td>" . $i++ . "</td>
                <td>" . htmlspecialchars($selected_year) . "</td>
                <td>" . htmlspecialchars($months[$selected_month]) . "</td>
                <td>" . htmlspecialchars($row['full_name']) . "</td>
                <td>" . htmlspecialchars($row['phone']) . "</td>
                <td>৳" . number_format($basic_salary, 2) . "</td>
                <td>" . htmlspecialchars($total_days_in_month) . "</td>
                <td>" . htmlspecialchars($attendance) . "</td>
                <td>" . htmlspecialchars($leave) . "</td>
                <td>" . htmlspecialchars($absent) . "</td>
                <td>৳" . number_format($per_day_salary, 2) . "</td>
                <td><strong>৳" . number_format($payable_salary, 2) . "</strong></td>
            </tr>";
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="11" class="text-end">টোটাল পে করার জন্য বেতনঃ</th>
                <th>৳<?php echo number_format($grand_total, 2); ?></th>
            </tr>
        </tfoot>
    </table>
</div>

</body>
</html>
