<?php

if (isset($_POST["pass1"]) && isset($_POST["pass2"])) {
    require_once('db_config.php');
    $db = new Database();
    $conn = $db->connect();
    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE admin.password = :pwd and admin.username = :username");
    $stmt->bindParam(":pwd", $_POST["pass2"]);
    $stmt->bindParam(":username", $_POST["pass1"]);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        session_start();
        $_SESSION["admin"] = "1";
        header('Location:../pages/changeBooks.php');
        exit();
    } else {
        header('Location:../pages/admin.php?fail=1');
        die();
    }
} else {
    header('Location:../pages/admin.php');
    die();
}
