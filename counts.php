<?php
session_start();
require 'php/config.php';

// ফর্ম সাবমিশনের জন্য ইনসার্ট বা আপডেট
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cow = $_POST['cow_count'];
    $goat = $_POST['goat_count'];
    $fish = $_POST['fish_count'];
    $fruit = $_POST['fruit_count'];

    // চেক করো কোনো রেকর্ড আছে কিনা
    $stmt = $conn->query("SELECT id FROM dashboard_counts LIMIT 1");
    $existing = $stmt->fetch();

    if ($existing) {
        // যদি রেকর্ড থাকে, তাহলে আপডেট করো
        $stmt = $conn->prepare("UPDATE dashboard_counts SET cow_count=?, goat_count=?, fish_count=?, fruit_count=? WHERE id=?");
        $stmt->execute([$cow, $goat, $fish, $fruit, $existing['id']]);
    } else {
        // না থাকলে একবার ইনসার্ট করো
        $stmt = $conn->prepare("INSERT INTO dashboard_counts (cow_count, goat_count, fish_count, fruit_count) VALUES (?, ?, ?, ?)");
        $stmt->execute([$cow, $goat, $fish, $fruit]);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// সর্বশেষ ডেটা নিয়ে আসো
$stmt = $conn->query("SELECT * FROM dashboard_counts LIMIT 1");
$data = $stmt->fetch();
?>

<?php include('adminHeader.php'); ?>

<div class="container py-4">
    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white text-center">
            <h4 class="mb-0">ড্যাশবোর্ড কাউন্টার আপডেট</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">গরুর সংখ্যা:</label>
                        <input type="number" name="cow_count" class="form-control" value="<?= $data['cow_count'] ?? '' ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">ছাগলের সংখ্যা:</label>
                        <input type="number" name="goat_count" class="form-control" value="<?= $data['goat_count'] ?? '' ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">মাছের সংখ্যা:</label>
                        <input type="number" name="fish_count" class="form-control" value="<?= $data['fish_count'] ?? '' ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">ফলের পরিমাণ (কেজি):</label>
                        <input type="number" name="fruit_count" class="form-control" value="<?= $data['fruit_count'] ?? '' ?>" required>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-success px-4">আপডেট করুন</button>
                </div>
            </form>
        </div>
    </div>

    <!-- তথ্য প্রদর্শন -->
    <div class="card shadow mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">বর্তমান ড্যাশবোর্ড কাউন্টার তথ্য</h5>
        </div>
        <div class="card-body">
            <?php if ($data): ?>
                <ul class="list-group">
                    <li class="list-group-item">গরু: <?= $data['cow_count'] ?></li>
                    <li class="list-group-item">ছাগল: <?= $data['goat_count'] ?></li>
                    <li class="list-group-item">মাছ: <?= $data['fish_count'] ?></li>
                    <li class="list-group-item">ফল (কেজি): <?= $data['fruit_count'] ?></li>
                </ul>
            <?php else: ?>
                <div class="text-muted text-center">এখনো কোনো তথ্য সংরক্ষিত হয়নি।</div>
            <?php endif; ?>
        </div>
    </div>
</div>


