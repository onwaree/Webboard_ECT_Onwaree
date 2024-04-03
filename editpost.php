<?php
    session_start();

    if(!isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewPost</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <?php 
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
        $sql = "SELECT p.user_id FROM post as p
                WHERE p.id = {$_GET['id']}";
         $result = $conn->query($sql);
         $row = $result->fetch();

        if($_SESSION['user_id'] == $row['user_id']){  
    ?>

    <div class="container">
        <h1 style="text-align: center;" class="mt-3">Webboard </h1>
        <?php
            include("nav.php");
        ?>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php
                    if(isset($_SESSION['sucess'])){
                        echo "<div class='alert alert-success'> แก้ไขกระทู้เรียบร้อยแล้ว </div>";
                        unset($_SESSION['sucess']);
                    }
                    if(isset($_SESSION['error'])){
                        echo "<div class='alert alert-danger'> แก้ไขกระทู้ไม่สำเร็จ </div>";
                        unset($_SESSION['error']);
                    }
                ?>
                <div class="card border-warning">
                    <div class="card-header bg-warning text-white"> แก้ไขกระทู้ </div>
                    <div class="card-body">
                        <form action="editpost_save.php" method="post">
                            <input type="hidden" name="post_id" value="<?=$_GET['id'];?>">
                            <div class="row">
                                <label class="col-lg-3 col-form-label"> หมวดหมู่: </label>
                                <div class="col-lg-9">
                                    <select name="category" class="form-select">
                                        <?php
                                            $con1 = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                            $sql1 = "SELECT c.name , p.cat_id FROM post p
                                                    INNER JOIN category as c ON c.id = p.cat_id
                                                    WHERE p.id = {$_GET['id']} ";
                                            foreach($con1->query($sql1) as $row){
                                                echo "<option value=$row[cat_id] > $row[name] </option>";
                                            }

                                            $sql2 = "SELECT * FROM category as c
                                                    WHERE c.id != $row[cat_id]";
                                            foreach($con1->query($sql2) as $rows){
                                                echo "<option value=$rows[id] > $rows[name] </option>";
                                            }
                                            $con1 = null;
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <?php
                              $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                              $sql = "SELECT p.title , p.content FROM post p
                                      INNER JOIN user as u ON u.id = p.user_id
                                      WHERE p.id = {$_GET['id']} ";
                              foreach($conn->query($sql) as $row){
                            ?>
                            <div class="row mt-3">
                                <label   label class="col-lg-3 col-form-label" for="topic"> หัวข้อ: </label>
                                <div class="col-lg-9">
                                    <input type="text" name="topic" id="topic" class="form-control" value="<?=$row['title']?>"  required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label   label class="col-lg-3 col-form-label" for="comment"> เนื้อหา: </label>
                                <div class="col-lg-9">
                                   <textarea name="comment" id="comment"  rows="8" class="form-control" required><?=$row['content']?></textarea>
                                </div>
                            </div>

                            <?php
                                }
                                $conn = null;
                            ?>

                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning text-white btn-sm">
                                        <i class="bi bi-save2"></i> บันทึกข้อความ
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>
    <?php
        }else{
            header("location:index.php");
            die();
        }
    
    ?>
    <br>
</body>
</html>
