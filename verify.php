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
        เข้าสู่ระบบด้วย
        <br>
        Login = <?php echo $_POST['name']; ?>
        <br>
        Password = <?php echo $_POST['pwd']; ?> 
        
        <?php
            // echo "เข้าสู่ระบบด้วย <br>";
            // echo "Login = $_POST[name] <br>";
            // echo "Password = $_POST[pwd] <br>";
        ?>
    </div>
</body>
</html>



