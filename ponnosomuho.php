<?php
include 'php/config.php';
include 'header.php';

// Fetch products from database
$stmt = $conn->query("SELECT id, product_name, price, unit, image_path FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>পণ্যসমূহ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .product-card img {
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }
        .card {
            border: none;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4 text-center text-success">আমাদের পণ্যসমূহ</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($products as $p): ?>
            <div class="col">
                <div class="card product-card">
                    <img src="<?= htmlspecialchars($p['image_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['product_name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($p['product_name']) ?></h5>
                        <p class="card-text text-muted">
                            মূল্য: <?= number_format($p['price'], 2) ?> টাকা / <?= htmlspecialchars($p['unit']) ?>
                        </p>
                        <a href="order_form.php?product_id=<?= $p['id'] ?>" class="btn btn-success">Order Now</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if(count($products) == 0): ?>
            <div class="col-12 text-center text-muted">কোন পণ্য পাওয়া যায়নি।</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
