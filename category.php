<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard </h1>
        <?php
            include("nav.php")
        ?>

        <div class="row mt-4 text-center">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php
                    if(isset($_SESSION['sucess'])){
                        echo "<div class='alert alert-success'> เพิ่มหมวดหมู่เรียบร้อยแล้ว </div>";
                        unset($_SESSION['sucess']);
                    }
                    if(isset($_SESSION['error'])){
                        echo "<div class='alert alert-danger'>  เพิ่มหมวดหมู่ไม่สำเร็จ </div>";
                        unset($_SESSION['error']);
                    }
                ?> 
                <table class="table table-striped mt-4">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อหมวดหมู่</th>
                        <th>จัดการ</th>
                    </tr>
                    <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                        $sql = "SELECT * FROM category";
                        $n = 1;
                        foreach($conn->query($sql) as $row){
                    ?>
                    <tr>
                        <td> <?=$n?> </td>
                        <td> <?=$row['name']?> </td>
                        <td> 
                            <span class='me-2 mt-2'><a href="#" class='btn btn-warning btn-sm' ><i class='bi bi-pencil-square'></i></a></span>
                            <span class='me-2 mt-2'><a href="#" class='btn btn-danger btn-sm' ><i class='bi bi-trash3'></i></a></span>
                        </td>
                    </tr>
                    <?php
                        $n++;
                        }
                    ?>
                </table>
                
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal">
                        <i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่
                    </button>

                    <!-- Modal -->
                    <form action="category_save.php" method="post">
                        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหมู่ใหม่</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mb-5">
                                        <div class="row mt-3">
                                            <label class="col-lg-3 col-form-label" for="topic"> ชื่อหมวดหมู่: </label>
                                            <div class="me-3">
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>

    </div>
</body>
</html>