<?php
    require_once "../config/config.php";

    $id     = $_POST['id'];
    $img    = $_POST['img'];
    $name   = $_POST['name'];
    $author = $_POST['author'];
    $rate   = (int)$_POST['rate'];
    $status = (int)$_POST['status'];

    $book = mysqli_query($connect, "SELECT * FROM `books` WHERE `ID`=$id");

    $querySql = [];

    echo "test";

    if ($author) {
        $querySql[] = "author = '{$author}'";
    } 
    if ($img) {
        $querySql[] = "img = '{$img}'";
    }
    if ($name) {
        $querySql[] = "name = '{$name}'";
    }
    if(!is_nan($rate) && $rate) {
        $querySql[] = "rate = '{$rate}'";
    }
    if(!is_nan($status) && $status) {
        $querySql[] = "status = '{$status}'";
    }
    $query = implode(",", $querySql);
    /*
    if (is_nan($img) or $img === none) $query = $query + "img='$book['img'], ";
    else                               $query = $query + "img='$img', ";

    if (is_nan($name) or $name === none) $query = $query + "name='$book['name'], ";
    else                               $query = $query + "name='$name', ";

    if (is_nan($author) or $author === none) $query = $query + "author='$book['author'], ";
    else                               $query = $query + "author='$author', ";

    if (is_nan($rate) or $rate === none) $query = $query + "rate='$book['rate'] ";
    else                               $query = $query + "rate='$rate' ";
    /*
    if (is_nan($status) or $status === none) $query = $query + "status='$book['status'], ";
    else                               $query = $query + "status='$status', ";
    */

    echo $query;
    mysqli_query($connect, "UPDATE `books` SET {$query} WHERE `ID`= {$id}");

    //header("../index.php");
