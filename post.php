<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
</head>
<body>
    <h1 style="text-align: center;">Webboard </h1>
    <hr>

    <div style="text-align: center;">
        ต้องการดูกระทู้หมายเลข <?php echo $_GET['id']; ?> 
        <BR>
        
        <?php
            $num = $_GET['id'];

            if(($num % 2) == 0){
                echo "เป็นกระทู้หมายเลขคู่";
            }else{
                echo "เป็นกระทู้หมายเลขคี่";
            }
        ?>
        
    </div>
    <br>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr style="background-color: #6CD2FE;">
            <td>แสดงความคิดเห็น</td>
        </tr>
        <tr>
            <td><textarea name="" id="" cols="40" rows="10"></textarea></td>
        </tr>
        <tr style="text-align: center;">
            <td><input type="submit" value="ส่งข้อความ"></td>
        </tr>
    </table>
    <br> 
        
    <div style="text-align: center;">
        <a  href="index.php">กลับไปหน้าหลัก</a>
    </div>
        
   
   


</body>
</html>