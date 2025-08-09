<?php
session_start();
require 'php/config.php';

// Search functionality
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM accounting WHERE category LIKE ? OR type LIKE ? ORDER BY date DESC");
    $stmt->execute(["%$search%", "%$search%"]);
} else {
    $stmt = $conn->query("SELECT * FROM accounting ORDER BY date DESC");
}
$results = $stmt->fetchAll();
?>

<?php include('adminHeader.php'); ?>

<style>
.container {
    width: 95%;
    margin: auto;
    padding: 20px;
}

.search-form {
    text-align: center;
    margin-bottom: 20px;
}

.search-form input[type="text"] {
    padding: 8px;
    width: 250px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.search-form button {
    padding: 8px 15px;
    background-color: teal;
    color: white;
    border: none;
    border-radius: 5px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}

.table th {
    background-color: #e0f2f1;
    font-weight: bold;
}

.add-btn {
    display: inline-block;
    margin-bottom: 15px;
    background-color: #00796B;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}
</style>

<div class="container">
    <h2 style="text-align:center;">📋 হিসাবের তালিকা</h2>

    <div class="search-form">
        <form method="get" action="">
            <input type="text" name="search" placeholder="খোঁজ করুন (ধরন বা খাত)" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">🔍 খুঁজুন</button>
        </form>
    </div>

    <div style="text-align:right;">
        <a href="accounting.php" class="add-btn">➕ নতুন হিসাব যুক্ত করুন</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ধরন</th>
                <th>খাত</th>
                <th>পরিমাণ</th>
                <th>বর্ণনা</th>
                <th>তারিখ</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($results): ?>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['type'] ?></td>
                        <td><?= $row['category'] ?></td>
                        <td><?= number_format($row['amount'], 2) ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td>
                            <a href="accounting.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-primary">✏️ এডিট</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">🔍 কোনো ডেটা পাওয়া যায়নি।</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
