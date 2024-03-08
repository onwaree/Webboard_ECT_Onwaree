
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
    <title>Webboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard </h1>
        <?php
            include("nav.php");
        ?>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">

            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8;","root","");

                $sql = "SELECT p.id,p.title,p.content,p.post_date,u.login from post as p
                        INNER JOIN user as u ON u.id = p.user_id
                        WHERE p.id = {$_GET['id']} ";
                $result = $conn->query($sql);

                while($row = $result->fetch()){
            ?>
                <div class="card border-primary mt-3">
                    <div class="card-header bg-primary text-white"> <?php echo $row['title'] ?>  </div>
                    <div class="card-body">
                        <?php echo
                            "<tr>
                                <td>
                                    $row[content]
                                </td>
                                <BR>
                                <div class=mt-3></div>
                                <td>
                                    $row[login] - $row[post_date]
                                </td>
                             </tr>"
                        ?>
                    </div>
                </div>
            <?php
                }
            ?>

               
            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8;","root","");

                $sql = "SELECT c.id,c.content,c.post_date,c.user_id,c.post_id,u.login from comment as c
                        INNER JOIN user as u ON u.id = c.user_id 
                        INNER JOIN post as p ON p.id = c.post_id
                        WHERE c.post_id = {$_GET['id']}
                        ORDER BY c.post_date ASC";
                $result = $conn->query($sql);

                foreach($result as $row){
            ?>
                <div class="card border-info mt-3 mb-3 mb-3">
                    <div class="card-header bg-info text-white"> ความคิดเห็นที่ <?php echo $row['id'] ?>   </div>
                    <div class="card-body">
                        <?php echo
                            "<tr>
                                <td>
                                    $row[content]
                                </td>
                                <BR>
                                <div class=mt-3></div>
                                <td>
                                    $row[login] - $row[post_date]
                                </td>
                             </tr>"
                         ?>
                    </div>
                </div>
            <?php
                }
            ?>

                <div class="card border-success mt-3">
                    <div class="card-header bg-success text-white"> แสดงความคิดเห็น </div>
                    <div class="card-body">
                        <form action="post_save.php" method="post">
                            <input type="hidden" name="post_id" value="<?=$_GET['id'];?>">
                            <div class="row mb-3 justify-content-center">
                                <div class="col-lg-10">
                                    <textarea name="comment"  rows="8" class="form-control" required></textarea>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-sm text-white">
                                            <i class="bi bi-box-arrow-up-right"></i> ส่งข้อความ
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm text-white ms-2">
                                            <i class="bi bi-x-square"></i> ยกเลิก
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>

</body>
</html>