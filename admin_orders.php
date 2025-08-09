<?php
include 'php/config.php';
include 'adminHeader.php';

// ====================== PAGINATION ======================
$limit = 5;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// ====================== ACTION HANDLERS ======================

// Change order status (Deliver button)
if (isset($_GET['status']) && isset($_GET['id'])) {
    $status = $_GET['status'];
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
    header("Location: admin_orders.php?page=$page");
    exit;
}

// Change payment status (Paid/Unpaid toggle)
if (isset($_GET['payment']) && isset($_GET['id'])) {
    $payment = $_GET['payment'];
    $id = intval($_GET['id']);

    // Only change payment status here, no status reset
    $stmt = $conn->prepare("UPDATE orders SET payment_status = ? WHERE id = ?");
    $stmt->execute([$payment, $id]);

    header("Location: admin_orders.php?page=$page");
    exit;
}

// Delete order
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin_orders.php?page=$page");
    exit;
}

// ====================== FETCH ORDERS (Paginated) ======================
$stmt = $conn->prepare("
    SELECT o.id, o.customer_name, o.phone, o.address, o.quantity, o.total_price, 
           o.status, o.payment_status, o.payment_method, o.created_at,
           p.product_name, p.unit
    FROM orders o
    LEFT JOIN products p ON o.product_id = p.id
    ORDER BY o.created_at DESC
    LIMIT :limit OFFSET :offset
");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ====================== FETCH SALES SUMMARY (All Paid Orders) ======================
$summary_stmt = $conn->query("
    SELECT p.product_name, SUM(o.quantity) AS total_qty, SUM(o.total_price) AS total_amount
    FROM orders o
    LEFT JOIN products p ON o.product_id = p.id
    WHERE o.payment_status = 'paid'
    GROUP BY p.product_name
");
$sales_summary = $summary_stmt->fetchAll(PDO::FETCH_ASSOC);
$total_sales = array_sum(array_column($sales_summary, 'total_amount'));

// ====================== GET TOTAL ORDER COUNT FOR PAGINATION ======================
$count_stmt = $conn->query("SELECT COUNT(*) FROM orders");
$total_orders = $count_stmt->fetchColumn();
$total_pages = ceil($total_orders / $limit);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2 class="mb-4">Orders Management</h2>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Payment</th>
            <th>Payment Method</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (count($orders) > 0): ?>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= htmlspecialchars($order['product_name']) ?> (<?= $order['unit'] ?>)</td>
            <td><?= htmlspecialchars($order['customer_name']) ?></td>
            <td><?= htmlspecialchars($order['phone']) ?></td>
            <td><?= htmlspecialchars($order['address']) ?></td>
            <td><?= $order['quantity'] ?></td>
            <td><?= number_format($order['total_price'], 2) ?> Tk</td>
            <td>
                <?php if ($order['status'] != 'delivered'): ?>
                    <a href="admin_orders.php?status=delivered&id=<?= $order['id'] ?>&page=<?= $page ?>" 
                       class="btn btn-sm btn-primary">Deliver</a>
                <?php else: ?>
                    <span class="badge bg-success">Delivered</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($order['payment_status'] == 'unpaid'): ?>
                    <a href="admin_orders.php?payment=paid&id=<?= $order['id'] ?>&page=<?= $page ?>" 
                       class="btn btn-sm btn-warning">Unpaid</a>
                <?php else: ?>
                    <span class="badge bg-success">Paid</span>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($order['payment_method']) ?></td>
            <td><?= $order['created_at'] ?></td>
            <td>
                <a href="admin_orders.php?delete=<?= $order['id'] ?>&page=<?= $page ?>" 
                   onclick="return confirm('Are you sure you want to delete this order?')" 
                   class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="12" class="text-center">No orders found.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<!-- Pagination -->
<nav>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="admin_orders.php?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<!-- Sales Summary -->
<div class="mt-5">
    <h4>Sales Summary (Paid Orders)</h4>
    <?php if (count($sales_summary) > 0): ?>
        <ul class="list-group">
            <?php foreach ($sales_summary as $row): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <?= htmlspecialchars($row['product_name']) ?> 
                    <span><?= $row['total_qty'] ?> × <?= number_format($row['total_amount'], 2) ?> Tk</span>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-3 fw-bold">
            Total Sales: <?= number_format($total_sales, 2) ?> Tk
        </div>
    <?php else: ?>
        <p class="text-muted">No paid sales yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
