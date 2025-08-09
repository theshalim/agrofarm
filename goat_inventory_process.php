<?php
session_start();
require 'php/config.php';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $buy_price = $_POST['buy_price'];
    $sell_price = $_POST['sell_price'];
    $maintain_cost = $_POST['maintain_cost'] ?? 0;
    $food_cost = $_POST['food_cost'] ?? 0;
    $location = $_POST['location'];
    $date = $_POST['date'];
    $remarks = $_POST['remarks'];

    $stmt = $conn->prepare("INSERT INTO goat_inventory 
        (name, breed, age, weight, buy_price, sell_price, maintain_cost, food_cost, location, date, remarks) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $breed, $age, $weight, $buy_price, $sell_price, $maintain_cost, $food_cost, $location, $date, $remarks]);

    header("Location: goat_inventory_list.php");
    exit();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $buy_price = $_POST['buy_price'];
    $sell_price = $_POST['sell_price'];
    $maintain_cost = $_POST['maintain_cost'] ?? 0;
    $food_cost = $_POST['food_cost'] ?? 0;
    $location = $_POST['location'];
    $date = $_POST['date'];
    $remarks = $_POST['remarks'];

    $stmt = $conn->prepare("UPDATE goat_inventory SET 
        name=?, breed=?, age=?, weight=?, buy_price=?, sell_price=?, 
        maintain_cost=?, food_cost=?, location=?, date=?, remarks=? 
        WHERE id=?");
    $stmt->execute([$name, $breed, $age, $weight, $buy_price, $sell_price, $maintain_cost, $food_cost, $location, $date, $remarks, $id]);

    header("Location: goat_inventory_list.php");
    exit();
}
?>
