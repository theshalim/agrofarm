<?php
include 'php/config.php';
include 'header.php';

// Check if product_id is passed in URL
if (!isset($_GET['product_id']) || !is_numeric($_GET['product_id'])) {
    die("Invalid Product ID.");
}
$product_id = intval($_GET['product_id']);

// Fetch product info from database
$stmt = $conn->prepare("SELECT id, product_name, price, unit FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found.");
}

// Handle order form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $quantity = intval($_POST['quantity']);
    $unit = $_POST['unit'];
    $payment_method = $_POST['payment_method'];

    if ($customer_name && $phone && $address && $quantity > 0) {
        $total_price = $product['price'] * $quantity;

        $stmt = $conn->prepare("INSERT INTO orders 
            (product_id, customer_name, phone, address, quantity, unit, total_price, payment_method) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $product['id'],
            $customer_name,
            $phone,
            $address,
            $quantity,
            $unit,
            $total_price,
            $payment_method
        ]);

        echo "<script>alert('Order placed successfully!'); window.location='index.php';</script>";
        exit;
    } else {
        $error = "Please fill all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .order-card {
            max-width: 700px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .form-control, .form-select {
            font-size: 0.9rem;
            padding: 8px;
        }
        .btn-success {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="card order-card p-4">
        <h4 class="text-center text-success mb-3">
            Order: <?= htmlspecialchars($product['product_name']) ?> 
            <small>(<?= htmlspecialchars($product['unit']) ?>)</small>
        </h4>
        <p class="text-center text-muted mb-4">
            Unit Price: <strong id="unitPrice"><?= number_format($product['price'], 2) ?></strong> per <?= htmlspecialchars($product['unit']) ?>
        </p>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Your Name</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="2" required></textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="1" value="1" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Unit</label>
                    <select name="unit" class="form-select" required>
                        <option value="<?= htmlspecialchars($product['unit']) ?>"><?= htmlspecialchars($product['unit']) ?></option>
                        <option value="kg">Kg</option>
                        <option value="pcs">Pieces</option>
                        <option value="ltr">Liter</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Total Price</label>
                    <input type="text" id="totalPrice" class="form-control" value="<?= number_format($product['price'], 2) ?>" readonly>
                </div>
                <div class="col-12">
                    <label class="form-label">Payment Method</label>
                    <select name="payment_method" class="form-select" required>
                        <option value="Cash on Delivery">Cash on Delivery</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Nagad">Nagad</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success">Place Order</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('quantity').addEventListener('input', function () {
        let qty = parseInt(this.value) || 0;
        let unitPrice = parseFloat(document.getElementById('unitPrice').innerText);
        document.getElementById('totalPrice').value = (qty * unitPrice).toFixed(2);
    });
</script>
</body>
</html>

<?php include 'footer.php'; ?>
