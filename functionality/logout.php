<?php

session_start();
if(!isset($_SESSION['admin'])){
    header('Location:../index.php');
}
session_destroy();
header('Location:../index.php');
die();
