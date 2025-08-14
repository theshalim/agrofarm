<?php
require 'php/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = trim($_POST['name']);
    $phone   = trim($_POST['phone']);
    $email   = trim($_POST['email']);
    $reason  = trim($_POST['reason']);
    $pass    = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role    = 'user'; // ✅ ডিফল্টভাবে user role

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $error = "এই ইমেইলটি ইতোমধ্যে ব্যবহৃত হয়েছে!";
    } else {
        // Insert new user
        $insert = $conn->prepare("INSERT INTO users (name, phone, email, reason, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        if ($insert->execute([$name, $phone, $email, $reason, $pass, $role])) {
            echo '
                <div style="
                    background-color: #e0f2f1;
                    color: #00695c;
                    padding: 15px;
                    text-align: center;
                    margin: 20px auto;
                    border-radius: 5px;
                    width: 90%;
                    max-width: 400px;
                    font-family: sans-serif;
                ">
                    <div style="
                        border: 5px solid #f3f3f3;
                        border-top: 5px solid teal;
                        border-radius: 50%;
                        width: 40px;
                        height: 40px;
                        animation: spin 1s linear infinite;
                        margin: 0 auto 10px;
                    "></div>
                    ✅ রেজিস্ট্রেশন সফল হয়েছে! ৩ সেকেন্ডের মধ্যে লগইন পেজে চলে যাচ্ছেন...
                </div>
                <style>
                    @keyframes spin {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                </style>
                <script>
                    setTimeout(function() {
                        window.location.href = "login.php";
                    }, 3000);
                </script>
            ';
            exit();
        } else {
            $error = "দুঃখিত! রেজিস্ট্রেশন করতে সমস্যা হয়েছে।";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<title>রেজিস্ট্রেশন</title>
<style>
body {
  font-family: 'Noto Sans Bengali', sans-serif;
  background: #f1f8f6;
  margin: 0;
  padding: 0;
}
.register-container {
  max-width: 450px;
  margin: 40px auto;
  background: white;
  padding: 30px 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0,0,0,0.1);
  position: relative;
}
.register-container h2 {
  text-align: center;
  margin-bottom: 20px;
  color: teal;
}
label {
  display: block;
  margin-top: 15px;
  font-weight: bold;
  color: #333;
}
input, textarea {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.toggle-password {
  float: right;
  margin-top: -30px;
  margin-right: 10px;
  cursor: pointer;
  position: relative;
  z-index: 2;
  color: teal;
}
button {
  width: 100%;
  padding: 12px;
  margin-top: 25px;
  background-color: teal;
  color: white;
  border: none;
  font-size: 1em;
  border-radius: 5px;
  cursor: pointer;
}
.error {
  background-color: #ffcdd2;
  color: #b71c1c;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 10px;
}
.close-btn {
  position: absolute;
  top: 8px;
  right: 15px;
  font-size: 24px;
  font-weight: bold;
  color: #555;
  cursor: pointer;
}
</style>
</head>
<body>

<div class="register-container">
  <div class="close-btn" onclick="window.location.href='index.php'">×</div>

  <h2>নতুন রেজিস্ট্রেশন</h2>

  <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

  <form method="post" autocomplete="off">
    <label for="name">সম্পূর্ণ নাম</label>
    <input type="text" id="name" name="name" required>

    <label for="phone">মোবাইল নম্বর</label>
    <input type="text" id="phone" name="phone" required>

    <label for="email">ইমেইল</label>
    <input type="email" id="email" name="email" required>

    <label for="reason">আপনি কেন রেজিস্ট্রেশন করছেন?</label>
    <textarea id="reason" name="reason" required></textarea>

    <label for="password">পাসওয়ার্ড</label>
    <input type="password" id="password" name="password" required>
    <span class="toggle-password" onclick="togglePassword()">👁️</span>

    <button type="submit">রেজিস্টার করুন</button>
  </form>
</div>

<script>
function togglePassword() {
    const pwd = document.getElementById("password");
    pwd.type = pwd.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
