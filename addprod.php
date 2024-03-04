<?php
include_once 'connect.php'; // Include the database configuration file

// Define variables and initialize with empty values
$prod_id = $prod_name = $quantity = $price = "";
$prod_id_err = $prod_name_err = $quantity_err = $price_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Product ID
    if (empty(trim($_POST["prod_id"]))) {
        $prod_id_err = "Please enter product ID.";
    } else {
        $prod_id = trim($_POST["prod_id"]);
    }

    // Validate Product Name
    if (empty(trim($_POST["prod_name"]))) {
        $prod_name_err = "Please enter product name.";
    } else {
        $prod_name = trim($_POST["prod_name"]);
    }

    // Validate Quantity
    if (empty(trim($_POST["quantity"]))) {
        $quantity_err = "Please enter product quantity.";
    } else {
        $quantity = trim($_POST["quantity"]);
    }

    // Validate Price
    if (empty(trim($_POST["price"]))) {
        $price_err = "Please enter product price.";
    } else {
        $price = trim($_POST["price"]);
    }

    // Check input errors before inserting into database
    if (empty($prod_id_err) && empty($prod_name_err) && empty($quantity_err) && empty($price_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO products (prod_id, prod_name, quantity, price) VALUES (:prod_id, :prod_name, :quantity, :price)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":prod_id", $param_prod_id, PDO::PARAM_STR);
            $stmt->bindParam(":prod_name", $param_prod_name, PDO::PARAM_STR);
            $stmt->bindParam(":quantity", $param_quantity, PDO::PARAM_INT);
            $stmt->bindParam(":price", $param_price, PDO::PARAM_INT);

            // Set parameters
            $param_prod_id = $prod_id;
            $param_prod_name = $prod_name;
            $param_quantity = $quantity;
            $param_price = $price;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to index page
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h2>Add Product</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Product ID:</label>
            <input type="text" name="prod_id" value="<?php echo $prod_id; ?>">
            <span><?php echo $prod_id_err; ?></span>
        </div>
        <div>
            <label>Product Name:</label>
            <input type="text" name="prod_name" value="<?php echo $prod_name; ?>">
            <span><?php echo $prod_name_err; ?></span>
        </div>
        <div>
            <label>Quantity:</label>
            <input type="text" name="quantity" value="<?php echo $quantity; ?>">
            <span><?php echo $quantity_err; ?></span>
        </div>
        <div>
            <label>Price:</label>
            <input type="text" name="price" value="<?php echo $price; ?>">
            <span><?php echo $price_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Add Product">
        </div>
    </form>
</body>
</html>
