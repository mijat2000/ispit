<?php

if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["author"]) && isset($_POST["year"]) && isset($_POST["desc"])){
    try{
    require_once('db_config.php');
   // exit( $_POST["name"] . $_POST["author"]. $_POST["year"]. $_POST["desc"]. $_POST["id"]);
    $db = new Database();
    $conn = $db->connect();
   $stmt = $conn->prepare("UPDATE book SET title=:title,author=:author,book.year=:year1,book.description=:desc1 WHERE book_id = :id");
 
    $stmt->bindParam(":title", $_POST["name"]);
    $stmt->bindParam(":author", $_POST["author"]);
    $stmt->bindParam(":year1", $_POST["year"]);
    $stmt->bindParam(":desc1", $_POST["desc"]);
    $stmt->bindParam(":id", $_POST["id"]);
    $stmt->execute();
        if ($stmt->rowCount() === 0)
            exit(json_encode(["error" => 2]));
        else
        exit(json_encode(["error" => 0]));
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        exit(json_encode(["error" => $e->getMessage()]));
    }
} else {
    header('Location:../pages/books.php');
    die();
}
