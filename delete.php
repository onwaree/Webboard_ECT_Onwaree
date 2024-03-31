<?php
    session_start();

    if(isset($_SESSION['id'])){
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql = "SELECT p.user_id FROM post as p
                WHERE p.id = {$_GET['id']}";
         $result = $conn->query($sql);
         $row = $result->fetch();

        if($_SESSION['role'] == 'a' || $_SESSION['user_id'] == $row['user_id']){
            $id = $_GET['id'];

            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $sql = "DELETE FROM post WHERE id = $id";
            $conn->exec($sql);

            $sql = "DELETE FROM comment WHERE post_id = $id";
            $conn->exec($sql);
            $conn = null;
            header("location:index.php");
            die();
        }else{
            header("location:index.php");
            die();
        }
    }else{
        header("location:index.php");
        die();
    }
    
?>
