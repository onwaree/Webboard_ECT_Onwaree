<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <h1 style="text-align: center;">Webboard</h1>
    <hr>
    <div style="text-align: center;">
        <?php
            $name = $_POST['name'];
            $pwd = $_POST['pwd'];

            if($name == 'admin' && $pwd == 'ad1234'){

                echo "ยินดีต้อนรับคุณ ADMIN <BR> ";
                echo "<a href=index.php> กลับไปยังหน้าหลัก </a>";

            }elseif($name == 'member' && $pwd == 'mem1234'){

                echo "ยินดีต้อนรับคุณ MEMBER <BR> ";
                echo "<a href=index.php> กลับไปยังหน้าหลัก </a>";

            }else{

                echo "ขื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง <BR> ";
                echo "<a href=index.php> กลับไปยังหน้าหลัก </a>";

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



