<?php 
session_start();
include("connect.php");

$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #444;
            padding: 5px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 5px;
        }
        nav a:hover {
            background-color: #555;
        }
        .container {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        .dashboard {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }
        
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
    </style>
</head>
<body>

    <header>
        <h1>Store Management System</h1>
    </header>
    <?php
        if(isset($_SESSION["message"])) :?>
         <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
        <?php
            unset($_SESSION["message"]);
            endif;?>
        <h5 class="alert alert-success"><?php  ?></h5>
    <nav>
        <a href="insert_product.php">Add Products</a>
        <a href="#">Help</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="dashboard">
    <table>
        <thead>       
            <tr>
                <th>PRODUCT ID</th>
                <th>PRODUCT NAME</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
                <th>ACTION</th>
            </tr>
        </thead>
    <?php foreach ($products as $product): ?>
    <tr>
       <td><?= htmlspecialchars($product['prod_id']); ?></td>
       <td><?= htmlspecialchars($product['prod_name']); ?></td>
       <td><?= htmlspecialchars($product['quantity']); ?></td>
       <td><?= !empty($product['price']) ? htmlspecialchars($product['price']) : 'N/A'; ?></td>
       <td>
            <a href="update.php?prod_id=<?= $product['prod_id']; ?>" style="background-color: #ffc107;">Edit</a>
            <a href="delete.php?prod_id=<?= $product['prod_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');" style="background-color: #dc3545;">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table> 
    </div>
  
</body>
</html>

  