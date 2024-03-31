<?php

session_start();

if(isset($_POST['name'])){

    $name = $_POST['name'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    
    $sql = "INSERT INTO category (name)
            VALUES ('$name')";
    $conn->exec($sql);
    $_SESSION['sucess'] = "sucess";
    $conn=null;
    header('location:category.php');
    die();
}else{
    $_SESSION['error'] = "error";
    header('location:category.php');
    die();
}

?>