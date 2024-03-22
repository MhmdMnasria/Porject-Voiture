<?php 
    include("connection.php");

    $id = $_GET["id"];
    echo"".$id."<br>" ;
    $sql = "DELETE FROM clients WHERE id = '$id'";

    try {
        $result = $connection->query("$sql");
    } catch (Exception $e) {
        die("Invalid Query: ". $connection->error);
    }

    echo "client a été effacé avec succeé";
    header("location: list.php");
?>