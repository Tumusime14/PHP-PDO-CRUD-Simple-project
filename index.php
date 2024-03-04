<?php 
session_start();
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
        footer{
            height: 100px;
            width: 100%;
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    <header>
        <h1>Store Management System</h1>
    </header>
    <?php
        if(isset($_SESSION["message"])) :?>
         <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
        <?php endif;?>
        <h5 class="alert alert-success"><?php  ?></h5>
    <div class="container">
       <p>
        Welcome to Store Management System that simplifies the <br>
        store manager's work to mainatin store minimizing errors! <br>
       </p>
       <p>Got account? 
        <button><a href="login.php">Login here</a></button></p>
        <p>New here?
        <button><a href="register.php">Register here</a></button></p>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
        <center>ALRIGHT RESERVED| 2024</center>

    </footer>
</body>
</html>
