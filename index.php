<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard </h1>
        
        <nav class="navbar navbar-expand-sm" style="background-color: #d3d3d3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"> <i class="bi bi-house-door"></i> Home</a>
                <ul class="navbar-nav">
                <?php
                    if(!isset($_SESSION['id'])){  
                ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="login.php"> <i class="bi bi-pencil-square"></i> เข้าสู่ระบบ</a>
                    </li>
                <?php
                    }else{
                ?>
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-rolodex"></i>
                            <?php
                                echo $_SESSION['username']
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> ออกจากระบบ</a></li>
                        </ul>
                    </li>
                <?php
                    }
                ?>

                </ul>
            </div>
        </nav>

        <form>
            หมวดหมู่:<select name="category" >
                <option value="all">--ทั้งหมด--</option>
                <option value="general">เรื่องทั่วไป</option>
                <option value="study">เรื่องเรียน</option>
            </select>

            <?php
                if(!isset($_SESSION['id'])){ /* ไม่ได้ส่งข้อมูลมา !isset */
                    echo "<a href=login.php style='float: right;'>เข้าสู่ระบบ</a>";
                }else{
                    echo "<div style='float: right;'>
                            ผู้ใช้งานระบบ : $_SESSION[username]&nbsp;&nbsp;
                            <a href=logout.php>ออกจากระบบ</a>
                        </div>";
                    echo "<br> <a href=newpost.php>สร้างกระทู้ใหม่</a>";
                }
            ?>

            
        </form>

        <ul></ul>
        <?php
            for($i = 1; $i <= 10; $i++){
                echo "<li>
                        <a href=post.php?id=$i> กระทู้ที่ $i </a>";

                        if(isset($_SESSION['id']) && $_SESSION['role'] == 'a'){
                            echo "&nbsp;&nbsp; <a href=delete.php?id=$i>ลบ</a>";
                        }
                        
                echo "</li>";
                
            }
            
        ?>
        </ul>
    </div>
</body>
</html>