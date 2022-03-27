<?php 
    require_once "../config/config.php";

    $name = $_POST['deleted_id'];

    mysqli_query($connect, 
                 "DELETE FROM `books` WHERE `ID`=$name");
    header("../index.php")
?>