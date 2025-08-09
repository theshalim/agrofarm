<?php
// accounting.php
session_start();
require 'php/config.php';

// Fetch existing data if editing
$editing = false;
if (isset($_GET['edit'])) {
    $editing = true;
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM accounting WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    if (isset($_POST['id']) && $_POST['id'] !== '') {
        // Update
        $stmt = $conn->prepare("UPDATE accounting SET type=?, category=?, amount=?, description=?, date=? WHERE id=?");
        $stmt->execute([$type, $category, $amount, $description, $date, $_POST['id']]);
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO accounting (type, category, amount, description, date) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$type, $category, $amount, $description, $date]);
    }

    header("Location: accounting_list.php?success=1");
    exit();
}
?>

<?php include('adminHeader.php'); ?>

<style>
.container {
    width: 90%;
    margin: auto;
    padding: 20px;
}

.accounting-form {
    width: 500px;
    max-width: 90%;
    margin: 0 auto;
    background: #e6f2f0;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

.accounting-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
}

.accounting-form input,
.accounting-form select,
.accounting-form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #aaa;
    border-radius: 5px;
}

.accounting-form button {
    background-color: teal;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    border-radius: 5px;
    cursor: pointer;
}

.back-link {
    text-align: center;
    margin-top: 20px;
}

.back-link a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #00796B;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
</style>

<div class="container">
    <h2 style="text-align:center;">
        <?php echo $editing ? 'হিসাব সংশোধন করুন' : 'হিসাবরক্ষণ ফর্ম'; ?>
    </h2>

    <form class="accounting-form" method="post" action="">
        <?php if ($editing): ?>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <?php endif; ?>

        <label for="type">ধরন</label>
        <select name="type" id="type" required>
            <option value="Income" <?php if ($editing && $data['type'] == 'Income') echo 'selected'; ?>>Income</option>
            <option value="Expense" <?php if ($editing && $data['type'] == 'Expense') echo 'selected'; ?>>Expense</option>
        </select>

        <label for="category">খাত</label>
        <input type="text" name="category" id="category" value="<?php echo $editing ? $data['category'] : ''; ?>" required>

        <label for="amount">পরিমাণ</label>
        <input type="number" name="amount" id="amount" step="0.01" value="<?php echo $editing ? $data['amount'] : ''; ?>" required>

        <label for="description">বর্ণনা</label>
        <textarea name="description" id="description" rows="3"><?php echo $editing ? $data['description'] : ''; ?></textarea>

        <label for="date">তারিখ</label>
        <input type="date" name="date" id="date" value="<?php echo $editing ? $data['date'] : ''; ?>" required>

    <div class="back-link">
        <button type="submit"><?php echo $editing ? 'আপডেট করুন' : 'সংরক্ষণ করুন'; ?></button>
    </form>

    <div class="back-link">
        <a href="accounting_list.php">হিসাবের তালিকায় ফিরে যান</a>
    </div>
</div>


