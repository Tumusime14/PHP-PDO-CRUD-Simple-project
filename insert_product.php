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
   
    <div class="container">
        <h2>ADD PRODUCT!</h2>
       <p>Fill the form</p>
       <form method="POST" action="product_valid.php">
        <label>Product name:</label><br>
        <input type="text" name="prod_name" required> <br>
        <label>Quantity:</label><br>
        <input type="text" name="quantity" required><br>
        <label>Price</label><br>
        <input type="number" name="price" required><br>
        <button type="submit" name="Add" style="margin-top: 10px; background-color: blue; color: white; padding: 8px 15px; border-radius: 5px;">Add Product</button>
        
</form>
    </div>
    <br><br><br><br><br><br><br><br>
    <footer>
        <center>ALRIGHT RESERVED| 2024</center>

    </footer>
</body>
</html>


