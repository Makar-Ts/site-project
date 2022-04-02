<?php 
    require_once "../config/config.php";

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $comm = $_POST["comment"];

    mysqli_query($connect, 
                 "INSERT INTO `comments`(`ID`, `name`, `phone`, `mail`, `comment`) VALUES (NULL,'$name','$phone','$mail','$comm')");
    header("Location: ../index.php");
?>