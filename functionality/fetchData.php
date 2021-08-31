<?php

if (isset($_POST["name"]) && isset($_POST["author"]) && isset($_POST["year"])) {
    try{
    require_once('db_config.php');
    $db = new Database();
    $conn = $db->connect();

    $name1 = '%' . $_POST["name"] . '%';
    $author1 = '%' . $_POST["author"] . '%';
    $year1 = '%' . $_POST["year"] . '%';
   
   $stmt = $conn->prepare("SELECT * FROM `book` WHERE book.title like :title and book.author like :author and book.year like :yearp");
 // $stmt = $conn->prepare("SELECt * from book");
  $stmt->bindParam(":title", $name1);
    $stmt->bindParam(":author", $author1);
    $stmt->bindParam(":yearp", $year1);
    $stmt->execute();
    $data = $stmt->fetchAll();
        if ($stmt->rowCount() === 0)
            exit(json_encode(["error" => 2]));
        else
            exit(json_encode($data));
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        exit(json_encode(["error" => $e->getMessage()]));
    }
} else {
    header('Location:../pages/books.php');
    die();
}
