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
    <script>
        function myfunction(){
            let r = confirm("ต้องการจะลบหรือไม่");
            return r;
        }
    </script>
 
</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard </h1>
        
        <?php
            include("nav.php")
        ?>

        <div class="mt-4 d-flex justify-content-between">
            <div>
                <label>หมวดหมู่</label>
                <span class="dropdown">
                    <button class="btn btn-light btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                         --ทั้งหมด--
                        <ul class="dropdown-menu" aria-labelledby="Button2">
                            <li> <a href="#" class="dropdown-item"> ทั้งหมด </a> </li>
                            <?php
                                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                $sql = "SELECT * FROM category";
                                foreach($conn->query($sql) as $row){
                                    echo "<li> <a class='dropdown-item' style=text-decoration: none; href=# > $row[name] </a> </li>";
                                }
                                $conn = null;
                            ?>
                        </ul>
                    </button>
                    <template style="text-decoration: none;"></template>
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
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

                    $sql = "SELECT t3.name , t1.title , t1.id , t2.login , t1.post_date FROM post as t1
                    INNER JOIN user as t2 ON (t1.user_id = t2.id)
                    INNER JOIN category as t3 ON (t1.cat_id = t3.id) 
                    ORDER BY t1.post_date DESC";

                    $result = $conn->query($sql);

                    while($row = $result->fetch()){
                        echo "<tr>
                                <td class='d-flex justify-content-between'>
                                <div>[$row[0]]
                                    <a href=post.php?id=$row[2] style=text-decoration: none>$row[1]</a>
                                    <br>
                                    $row[3] - $row[4]
                                </div>";
                                if(isset($_SESSION['id']) && $_SESSION['role'] == 'a'){
                                    echo "<div class='me-2 mt-2'><a href=delete.php?id=$row[2] class='btn btn-danger btn-sm' onclick='return myfunction()'><i class='bi bi-trash3'></i></a></div>";
                                }
                                echo " </td>  </tr>";
                    }
                    $conn = null;
                ?>
        </table>


    </div>
</body>
</html>

