<?php

session_start();

if(isset($_POST['topic'])){

    $post_id = $_POST['post_id'];

    $topic = $_POST['topic'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    $cat_id = $_POST['category'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "UPDATE post SET title=:topic, content=:comment, post_date=NOW(), cat_id=:cat_id, user_id=:user_id WHERE id=:post_id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':topic', $topic);
    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT); 
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);

    $stmt->execute();

    
    if($stmt->rowCount() == 1){
        $_SESSION['sucess'] = "sucess";
		header('location:editpost.php?id='.$post_id);
        die();
    }else{
        $_SESSION['error'] = "error";
		header('location:editpost.php?id='.$post_id);
        die();
    }
    $conn = null;
    die();
}else{
    header('location:index.php');
    die();
}

?>
