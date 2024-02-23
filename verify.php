<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <div style="text-align: center;">
        <?php
            $name = $_POST['name'];
            $pwd = $_POST['pwd'];

            if($name == 'admin' && $pwd == 'ad1234'){

                $_SESSION['username'] = 'admin';
                $_SESSION['role'] = 'a';
                $_SESSION['id'] = session_id();

                // echo "ยินดีต้อนรับคุณ ADMIN <BR> ";
                // echo "<a href=index.php> กลับไปยังหน้าหลัก </a>";

                header('location:index.php');
                die();
                

            }elseif($name == 'member' && $pwd == 'mem1234'){

                $_SESSION['username'] = 'member';
                $_SESSION['role'] = 'm';
                $_SESSION['id'] = session_id();

                // echo "ยินดีต้อนรับคุณ MEMBER <BR> ";
                // echo "<a href=index.php> กลับไปยังหน้าหลัก </a>";

                header('location:index.php');
                die();

            }else{

                // echo "ขื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง <BR> ";
                // echo "<a href=index.php> กลับไปยังหน้าหลัก </a>";

                $_SESSION['error'] = 'error';
                header('location:login.php');
                die();

            }
        ?>
        
        <?php
            // echo "เข้าสู่ระบบด้วย <br>";
            // echo "Login = $_POST[name] <br>";
            // echo "Password = $_POST[pwd] <br>";
        ?>

    </div>
</body>
</html>




