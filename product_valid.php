<?php 
session_start();
include("connect.php");

if(isset($_POST["Add"])){
    $prodname = $_POST["prod_name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $query = "INSERT INTO products(prod_name,quantity,price) VALUES (:prod_name, :quantity,:price)";
    $query_run = $conn->prepare($query);

    $data = [
        ":prod_name"=> $prodname,
        ":quantity"=> $quantity,
        "price"=> $price,
    ];
    $query_excuter = $query_run->execute($data);
    if($query_excuter) {
        $_SESSION["message"] = "Inserted successfully";
        header("Location: home.php");
        exit(0);

} else {
    $_SESSION["message"] = "Failled to Insert";
    header("Location: home.php");
    exit(0);
}
}
?>