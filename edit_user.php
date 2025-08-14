<?php
session_start();
require 'php/config.php';

// Only admin can access
if(!isset($_SESSION['user']) || $_SESSION['user']['role']!=='admin'){
    header("Location: user_dashboard.php");
    exit();
}

// Get user ID from URL
if(!isset($_GET['id'])){
    header("Location: users.php");
    exit();
}

$user_id = (int)$_GET['id'];

// Fetch user data
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if(!$user){
    header("Location: users.php");
    exit();
}

// Handle form submission
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $reason = $_POST['reason'];

    if($user_id != 1){
        $role = $_POST['role'];
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, phone=?, reason=?, role=? WHERE id=?");
        $stmt->execute([$name,$email,$phone,$reason,$role,$user_id]);
    } else {
        // Main admin role cannot change
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, phone=?, reason=? WHERE id=?");
        $stmt->execute([$name,$email,$phone,$reason,$user_id]);
    }

    $success = "User updated successfully.";
    // Refresh user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f4f7f6; margin:0; padding:0; }
        .container { max-width:600px; margin:50px auto; padding:20px; background:#fff; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.1);}
        h1 { text-align:center; color:teal; margin-bottom:25px;}
        form { display:flex; flex-direction:column; gap:15px;}
        label { font-weight:600;}
        input, select, textarea { padding:10px; border-radius:5px; border:1px solid #ccc; font-size:15px; width:100%;}
        button { padding:10px; background:teal; color:#fff; border:none; border-radius:5px; cursor:pointer; font-size:16px;}
        button:hover { background:#004d40; }
        .message { text-align:center; padding:10px; border-radius:5px; margin-bottom:10px;}
        .success { background:#c8e6c9; color:#2e7d32;}
        .error { background:#ffcdd2; color:#c62828;}
    </style>
</head>
<body>

<?php include 'adminHeader.php'; ?>

<div class="container">
    <h1>Edit User</h1>

    <?php if(!empty($success)) echo "<div class='message success'>$success</div>"; ?>

    <form method="post">
        <label>Full Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <label>Phone</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">

        <label>Reason</label>
        <textarea name="reason"><?= htmlspecialchars($user['reason']) ?></textarea>

        <?php if($user_id != 1): ?>
            <label>Role</label>
            <select name="role">
                <option value="user" <?= $user['role']==='user'?'selected':'' ?>>User</option>
                <option value="admin" <?= $user['role']==='admin'?'selected':'' ?>>Admin</option>
            </select>
        <?php else: ?>
            <p><strong>Main Admin role cannot be changed</strong></p>
        <?php endif; ?>

        <button type="submit">Update User</button>
    </form>

    <p style="text-align:center; margin-top:15px;"><a href="users.php">Back to Users List</a></p>
</div>

</body>
</html>
