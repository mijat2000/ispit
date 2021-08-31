<?php

if (isset($_POST["title"]) && isset($_POST["author"]) && isset($_POST["year"]) && isset($_POST["desc"])) {
    try {
        require_once('db_config.php');
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("insert into book(book.title,book.author,book.year,book.description) values(:title,:author,:year,:desc)");
        $stmt->bindParam(":title", $_POST["title"]);
        $stmt->bindParam(":author", $_POST["author"]);
        $stmt->bindParam(":year", $_POST["year"]);
        $stmt->bindParam(":desc", $_POST["desc"]);
        $stmt->execute();
        if ($stmt->rowCount() === 1)
            exit(json_encode(["error" => 0]));
        else
            exit(json_encode(["error" => 1]));
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit(json_encode(["error" => $e->getMessage()]));
    }
} else {
    header('Location:../pages/books.php');
    die();
}
