<?php
session_start();
include("connect.php");

if(isset($_GET['prod_id'])) {
    $productId = $_GET['prod_id'];

    $query = "DELETE FROM products WHERE prod_id = :prod_id";
    $statement = $conn->prepare($query);
    $statement->execute(array("prod_id" => $productId));

    $_SESSION["message"] = "Product deleted successfully.";
} else {
    $_SESSION["message"] = "Failed to delete product. Product ID not provided.";
}

header("Location: home.php");
exit(); 
?>
