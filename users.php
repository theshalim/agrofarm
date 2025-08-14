<?php
session_start();
require 'php/config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: user_dashboard.php");
    exit();
}

// Fetch all users
$stmt = $conn->prepare("SELECT * FROM users ORDER BY id ASC");
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ব্যবহারকারী ব্যবস্থাপনা</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; margin:0; padding:0; }
        .container { max-width:1000px; margin:30px auto; padding:20px; background:#fff; border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.1);}
        h1 { text-align:center; color: teal; margin-bottom:25px;}
        table { width:100%; border-collapse: collapse;}
        table th, table td { padding:12px 10px; border:1px solid #ddd; font-size:15px;}
        table th { background:#e0f2f1; color:#00695c;}
        select { padding:5px 8px; border-radius:5px; border:1px solid #ccc;}
        .message { text-align:center; padding:10px; margin-bottom:15px; border-radius:5px;}
        .success { background:#c8e6c9; color:#2e7d32;}
        .error { background:#ffcdd2; color:#c62828;}
        .edit-btn { padding:5px 10px; background:orange; color:#fff; border:none; border-radius:4px; cursor:pointer;}
        .edit-btn:hover { background:#e65100; }
    </style>
    <script>
        function updateRole(userId, selectObj) {
            var role = selectObj.value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_role_ajax.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    var msgDiv = document.getElementById("msg");
                    msgDiv.innerHTML = response.message;
                    msgDiv.className = "message " + (response.status === "success" ? "success" : "error");
                }
            };
            xhr.send("user_id=" + userId + "&role=" + role);
        }
    </script>
</head>
<body>

<?php include 'adminHeader.php'; ?>

<div class="container">
    <h1>ব্যবহারকারী তালিকা ও রোল অ্যাসাইনমেন্ট</h1>
    <div id="msg"></div>
    <table>
        <thead>
            <tr>
                <th>আইডি</th>
                <th>সম্পূর্ণ নাম</th>
                <th>ইমেইল</th>
                <th>মোবাইল</th>
                <th>রেজিস্ট্রেশনের কারণ</th>
                <th>বর্তমান রোল</th>
                <th>রোল পরিবর্তন</th>
                <th>এডিট করুন</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['phone']) ?></td>
                <td><?= htmlspecialchars($user['reason']) ?></td>
                <td><?= $user['role'] ?></td>
                <td>
                    <?php if($user['id'] != 1): ?>
                <select onchange="updateRole(<?= $user['id'] ?>, this)">
                <option value="user" <?= $user['role']==='user'?'selected':'' ?>>User</option>
                <option value="admin" <?= $user['role']==='admin'?'selected':'' ?>>Admin</option>
                </select>

                    <?php else: ?>
                        <span>Admin</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="edit_user.php?id=<?= $user['id'] ?>"><button class="edit-btn">Edit</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
