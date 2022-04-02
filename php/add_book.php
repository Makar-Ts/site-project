<?php 
    require_once "../config/config.php";

    $img    = $_POST['img'];
    $name   = $_POST['name'];
    $author = $_POST['author'];
    $rate   = (int)$_POST['rate'];
    $status = (int)$_POST['status'];

    mysqli_query($connect, 
                 "INSERT INTO `books`(`ID`, `img`, `name`, `author`, `rate`, `status`) VALUES (NULL,'$img','$name','$author','$rate','$status')");
    header("Location: ../index.php");
?>