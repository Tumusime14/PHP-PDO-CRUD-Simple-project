<?php 
include("connect.php");
session_start();

if(isset($_POST["updateButton"])){
    $product_id = $_POST["prod_id"];
    $prodname = $_POST["prod_name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
try{
        $query = "UPDATE products SET prod_name=:prod_name, quantity=:quantity,price=:price WHERE prod_id=:prod_id";
        $statement = $conn->prepare($query);
        $data= [
            ":prod_name"=> $prodname,
            ":quantity"=> $quantity,
            ":price"=> $price,
            ":prod_id"=> $product_id,
        ];

        $query_excute = $statement->execute($data);

        if($query_excute) {
            $_SESSION["message"] = "Updated successfully";
            header("Location: home.php");
            exit(0); }
            else{ 
            $_SESSION["message"] = "Not updated";
            header("Location: home.php");
            exit(0);
        }
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
}

if(isset($_POST["prod_id"])){
    $product_id = $_GET["prod_id"];
    try{
    $query = "DELETE FROM products WHERE prod_id=:prod_id";
    $statement = $conn->prepare($query);
    $data = [
        ":prod_id"=> $product_id];
          $query_excute = $statement->execute($data);
       
          if($query_excute) {
            $_SESSION["message"] = "Deleted successfully";
            header("Location: home.php");
            exit(0); }
            else{ 
            $_SESSION["message"] = "Not Deleted";
            header("Location: home.php");
            exit(0);
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }}
?>