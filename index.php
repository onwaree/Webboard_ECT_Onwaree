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

        <div class="mt-3 d-flex justify-content-between">
            <div>
                <label>หมวดหมู่</label>
                <span class="dropdown">
                    <button class="btn btn-light btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                         --ทั้งหมด--
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                        <li><a class="dropdown-item" href="#">เรื่องเรียน</a></li>
                        <li><a class="dropdown-item" href="#">เรื่องทั่วไป</a></li>
                    </ul>
                </span>
            </div>
            
            <?php
                if(isset($_SESSION['id'])){
            ?>
                <div>
                    <a href="newpost.php" class="btn btn-success btn-sm"> <i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a>
                </div>
            <?php
                }
            ?>
            
        </div>

        <table class="table table-striped mt-4">
            <?php
                for($i = 1; $i <= 10; $i++){
                    echo "<tr>
                            <td class='d-flex justify-content-between'> <a href=post.php?id=$i style=text-decoration:none > กระทู้ที่ $i </a>";

                            if(isset($_SESSION['id']) && $_SESSION['role'] == 'a'){
                                echo "&nbsp;&nbsp; <a href=delete.php?id=$i class='btn btn-danger btn-sm me-3'> <i class='bi bi-trash3-fill'></i>  ลบ</a>";
                            }
                            
                    echo "</td> </tr>";
                    
                }
            ?>
        </table>

    </div>
</body>
</html>