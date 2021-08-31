<?php

if (isset($_POST["id"])) {
    try {
        require_once('db_config.php');
        $db = new Database();
        $conn = $db->connect();
        $stmt = $conn->prepare("delete from book where book_id = :id");
        $stmt->bindParam(":id", $_POST["id"]);
        $stmt->execute();
        $data = $stmt->fetchAll();
        if ($stmt->rowCount() === 0)
            exit(json_encode(["error" => 2]));
        else
            exit(json_encode($data));
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit(json_encode(["error" => $e->getMessage()]));
    }
} else {
    header('Location:../pages/books.php');
    die();
}
