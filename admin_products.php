<?php
// DB connection
include 'php/config.php'; // আপনার config path অনুযায়ী ঠিক করুন
include 'adminHeader.php';
// Product Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin_products.php");
    exit;
}

// Product Add/Edit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['product_name']);
    $price = floatval($_POST['price']);
    $unit = trim($_POST['unit']);

    // Image upload
    $image_path = "";
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        $image_path = $targetFile;
    }

    if (!empty($_POST['id'])) {
        // Update product
        if ($image_path) {
            $stmt = $conn->prepare("UPDATE products SET product_name=?, price=?, unit=?, image_path=? WHERE id=?");
            $stmt->execute([$name, $price, $unit, $image_path, $_POST['id']]);
        } else {
            $stmt = $conn->prepare("UPDATE products SET product_name=?, price=?, unit=? WHERE id=?");
            $stmt->execute([$name, $price, $unit, $_POST['id']]);
        }
    } else {
        // Insert product
        $stmt = $conn->prepare("INSERT INTO products (product_name, price, unit, image_path) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $price, $unit, $image_path]);
    }

    header("Location: admin_products.php");
    exit;
}

// Edit product load
$edit_product = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
    $stmt->execute([$id]);
    $edit_product = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get all products
$stmt = $conn->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">পণ্য ব্যবস্থাপনা</h2>

    <!-- Product Form -->
    <div class="card mb-4">
        <div class="card-header">
            <?= $edit_product ? "পণ্য সম্পাদনা করুন" : "নতুন পণ্য যোগ করুন" ?>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <?php if ($edit_product): ?>
                    <input type="hidden" name="id" value="<?= $edit_product['id'] ?>">
                <?php endif; ?>
                <div class="mb-3">
                    <label class="form-label">পণ্যের নাম</label>
                    <input type="text" name="product_name" class="form-control" value="<?= $edit_product['product_name'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">মূল্য (টাকা)</label>
                    <input type="number" name="price" class="form-control" step="0.01" value="<?= $edit_product['price'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">একক</label>
                    <input type="text" name="unit" class="form-control" value="<?= $edit_product['unit'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">পণ্যের ছবি</label>
                    <input type="file" name="image" class="form-control" <?= $edit_product ? '' : 'required' ?>>
                    <?php if ($edit_product && $edit_product['image_path']): ?>
                        <img src="<?= $edit_product['image_path'] ?>" alt="" width="100" class="mt-2 rounded">
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-success"><?= $edit_product ? "Update" : "Add" ?></button>
            </form>
        </div>
    </div>

    <!-- Product List -->
    <div class="card">
        <div class="card-header">পণ্যের তালিকা</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ক্রম</th>
                        <th>ছবি</th>
                        <th>নাম</th>
                        <th>মূল্য</th>
                        <th>একক</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($products): ?>
                    <?php foreach ($products as $index => $p): ?>
                        <tr>
                            <td><?= $index+1 ?></td>
                            <td><img src="<?= $p['image_path'] ?>" width="50" class="rounded"></td>
                            <td><?= htmlspecialchars($p['product_name']) ?></td>
                            <td><?= number_format($p['price'], 2) ?> টাকা</td>
                            <td><?= htmlspecialchars($p['unit']) ?></td>
                            <td>
                                <a href="?edit=<?= $p['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="?delete=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">কোন পণ্য পাওয়া যায়নি।</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>